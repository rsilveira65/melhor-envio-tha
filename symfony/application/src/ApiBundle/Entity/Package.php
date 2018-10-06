<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Package
 *
 * @ORM\Table(name="packages")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\PackageRepository")
 */
class Package
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
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
}
