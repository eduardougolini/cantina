<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_pessoa1_idx", columns={"pessoa_id"})})
 * @ORM\Entity
 */
class Usuario
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
     * @ORM\Column(name="email", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=300, precision=0, scale=0, nullable=false, unique=false)
     */
    private $senha;

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
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
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
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set pessoa
     *
     * @param \Pessoa $pessoa
     *
     * @return Usuario
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

