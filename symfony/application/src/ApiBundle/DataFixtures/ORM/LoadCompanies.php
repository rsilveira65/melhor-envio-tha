<?php

namespace ApiBundle\DataFixtures\ORM;

use ApiBundle\Entity\Company;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadCompanies
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\DataFixtures\ORM
 */
class LoadCompanies extends AbstractFixture
{
    /** @var array $companies  */
    private $companies = [
        [
            'Name' => 'Correios',
            'MinWeight' => 0,
            'MaxWeight' => 30,
            'MinHeight' => 2,
            'MaxHeight' => 105,
            'MinWidth' => 11,
            'MaxWidth' => 105,
            'MinLength' => 16,
            'MaxLength' => 105
        ],
        [
            'Name' => 'Jadlog',
            'MinWeight' => 0,
            'MaxWeight' => 150,
            'MinHeight' => 1,
            'MaxHeight' => 100,
            'MinWidth' => 1,
            'MaxWidth' => 105,
            'MinLength' => 1,
            'MaxLength' => 181
        ],
        [
            'Name' => 'Via Brasil',
            'MinWeight' => 0,
            'MaxWeight' => 200,
            'MinHeight' => 1,
            'MaxHeight' => 200,
            'MinWidth' => 1,
            'MaxWidth' => 200,
            'MinLength' => 1,
            'MaxLength' => 240
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->companies as $company) {
            $companyEntity = new Company();
            foreach ($company as $key => $companyData) {
                $method = sprintf('set%s', $key);

                $companyEntity->{$method}($companyData);
            }

            $manager->persist($companyEntity);
        }

        $manager->flush();
    }

}