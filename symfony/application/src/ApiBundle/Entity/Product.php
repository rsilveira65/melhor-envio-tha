<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Company
 */
class Product
{
    /**
     * @Groups({"ApiResponse"})
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     */
    private $height;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     */
    private $width;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     */
    private $length;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     */
    private $weight;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     */
    private $volume;

    /**
     * Set id
     *
     * @param int $id
     *
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set height
     *
     * @param float $height
     *
     * @return Product
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get minHeight
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param float $width
     *
     * @return Product
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set length
     *
     * @param float $length
     *
     * @return Product
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set quantity
     *
     * @param int $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float|int
     */
    public function setVolume()
    {
        return $this->volume = $this->getHeight() * $this->getLength() * $this->getWidth();
    }

    /**
     * @return float|int
     */
    public function getVolume()
    {
        return $this->volume;
    }

}

