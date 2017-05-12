<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="pessoa")
 * @ORM\Entity
 */
class Pessoa
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
     * @ORM\Column(name="nome", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="nascimento", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="responsavel", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $responsavel;


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
     * Set nome
     *
     * @param string $nome
     *
     * @return Pessoa
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set nascimento
     *
     * @param string $nascimento
     *
     * @return Pessoa
     */
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    /**
     * Get nascimento
     *
     * @return string
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Pessoa
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Pessoa
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Pessoa
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set rg
     *
     * @param string $rg
     *
     * @return Pessoa
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get rg
     *
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set responsavel
     *
     * @param string $responsavel
     *
     * @return Pessoa
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Get responsavel
     *
     * @return string
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }
}

