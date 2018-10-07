<?php

namespace Tests\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiControllerTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Controller\ApiController
 * @package ApiBundle\Tests\Controller
 */
class ApiControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     * @covers \ApiBundle\Controller\ApiController::packAction()
     */
    public function testPack()
    {
        $this->client->request(
            'POST',
            '/api/pack',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode(
                [
                    [
                        'id' => 1,
                        'quantity' => 20,
                        'weight' => 30,
                        'height' => 50,
                        'width' => 60,
                        'length' => 50,
                    ],
                    [
                        'id' => 2,
                        'quantity' => 3,
                        'weight' => 20,
                        'height' => 90,
                        'width' => 60,
                        'length' => 50,
                    ]
                ]
            )
        );

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

        $data = json_decode($this->client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $data[0]);
        $this->assertArrayHasKey('name', $data[0]);
        $this->assertArrayHasKey('minHeight', $data[0]);
        $this->assertArrayHasKey('maxHeight', $data[0]);
        $this->assertArrayHasKey('minWidth', $data[0]);
        $this->assertArrayHasKey('maxWidth', $data[0]);
        $this->assertArrayHasKey('minLength', $data[0]);
        $this->assertArrayHasKey('maxLength', $data[0]);
        $this->assertArrayHasKey('minWeight', $data[0]);
        $this->assertArrayHasKey('maxWeight', $data[0]);
        $this->assertArrayHasKey('amountOfPackages', $data[0]);
        $this->assertArrayHasKey('volume', $data[0]);
    }
}