<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estoque
 *
 * @ORM\Table(name="estoque")
 * @ORM\Entity
 */
class Estoque
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
     * @ORM\Column(name="nome", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $quantidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_entrada", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dataEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validade", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $validade;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produto", mappedBy="estoque")
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
     * Set nome
     *
     * @param string $nome
     *
     * @return Estoque
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
     * Set quantidade
     *
     * @param integer $quantidade
     *
     * @return Estoque
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set dataEntrada
     *
     * @param \DateTime $dataEntrada
     *
     * @return Estoque
     */
    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;

        return $this;
    }

    /**
     * Get dataEntrada
     *
     * @return \DateTime
     */
    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    /**
     * Set validade
     *
     * @param \DateTime $validade
     *
     * @return Estoque
     */
    public function setValidade($validade)
    {
        $this->validade = $validade;

        return $this;
    }

    /**
     * Get validade
     *
     * @return \DateTime
     */
    public function getValidade()
    {
        return $this->validade;
    }

    /**
     * Add produto
     *
     * @param \Produto $produto
     *
     * @return Estoque
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

