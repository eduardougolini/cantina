<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", uniqueConstraints={@ORM\UniqueConstraint(name="nome_UNIQUE", columns={"name"})}, indexes={@ORM\Index(name="fk_produto_Fornecedor1_idx", columns={"provider_id"}), @ORM\Index(name="fk_product_image1_idx", columns={"image_id"})})
 * @ORM\Entity
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=10, scale=2, nullable=false, unique=false)
     */
    private $value;

    /**
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $image;

    /**
     * @var \Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $provider;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Sale", mappedBy="product")
     */
    private $sale;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Stock", inversedBy="product")
     * @ORM\JoinTable(name="stock_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="stock_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $stock;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sale = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stock = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Product
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set image
     *
     * @param \Image $image
     *
     * @return Product
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set provider
     *
     * @param \Provider $provider
     *
     * @return Product
     */
    public function setProvider(Provider $provider = null)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return \Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Add sale
     *
     * @param \Sale $sale
     *
     * @return Product
     */
    public function addSale(Sale $sale)
    {
        $this->sale[] = $sale;

        return $this;
    }

    /**
     * Remove sale
     *
     * @param \Sale $sale
     */
    public function removeSale(Sale $sale)
    {
        $this->sale->removeElement($sale);
    }

    /**
     * Get sale
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Add stock
     *
     * @param \Stock $stock
     *
     * @return Product
     */
    public function addStock(Stock $stock)
    {
        $this->stock[] = $stock;

        return $this;
    }

    /**
     * Remove stock
     *
     * @param \Stock $stock
     */
    public function removeStock(Stock $stock)
    {
        $this->stock->removeElement($stock);
    }

    /**
     * Get stock
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStock()
    {
        return $this->stock;
    }
}

