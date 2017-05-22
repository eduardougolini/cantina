<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", uniqueConstraints={@ORM\UniqueConstraint(name="matricula_UNIQUE", columns={"regitration"})}, indexes={@ORM\Index(name="fk_cliente_pessoa1_idx", columns={"person_id"}), @ORM\Index(name="fk_cliente_conta1_idx", columns={"account_id"})})
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="regitration", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $regitration;

    /**
     * @var \Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $account;

    /**
     * @var \Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $person;


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
     * Set regitration
     *
     * @param string $regitration
     *
     * @return Client
     */
    public function setRegitration($regitration)
    {
        $this->regitration = $regitration;

        return $this;
    }

    /**
     * Get regitration
     *
     * @return string
     */
    public function getRegitration()
    {
        return $this->regitration;
    }

    /**
     * Set account
     *
     * @param \Account $account
     *
     * @return Client
     */
    public function setAccount(\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set person
     *
     * @param \Person $person
     *
     * @return Client
     */
    public function setPerson(\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}

