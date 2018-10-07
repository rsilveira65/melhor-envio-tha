<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 06/10/18
 * Time: 15:45
 */

namespace ApiBundle\Service\Strategy;

use ApiBundle\Entity\Company;
use ApiBundle\Entity\Product;
use ApiBundle\Service\Factory\PackageFactoryInterface;

class PackStrategy implements PackageFactoryInterface
{
    /** @var Company $company */
    private $company;

    /**
     * @param Company $company
     * @return $this
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;

        return $this;
    }


    /**
     * @param Product $product
     * @return bool
     */
    public function hasValidSizes(Product $product)
    {
        if ($product->getWidth() < $this->company->getMinWidth() or
            $product->getWidth() > $this->company->getMaxWidth())
        {
            return false;
        }

        if ($product->getHeight() < $this->company->getMinHeight() or
            $product->getHeight() > $this->company->getMaxHeight())
        {
            return false;
        }

        if ($product->getLength() < $this->company->getMinLength() or
            $product->getLength() > $this->company->getMaxLength())
        {
            return false;
        }

        if ($product->getWeight() < $this->company->getMinWeight() or
            $product->getWeight() > $this->company->getMaxWeight())
        {
            return false;
        }

        return true;
    }


    /**
     * @return float|int
     */
    public function getCompanyVolume()
    {
        return $this->company->getVolume();
    }
}