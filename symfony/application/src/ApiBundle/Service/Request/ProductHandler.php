<?php

namespace ApiBundle\Service\Request;

use ApiBundle\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;
use \Symfony\Component\HttpFoundation\Request;


class ProductHandler
{
    /** @var Request $request */
    private $request;

    /**
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request) : ProductHandler
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
            for ($i = 1; $i <= $productItem['quantity']; $i++) {
                /** @var Product $product */
                $product = new Product();

                foreach ($productItem as $key => $item) {
                    $method = sprintf('set%s', ucfirst($key));
                    if (!method_exists($product, $method)) throw new \Exception(sprintf('Invalid parameter %s.', $key));

                    $product->{$method}($item);
                    $product->setVolume();
                }

                $productsCollection->add($product);
            }

        }

        return $productsCollection;
    }

}