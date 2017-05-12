<?php



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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=false)
     */
    private $quantidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_entrada", type="datetime", nullable=false)
     */
    private $dataEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validade", type="datetime", nullable=false)
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

}

