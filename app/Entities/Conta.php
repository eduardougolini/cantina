<?php

namespace App\Entities;

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
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo", type="decimal", precision=10, scale=2, nullable=false, unique=false)
     */
    private $saldo;


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
     * Set saldo
     *
     * @param string $saldo
     *
     * @return Conta
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return string
     */
    public function getSaldo()
    {
        return $this->saldo;
    }
}

