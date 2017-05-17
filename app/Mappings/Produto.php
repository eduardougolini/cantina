<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto", uniqueConstraints={@ORM\UniqueConstraint(name="nome_UNIQUE", columns={"nome"})}, indexes={@ORM\Index(name="fk_produto_Fornecedor1_idx", columns={"fornecedor_id"})})
 * @ORM\Entity
 */
class Produto
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
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $valor;

    /**
     * @var \Fornecedor
     *
     * @ORM\ManyToOne(targetEntity="Fornecedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fornecedor_id", referencedColumnName="id")
     * })
     */
    private $fornecedor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Estoque", inversedBy="produto")
     * @ORM\JoinTable(name="estoque_has_produto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="produto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="estoque_id", referencedColumnName="id")
     *   }
     * )
     */
    private $estoque;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Venda", mappedBy="produto")
     */
    private $venda;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estoque = new \Doctrine\Common\Collections\ArrayCollection();
        $this->venda = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

