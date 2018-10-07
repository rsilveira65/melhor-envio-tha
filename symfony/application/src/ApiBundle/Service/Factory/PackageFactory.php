<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 06/10/18
 * Time: 15:40
 */

namespace ApiBundle\Service\Factory;

use ApiBundle\Entity\Package;
use ApiBundle\Entity\Product;
use ApiBundle\Service\Strategy\PackStrategy;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PackageFactory
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\Service\Factory
 */
class PackageFactory implements PackageFactoryInterface
{
    /**
     * @param ArrayCollection $products
     * @param PackStrategy $packStrategy
     * @return ArrayCollection
     * @throws \Exception
     */
    static function create(ArrayCollection $products, PackStrategy $packStrategy)
    {
        $packages = new ArrayCollection();
        $maxCompanyVolume = $packStrategy->getCompanyVolume();
        $products = $products->toArray();

        $productIndex = count($products) -1;

        /** @var Package $package */
        $package = new Package();

        do {
            if ($package->getVolume() > $maxCompanyVolume) {
                $packages->add($package);

                $package = new Package();
                $package->setId($package->getId() + 1);
            }

            /** @var Product $product */
            $product = $products[$productIndex];

            if (!$packStrategy->hasValidSizes($product)) {
                unset($products[$productIndex]);
                $productIndex--;
                continue;
            }

            $package
                ->addProduct($product)
                ->setVolume($package->getVolume() + $product->getVolume())
                ->setAmountOfProducts($package->getAmountOfProducts() + 1);

            unset($products[$productIndex]);
            $productIndex--;

            if (empty($products)) {
                $packages->add($package);
                $package->setId($package->getId() + 1);
                break;
            }

        } while (true);

        return $packages;
    }
}