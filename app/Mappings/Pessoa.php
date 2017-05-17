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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="nascimento", type="string", length=45, nullable=false)
     */
    private $nascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=45, nullable=false)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=45, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=45, nullable=false)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="responsavel", type="string", length=100, nullable=true)
     */
    private $responsavel;


}

