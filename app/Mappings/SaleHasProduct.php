<?php



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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \Sale
     *
     * @ORM\ManyToOne(targetEntity="Sale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sale_id", referencedColumnName="id")
     * })
     */
    private $sale;


}

