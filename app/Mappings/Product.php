<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", uniqueConstraints={@ORM\UniqueConstraint(name="nome_UNIQUE", columns={"name"})}, indexes={@ORM\Index(name="fk_produto_Fornecedor1_idx", columns={"provider_id"}), @ORM\Index(name="fk_product_image1_idx", columns={"image_id"})})
 * @ORM\Entity
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_entry", type="datetime", nullable=false)
     */
    private $dateEntry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validity", type="datetime", nullable=false)
     */
    private $validity;

    /**
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     * })
     */
    private $image;

    /**
     * @var \Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider_id", referencedColumnName="id")
     * })
     */
    private $provider;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Sale", mappedBy="product")
     */
    private $sale;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sale = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

