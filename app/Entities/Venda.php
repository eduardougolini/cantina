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
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tipo;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $cliente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produto", inversedBy="venda")
     * @ORM\JoinTable(name="venda_has_produto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="venda_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="produto_id", referencedColumnName="id", nullable=true)
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
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Venda
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Venda
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set cliente
     *
     * @param \Cliente $cliente
     *
     * @return Venda
     */
    public function setCliente(\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add produto
     *
     * @param \Produto $produto
     *
     * @return Venda
     */
    public function addProduto(\Produto $produto)
    {
        $this->produto[] = $produto;

        return $this;
    }

    /**
     * Remove produto
     *
     * @param \Produto $produto
     */
    public function removeProduto(\Produto $produto)
    {
        $this->produto->removeElement($produto);
    }

    /**
     * Get produto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduto()
    {
        return $this->produto;
    }
}

