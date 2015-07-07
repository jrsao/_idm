<?php

namespace ContractBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PersonBundle\Entity\Client;
use SiteBundle\Entity\Unit;
use SiteBundle\Entity\Parking;
use ContractBundle\Entity\Payment;

/**
 * Contract
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContractBundle\Entity\ContractRepository")
 */
class Contract
{
    /**
     * @ORM\OneToMany(targetEntity="ContractBundle\Entity\Payment", mappedBy="contract")
     **/
    private $payments;
    
    /**
     * @ORM\ManyToOne(targetEntity="PersonBundle\Entity\Client", inversedBy="contracts", cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=false)
     **/
    private $client;
    
    /**
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Unit", inversedBy="contracts", cascade={"persist"})
     * @ORM\JoinColumn(name="unit_id", referencedColumnName="id", nullable=true)
     **/
    private $unit;
    
    /**
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Parking", inversedBy="contracts", cascade={"persist"})
     * @ORM\JoinColumn(name="parking_id", referencedColumnName="id", nullable=true)
     **/
    private $parking;
    
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
     * @ORM\Column(name="dateEntry", type="datetime")
     */
    private $dateEntry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLeaving", type="datetime")
     */
    private $dateLeaving;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;


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
     * Set dateEntry
     *
     * @param \DateTime $dateEntry
     * @return Contract
     */
    public function setDateEntry($dateEntry)
    {
        $this->dateEntry = $dateEntry;

        return $this;
    }

    /**
     * Get dateEntry
     *
     * @return \DateTime 
     */
    public function getDateEntry()
    {
        return $this->dateEntry;
    }

    /**
     * Set dateLeaving
     *
     * @param \DateTime $dateLeaving
     * @return Contract
     */
    public function setDateLeaving($dateLeaving)
    {
        $this->dateLeaving = $dateLeaving;

        return $this;
    }

    /**
     * Get dateLeaving
     *
     * @return \DateTime 
     */
    public function getDateLeaving()
    {
        return $this->dateLeaving;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Contract
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Set client
     *
     * @param string $client
     * @return Contract
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * Set unit
     *
     * @param string $unit
     * @return Contract
     */
    public function setUnit(Unit $unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    /**
     * Set parking
     *
     * @param string $parking
     * @return Contract
     */
    public function setParking(Parking $parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return string 
     */
    public function getParking()
    {
        return $this->parking;
    }
    
    /**
     * Add payment
     *
     * @param \Payment $payment
     * @return Contract
     */
    public function addPayment(Payment $payment)
    {
        $payment->setContract($this);
        $this->payments[] = $payment;
        
        return $this;
    }
    
    /**
     * remove payment
     *
     * @param \Payment $payment
     * @return Contract
     */
    public function removePayment(Payment $payment)
    {
        $this->payments->removeElement($payment);
        
        return $this;
    }
    
    /**
     * Set payments
     *
     * @param \Payment $payments
     * @return Contract
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * Get payments
     *
     * @return \Payment 
     */
    public function getPayments()
    {
        return $this->payments ;
    }
}
