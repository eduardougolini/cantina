<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_entry", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateEntry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validity", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $validity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="stock")
     */
    private $product;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Stock
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
     * Set amount
     *
     * @param integer $amount
     *
     * @return Stock
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set dateEntry
     *
     * @param \DateTime $dateEntry
     *
     * @return Stock
     */
    public function setDateEntry($dateEntry)
    {
        $this->dateEntry = $dateEntry;

        return $this;
    }

    /**
     * Get dateEntry
     *
     * @return \DateTime
     */
    public function getDateEntry()
    {
        return $this->dateEntry;
    }

    /**
     * Set validity
     *
     * @param \DateTime $validity
     *
     * @return Stock
     */
    public function setValidity($validity)
    {
        $this->validity = $validity;

        return $this;
    }

    /**
     * Get validity
     *
     * @return \DateTime
     */
    public function getValidity()
    {
        return $this->validity;
    }

    /**
     * Add product
     *
     * @param \Product $product
     *
     * @return Stock
     */
    public function addProduct(Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Product $product
     */
    public function removeProduct(Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }
}

