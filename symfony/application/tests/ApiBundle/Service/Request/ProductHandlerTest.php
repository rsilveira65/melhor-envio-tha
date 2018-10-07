<?php
namespace Tests\ApiBundle\Service\Request;

use ApiBundle\Entity\Product;
use ApiBundle\Service\Request\ProductHandler;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductHandlerTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Service\Request\ProductHandler
 * @package ApiBundle\Tests\Service\Request
 */
class ProductHandlerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ProductHandler */
    private $productHandler;

    public function setUp()
    {
        $this->productHandler = new ProductHandler();
    }

    /**
     * @covers \ApiBundle\Service\Request\ProductHandler::setRequest
     * @return ProductHandler $productHandler
     */
    public function testSetRequest()
    {
        $request = $this->mockRequest();
        $productHandler = $this->productHandler->setRequest($request);
        $this->assertInstanceOf(ProductHandler::class, $productHandler);

        return $productHandler;
    }

    /**
     * @covers \ApiBundle\Service\Request\ProductHandler::parseProductsFromRequest
     * @param ProductHandler $productHandler
     * @depends testSetRequest
     * @throws \Exception
     */
    public function testParseProductsFromRequest($productHandler)
    {
        $products = $productHandler->parseProductsFromRequest();

        /** @var Product $product */
        $product = $products[0];

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals(20, $product->getQuantity());
        $this->assertEquals(1, $product->getId());
        $this->assertEquals(30, $product->getWeight());
        $this->assertEquals(50, $product->getHeight());
        $this->assertEquals(60, $product->getWidth());
        $this->assertEquals(50, $product->getLength());
    }

    /**
     * @return Request
     */
    private function mockRequest()
    {
        /** @var Request $request */
        $request = $this
            ->getMockBuilder(Request::class)
            ->getMock();

        $request
            ->method('getContent')
            ->will($this->returnValue('[
	{
		"id": 1,
		"quantity": 20,
		"weight": 30,
		"height": 50,
		"width": 60,
		"length": 50
	},
	{
		"id": 2,
		"quantity": 3,
		"weight": 30,
		"height": 50,
		"width": 60,
		"length": 50
	},
	{
		"id": 3,
		"quantity": 3,
		"weight": 34,
		"height": 50,
		"width": 90,
		"length": 50
	}
]'));

        return $request;
    }
}