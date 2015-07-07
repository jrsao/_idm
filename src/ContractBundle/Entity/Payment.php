<?php

namespace ContractBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContractBundle\Entity\Contract;

/**
 * Payment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContractBundle\Entity\PaymentRepository")
 */
class Payment
{
    /**
     * @ORM\ManyToOne(targetEntity="PersonBundle\Entity\Client", inversedBy="payments", cascade={"persist"})
     * @ORM\JoinColumn(name="contract_id", referencedColumnName="id", nullable=false)
     **/
    private $contract;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePayment", type="datetime")
     */
    private $datePayment;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal")
     */
    private $amount;


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
     * Set datePayment
     *
     * @param \DateTime $datePayment
     * @return Payment
     */
    public function setDatePayment($datePayment)
    {
        $this->datePayment = $datePayment;

        return $this;
    }

    /**
     * Get datePayment
     *
     * @return \DateTime 
     */
    public function getDatePayment()
    {
        return $this->datePayment;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
    /**
     * Set contract
     *
     * @param string $contract
     * @return Payment
     */
    public function setContract(Contract $contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return contract 
     */
    public function getContract()
    {
        return $this->contract;
    }
}
