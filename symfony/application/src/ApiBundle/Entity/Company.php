<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 06/10/18
 * Time: 10:51
 */

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Ldap\Adapter\ExtLdap\Collection;

/**
 * Company
 *
 * @ORM\Table(name="companies")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CompanyRepository")
 */
class Company
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
    private $packages;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="min_height", type="float")
     */
    private $minHeight;

    /**
     * @var float
     *
     * @ORM\Column(name="max_height", type="float")
     */
    private $maxHeight;

    /**
     * @var float
     *
     * @ORM\Column(name="min_width", type="float")
     */
    private $minWidth;

    /**
     * @var float
     *
     * @ORM\Column(name="max_width", type="float")
     */
    private $maxWidth;

    /**
     * @var float
     *
     * @ORM\Column(name="min_length", type="float")
     */
    private $minLength;

    /**
     * @var float
     *
     * @ORM\Column(name="max_length", type="float")
     */
    private $maxLength;

    /**
     * @var float
     *
     * @ORM\Column(name="min_weight", type="float")
     */
    private $minWeight;

    /**
     * @var float
     *
     * @ORM\Column(name="max_weight", type="float")
     */
    private $maxWeight;

    /**
     * Company constructor.
     */
    public function __construct()
    {
        $this->packages = new ArrayCollection();
    }



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set minHeight
     *
     * @param float $minHeight
     *
     * @return Company
     */
    public function setMinHeight($minHeight)
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * Get minHeight
     *
     * @return float
     */
    public function getMinHeight()
    {
        return $this->minHeight;
    }

    /**
     * Set maxHeight
     *
     * @param float $maxHeight
     *
     * @return Company
     */
    public function setMaxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    /**
     * Get maxHeight
     *
     * @return float
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * Set minWidth
     *
     * @param float $minWidth
     *
     * @return Company
     */
    public function setMinWidth($minWidth)
    {
        $this->minWidth = $minWidth;

        return $this;
    }

    /**
     * Get minWidth
     *
     * @return float
     */
    public function getMinWidth()
    {
        return $this->minWidth;
    }

    /**
     * Set maxWidth
     *
     * @param float $maxWidth
     *
     * @return Company
     */
    public function setMaxWidth($maxWidth)
    {
        $this->maxWidth = $maxWidth;

        return $this;
    }

    /**
     * Get maxWidth
     *
     * @return float
     */
    public function getMaxWidth()
    {
        return $this->maxWidth;
    }

    /**
     * Set minLength
     *
     * @param float $minLength
     *
     * @return Company
     */
    public function setMinLength($minLength)
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * Get minLength
     *
     * @return float
     */
    public function getMinLength()
    {
        return $this->minLength;
    }

    /**
     * Set maxLength
     *
     * @param float $maxLength
     *
     * @return Company
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * Get maxLength
     *
     * @return float
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * Set minWeight
     *
     * @param float $minWeight
     *
     * @return Company
     */
    public function setMinWeight($minWeight)
    {
        $this->minWeight = $minWeight;

        return $this;
    }

    /**
     * Get minWeight
     *
     * @return float
     */
    public function getMinWeight()
    {
        return $this->minWeight;
    }

    /**
     * Set maxWeight
     *
     * @param float $maxWeight
     *
     * @return Company
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    /**
     * Get maxWeight
     *
     * @return float
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * @param Package $package
     * @return Company
     */
    public function addPackage(Package $package)
    {
        $this->packages->add($package);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getPackages()
    {
        return $this->packages;
    }

}

