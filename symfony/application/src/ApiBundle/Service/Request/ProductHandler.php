<?php

namespace ApiBundle\Service\Request;

use ApiBundle\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;
use \Symfony\Component\HttpFoundation\Request;
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 06/10/18
 * Time: 14:44
 */

class ProductHandler
{
    /** @var Request $request */
    private $request;

    /**
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }


    /**
     * @throws \Exception
     */
    public function parseProductsFromRequest() : ArrayCollection
    {
        $projectsArray = json_decode($this->request->getContent(), true);

        $productsCollection = new ArrayCollection();

        foreach ($projectsArray as $productItem) {
            /** @var Product $product */
            $product = new Product();

            foreach ($productItem as $key => $item) {
                $method = sprintf('set%s', ucfirst($key));
                if (!method_exists($product, $method)) throw new \Exception(sprintf('Invalid parameter %s.', $key));

                $product->{$method}($item);
            }

            $productsCollection->add($product);
        }

        return $productsCollection;
    }

}