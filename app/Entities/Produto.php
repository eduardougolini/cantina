<?php

namespace App\Entities;

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
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=false, unique=false)
     */
    private $valor;

    /**
     * @var \Fornecedor
     *
     * @ORM\ManyToOne(targetEntity="Fornecedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fornecedor_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $fornecedor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Estoque", inversedBy="produto")
     * @ORM\JoinTable(name="estoque_has_produto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="produto_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="estoque_id", referencedColumnName="id", nullable=true)
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
     * @return Produto
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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Produto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return Produto
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
     * Set fornecedor
     *
     * @param \Fornecedor $fornecedor
     *
     * @return Produto
     */
    public function setFornecedor(\Fornecedor $fornecedor = null)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    /**
     * Get fornecedor
     *
     * @return \Fornecedor
     */
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * Add estoque
     *
     * @param \Estoque $estoque
     *
     * @return Produto
     */
    public function addEstoque(\Estoque $estoque)
    {
        $this->estoque[] = $estoque;

        return $this;
    }

    /**
     * Remove estoque
     *
     * @param \Estoque $estoque
     */
    public function removeEstoque(\Estoque $estoque)
    {
        $this->estoque->removeElement($estoque);
    }

    /**
     * Get estoque
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * Add venda
     *
     * @param \Venda $venda
     *
     * @return Produto
     */
    public function addVenda(\Venda $venda)
    {
        $this->venda[] = $venda;

        return $this;
    }

    /**
     * Remove venda
     *
     * @param \Venda $venda
     */
    public function removeVenda(\Venda $venda)
    {
        $this->venda->removeElement($venda);
    }

    /**
     * Get venda
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVenda()
    {
        return $this->venda;
    }
}

