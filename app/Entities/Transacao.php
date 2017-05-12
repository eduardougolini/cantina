<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Transacao
 *
 * @ORM\Table(name="transacao", indexes={@ORM\Index(name="fk_transacao_conta1_idx", columns={"conta_id"}), @ORM\Index(name="fk_transacao_venda1_idx", columns={"venda_id"})})
 * @ORM\Entity
 */
class Transacao
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
     * @ORM\Column(name="tipo", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=false, unique=false)
     */
    private $valor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $data;

    /**
     * @var \Conta
     *
     * @ORM\ManyToOne(targetEntity="Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conta_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $conta;

    /**
     * @var \Venda
     *
     * @ORM\ManyToOne(targetEntity="Venda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="venda_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $venda;


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Transacao
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
     * Set valor
     *
     * @param string $valor
     *
     * @return Transacao
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Transacao
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
     * Set conta
     *
     * @param \Conta $conta
     *
     * @return Transacao
     */
    public function setConta(\Conta $conta = null)
    {
        $this->conta = $conta;

        return $this;
    }

    /**
     * Get conta
     *
     * @return \Conta
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * Set venda
     *
     * @param \Venda $venda
     *
     * @return Transacao
     */
    public function setVenda(\Venda $venda = null)
    {
        $this->venda = $venda;

        return $this;
    }

    /**
     * Get venda
     *
     * @return \Venda
     */
    public function getVenda()
    {
        return $this->venda;
    }
}

