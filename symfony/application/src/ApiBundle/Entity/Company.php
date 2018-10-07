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
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Company
 *
 * @ORM\Table(name="companies")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @Groups({"ApiResponse"})
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Groups({"ApiResponse"})
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="min_height", type="float")
     */
    private $minHeight;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="max_height", type="float")
     */
    private $maxHeight;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="min_width", type="float")
     */
    private $minWidth;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="max_width", type="float")
     */
    private $maxWidth;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="min_length", type="float")
     */
    private $minLength;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="max_length", type="float")
     */
    private $maxLength;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="min_weight", type="float")
     */
    private $minWeight;

    /**
     * @Groups({"ApiResponse"})
     * @var float
     *
     * @ORM\Column(name="max_weight", type="float")
     */
    private $maxWeight;

    /**
     * @Groups({"ApiResponse"})
     * @var int
     */
    private $amountOfPackages;

    /**
     * @Groups({"ApiResponse"})
     * @ORM\Column(name="volume", type="float")
     * @var float
     */
    private $volume;


    /**
     * @Groups({"ApiResponse"})
     * @var Collection
     */
    private $packages;

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
     * @return $this
     */
    public function setVolume()
    {
        $this->volume = $this->getMaxHeight() * $this->getMaxLength() * $this->getMaxWidth();

        return $this;
    }

    /**
     * @return float|int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return float|int
     */
    public function getAmountOfPackages()
    {
        return $this->packages->count();
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
     * @param ArrayCollection $packages
     * @return Company
     */
    public function addPackages(ArrayCollection $packages)
    {
        $this->packages = $packages;

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

