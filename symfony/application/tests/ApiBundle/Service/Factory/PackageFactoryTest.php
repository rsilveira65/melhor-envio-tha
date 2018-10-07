<?php
namespace Tests\ApiBundle\Service\Request;

use ApiBundle\Entity\Company;
use ApiBundle\Entity\Product;
use ApiBundle\Repository\CompanyRepository;
use ApiBundle\Service\Factory\PackageFactory;
use ApiBundle\Service\Strategy\PackStrategy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class PackageFactoryTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Service\Factory\PackageFactory
 * @package ApiBundle\Tests\Service\Request
 */
class PackageFactoryTest extends WebTestCase
{
    /** @var  PackageFactory */
    private $packageFactory;

    /** @var  CompanyRepository */
    private $companyRepository;

    /** @var EntityManager */
    private $entityManager;

    public function setUp()
    {
        static::bootKernel();
        $this->entityManager = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $this->companyRepository = $this->entityManager->getRepository(Company::class);

        $this->packageFactory = new PackageFactory();
    }

    /**
     * @covers \ApiBundle\Service\Factory\PackageFactory::create
     * @throws \Exception
     */
    public function testCreate()
    {
        $products = $this->buildProducts();

        $company = $this->getCompany();

        /** @var PackStrategy $packStrategy */
        $packStrategy = new PackStrategy();
        $packStrategy->setCompany($company);

        $packages = $this->packageFactory::create($products, $packStrategy);

        $this->assertInstanceOf(ArrayCollection::class, $packages);
    }


    /**
     * @return ArrayCollection
     */
    private function buildProducts()
    {
        $products = new ArrayCollection();

        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product
                ->setId(1)
                ->setQuantity(1)
                ->setHeight(34)
                ->setLength(31)
                ->setWeight(23)
                ->setWidth(12)
                ->setVolume();

            $products->add($product);
        }

        return $products;
    }

    /**
     * @return mixed
     */
    private function getCompany()
    {
        return $this->companyRepository->findAll()[0];
    }
}