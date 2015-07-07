<?php

namespace ContractBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContractBundle\Entity\ContractRepository")
 */
class Contract
{
    /**
     * @ORM\ManyToOne(targetEntity="PersonBundle\Entity\Client", inversedBy="contract", cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     **/
    private $client;
    
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
    public function setClient($client)
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
}
