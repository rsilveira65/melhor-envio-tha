<?php

namespace Tests\ApiBundle\Service\Strategy;

use ApiBundle\Entity\Company;
use ApiBundle\Entity\Product;
use ApiBundle\Repository\CompanyRepository;
use ApiBundle\Service\Strategy\PackStrategy;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class PackStrategyTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Service\Strategy\PackStrategy
 * @package ApiBundle\Tests\Service\Strategy
 */
class PackStrategyTest extends WebTestCase
{
    /** @var  PackStrategy */
    private $packStrategy;

    /** @var  CompanyRepository */
    private $companyRepository;

    /** @var EntityManager */
    private $entityManager;

    public function setUp()
    {
        static::bootKernel();
        $this->entityManager = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $this->companyRepository = $this->entityManager->getRepository(Company::class);

        $this->packStrategy = new PackStrategy();
    }

    /**
     * @covers \ApiBundle\Service\Strategy\PackStrategy::setCompany()
     * @return Company $company
     */
    public function testSetCompany()
    {
        $company = $this->getCompany();
        $packStrategy = $this->packStrategy->setCompany($company);

        $this->assertInstanceOf("\ApiBundle\Service\Strategy\PackStrategy", $packStrategy);

        return $company;
    }

    /**
     * @covers \ApiBundle\Service\Strategy\PackStrategy::getCompanyVolume
     * @param Company $company
     * @depends testSetCompany
     * @@return Company $company
     */
    public function testGetCompanyVolume($company)
    {
        $this->packStrategy->setCompany($company);

        $companyVolume = $this
            ->packStrategy
            ->getCompanyVolume();

        $this->assertEquals($company->getVolume(), $companyVolume);

        return $company;
    }

    /**
     * @covers \ApiBundle\Service\Strategy\PackStrategy::hasValidSizes
     * @param Company $company
     * @depends testGetCompanyVolume
     */
    public function testHasValidSizes($company)
    {
        $this->packStrategy->setCompany($company);

        $product = $this->buildProduct();

        $this->assertEquals(true, $this->packStrategy->hasValidSizes($product));

        $companyVolume = $this
            ->packStrategy
            ->getCompanyVolume();

        $this->assertEquals($company->getVolume(), $companyVolume);
    }


    /**
     * @return mixed
     */
    private function getCompany()
    {
       return $this->companyRepository->findAll()[0];
    }

    /**
     * @return Product
     */
    private function buildProduct()
    {
        $product = new Product();
        $product
            ->setId(1)
            ->setQuantity(1)
            ->setHeight(34)
            ->setLength(31)
            ->setWeight(23)
            ->setWidth(12)
            ->setVolume();

        return $product;
    }
}