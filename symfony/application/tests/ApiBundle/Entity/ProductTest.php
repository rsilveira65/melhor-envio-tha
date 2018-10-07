<?php
namespace Tests\ApiBundle\Entity;

use ApiBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class ProductTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Entity\Product
 * @package ApiBundle\Tests\Entity
 */
class ProductTest extends WebTestCase
{
    /**
     * @var Product
     */
    protected $product;

    protected function setUp()
    {
        $this->product = new Product();
    }

    public function testGetterAndSetter()
    {
        $this->product->setId(2);
        $this->assertEquals(2, $this->product->getId());

        $this->product->setWidth(10.2);
        $this->assertEquals(10.2, $this->product->getWidth());

        $this->product->setHeight(2.3);
        $this->assertEquals(2.3, $this->product->getHeight());

        $this->product->setLength(1.5);
        $this->assertEquals(1.5, $this->product->getLength());

        $this->product->setWeight(9.3);
        $this->assertEquals(9.3, $this->product->getWeight());

        $this->product->setQuantity(15);
        $this->assertEquals(15, $this->product->getQuantity());

        $this->product->setVolume();
        $this->assertEquals(35.19, $this->product->getVolume());
    }
}
