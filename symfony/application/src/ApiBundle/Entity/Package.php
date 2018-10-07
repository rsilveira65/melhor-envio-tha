<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Package
 */
class Package
{
    /**
     * @var int
     */
    private $id;

    /**
     * @Groups({"ApiResponse"})
     * @var int
     */
    private $amountOfProducts;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     */
    private $volume;

    /**
     * @Groups({"ApiResponse"})
     * @var Collection
     */
    private $products;

    /**
     * Package constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Package
     */
    public function setId($id)
    {
         $this->id = $id;
         return $this;
    }

    /**
     * @return int
     */
    public function getAmountOfProducts()
    {
        return $this->amountOfProducts;
    }

    /**
     * @param int $amountOfProducts
     * @return Package
     */
    public function setAmountOfProducts(int $amountOfProducts)
    {
        $this->amountOfProducts = $amountOfProducts;
        return $this;
    }

    /**
     * @param Product $product
     * @return Package
     */
    public function addProduct(Product $product)
    {
        $this->products->add($product);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     * @return Package
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }
}

