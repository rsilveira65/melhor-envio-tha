<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 06/10/18
 * Time: 15:39
 */

namespace ApiBundle\Service\Factory;


use ApiBundle\Service\Strategy\PackStrategyInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * interface PackageFactoryInterface
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Service\Factory
 */
interface PackageFactoryInterface
{
    static function create(ArrayCollection $products, PackStrategyInterface $packStrategy);
}