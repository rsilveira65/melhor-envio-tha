<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 06/10/18
 * Time: 15:45
 */
namespace ApiBundle\Service\Strategy;

use ApiBundle\Entity\Product;

/**
 * interface PackStrategyInterface
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Service\Strategy
 */
interface PackStrategyInterface
{
    public function hasValidSizes(Product $product);

    public function getCompanyVolume();

}