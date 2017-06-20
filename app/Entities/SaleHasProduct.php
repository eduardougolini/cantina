<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaleHasProduct
 *
 * @ORM\Table(name="sale_has_product", indexes={@ORM\Index(name="fk_venda_has_produto_produto1_idx", columns={"product_id"}), @ORM\Index(name="fk_venda_has_produto_venda1_idx", columns={"sale_id"})})
 * @ORM\Entity
 */
class SaleHasProduct
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
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $product;

    /**
     * @var \Sale
     *
     * @ORM\ManyToOne(targetEntity="Sale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sale_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $sale;


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
     * Set amount
     *
     * @param integer $amount
     *
     * @return SaleHasProduct
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
     * Set product
     *
     * @param \Product $product
     *
     * @return SaleHasProduct
     */
    public function setProduct(\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set sale
     *
     * @param \Sale $sale
     *
     * @return SaleHasProduct
     */
    public function setSale(\Sale $sale = null)
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get sale
     *
     * @return \Sale
     */
    public function getSale()
    {
        return $this->sale;
    }
}

