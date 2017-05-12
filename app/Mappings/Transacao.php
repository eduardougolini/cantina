<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Transacao
 *
 * @ORM\Table(name="transacao", indexes={@ORM\Index(name="fk_transacao_conta1_idx", columns={"conta_id"}), @ORM\Index(name="fk_transacao_venda1_idx", columns={"venda_id"})})
 * @ORM\Entity
 */
class Transacao
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
     * @ORM\Column(name="tipo", type="string", nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $valor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=false)
     */
    private $data;

    /**
     * @var \Conta
     *
     * @ORM\ManyToOne(targetEntity="Conta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conta_id", referencedColumnName="id")
     * })
     */
    private $conta;

    /**
     * @var \Venda
     *
     * @ORM\ManyToOne(targetEntity="Venda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="venda_id", referencedColumnName="id")
     * })
     */
    private $venda;


}

