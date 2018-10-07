<?php
namespace Tests\ApiBundle\Entity;

use ApiBundle\Entity\Package;
use ApiBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class PackageTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Entity\Package
 * @package ApiBundle\Tests\Entity
 */
class PackageTest extends WebTestCase
{
    /**
     * @var Package
     */
    protected $package;

    protected function setUp()
    {
        $this->package = new Package();
    }

    public function testGetterAndSetter()
    {
        $this->package->setId(2);
        $this->assertEquals(2, $this->package->getId());

        $this->package->addProduct(new Product());
        $this->assertEquals(new Product(), $this->package->getProducts()[0]);
        $this->assertInstanceOf(Product::class, $this->package->getProducts()[0]);

        $this->package->setVolume(434.3);
        $this->assertEquals(434.3, $this->package->getVolume());

        $this->package->setAmountOfProducts(34);
        $this->assertEquals(34,$this->package->getAmountOfProducts());
    }
}
