<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario", indexes={@ORM\Index(name="fk_funcionario_pessoa1_idx", columns={"pessoa_id"})})
 * @ORM\Entity
 */
class Funcionario
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
     * @ORM\Column(name="funcao", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $funcao;

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
     * Set funcao
     *
     * @param string $funcao
     *
     * @return Funcionario
     */
    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;

        return $this;
    }

    /**
     * Get funcao
     *
     * @return string
     */
    public function getFuncao()
    {
        return $this->funcao;
    }

    /**
     * Set pessoa
     *
     * @param \Pessoa $pessoa
     *
     * @return Funcionario
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

