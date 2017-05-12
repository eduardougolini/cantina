<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 *
 * @ORM\Table(name="endereco", indexes={@ORM\Index(name="fk_endereco_pessoa1_idx", columns={"pessoa_id"})})
 * @ORM\Entity
 */
class Endereco
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
     * @ORM\Column(name="rua", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $uf;

    /**
     * @var \Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $pessoa;


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
     * Set rua
     *
     * @param string $rua
     *
     * @return Endereco
     */
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get rua
     *
     * @return string
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Endereco
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return Endereco
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set pessoa
     *
     * @param \Pessoa $pessoa
     *
     * @return Endereco
     */
    public function setPessoa(\Pessoa $pessoa = null)
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get pessoa
     *
     * @return \Pessoa
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }
}

