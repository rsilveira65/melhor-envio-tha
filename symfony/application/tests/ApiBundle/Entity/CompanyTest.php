<?php
namespace Tests\ApiBundle\Entity;

use ApiBundle\Entity\Company;
use ApiBundle\Entity\Package;


/**
 * Class CompanyTest
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @covers \ApiBundle\Entity\Company
 * @package ApiBundle\Tests\Entity
 */
class CompanyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Company
     */
    protected $company;

    protected function setUp()
    {
        $this->company = new Company();
    }

    public function testGetterAndSetter()
    {
        $this->assertNull($this->company->getId());

        $this->company->setName('JADLOG');
        $this->assertEquals('JADLOG', $this->company->getName());

        $this->company->setMinWidth(10.2);
        $this->assertEquals(10.2, $this->company->getMinWidth());

        $this->company->setMaxWidth(100.2);
        $this->assertEquals(100.2, $this->company->getMaxWidth());


        $this->company->setMinHeight(2.3);
        $this->assertEquals(2.3, $this->company->getMinHeight());

        $this->company->setMaxHeight(30.2);
        $this->assertEquals(30.2, $this->company->getMaxHeight());


        $this->company->setMinLength(1.5);
        $this->assertEquals(1.5, $this->company->getMinLength());

        $this->company->setMaxLength(220.2);
        $this->assertEquals(220.2, $this->company->getMaxLength());


        $this->company->setMinWeight(9.3);
        $this->assertEquals(9.3, $this->company->getMinWeight());

        $this->company->setMaxWeight(302.2);
        $this->assertEquals(302.2, $this->company->getMaxWeight());


        $this->company->addPackage(new Package());
        $this->assertEquals(new Package(), $this->company->getPackages()[0]);

    }
}
