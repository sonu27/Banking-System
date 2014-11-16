<?php

namespace AR\BankingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banking
 *
 * @ORM\Table(name="banking", indexes={@ORM\Index(name="account_id", columns={"account_id"})})
 * @ORM\Entity(repositoryClass="AR\BankingBundle\Entity\BankingRepository")
 */
class Banking
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_type", type="string", length=255, nullable=false)
     */
    private $paymentType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=11, scale=2, nullable=false)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="float", precision=11, scale=2, nullable=false)
     */
    private $balance;

    /**
     * @var string
     *
     * @ORM\Column(name="account_name", type="string", length=255, nullable=false)
     */
    private $accountName;

    /**
     * @var string
     *
     * @ORM\Column(name="account_number", type="string", length=255, nullable=false)
     */
    private $accountNumber;

    /**
     * @var \Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

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
     * Set date
     *
     * @param  \DateTime $date
     * @return Banking
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set paymentType
     *
     * @param  string  $paymentType
     * @return Banking
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Get paymentType
     *
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set description
     *
     * @param  string  $description
     * @return Banking
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set amount
     *
     * @param  float   $amount
     * @return Banking
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set balance
     *
     * @param  float   $balance
     * @return Banking
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set accountName
     *
     * @param  string  $accountName
     * @return Banking
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;

        return $this;
    }

    /**
     * Get accountName
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * Set accountNumber
     *
     * @param  string  $accountNumber
     * @return Banking
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Set account
     *
     * @param  \AR\BankingBundle\Entity\Account $account
     * @return Banking
     */
    public function setAccount(\AR\BankingBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \AR\BankingBundle\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}
