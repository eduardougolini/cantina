<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Venda
 *
 * @ORM\Table(name="venda", indexes={@ORM\Index(name="fk_venda_cliente1_idx", columns={"cliente_id"})})
 * @ORM\Entity
 */
class Venda
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
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", nullable=false)
     */
    private $tipo;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produto", inversedBy="venda")
     * @ORM\JoinTable(name="venda_has_produto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="venda_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     *   }
     * )
     */
    private $produto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produto = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

