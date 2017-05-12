<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Conta
 *
 * @ORM\Table(name="conta")
 * @ORM\Entity
 */
class Conta
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
     * @ORM\Column(name="saldo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $saldo;


}

