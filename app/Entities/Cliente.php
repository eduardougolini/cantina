<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", uniqueConstraints={@ORM\UniqueConstraint(name="matricula_UNIQUE", columns={"matricula"})}, indexes={@ORM\Index(name="fk_cliente_pessoa1_idx", columns={"pessoa_id"}), @ORM\Index(name="fk_cliente_conta1_idx", columns={"conta_id"})})
 * @ORM\Entity
 */
class Cliente
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
     * @ORM\Column(name="matricula", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $matricula;

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
     * Set matricula
     *
     * @param string $matricula
     *
     * @return Cliente
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set conta
     *
     * @param \Conta $conta
     *
     * @return Cliente
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
     * Set pessoa
     *
     * @param \Pessoa $pessoa
     *
     * @return Cliente
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

