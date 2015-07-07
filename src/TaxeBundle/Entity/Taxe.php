<?php

namespace TaxeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TaxeBundle\Entity\TaxeType;

/**
 * Taxe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TaxeBundle\Entity\TaxeRepository")
 */
class Taxe
{
    /**
     * @ORM\ManyToOne(targetEntity="TaxeBundle\Entity\TaxeType", inversedBy="taxes", cascade={"persist"})
     * @ORM\JoinColumn(name="taxe_type_id", referencedColumnName="id", nullable=false)
     **/
    private $taxeType;
    
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
     * @ORM\Column(name="changingDate", type="datetime")
     */
    private $changingDate;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float")
     */
    private $rate;


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
     * Set changingDate
     *
     * @param \DateTime $changingDate
     * @return Taxe
     */
    public function setChangingDate($changingDate)
    {
        $this->changingDate = $changingDate;

        return $this;
    }

    /**
     * Get changingDate
     *
     * @return \DateTime 
     */
    public function getChangingDate()
    {
        return $this->changingDate;
    }

    /**
     * Set rate
     *
     * @param float $rate
     * @return Taxe
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return float 
     */
    public function getRate()
    {
        return $this->rate;
    }
    
    /**
     * Set taxeType
     *
     * @param float $taxeType
     * @return Taxe
     */
    public function setTaxeType(TaxeType $taxeType)
    {
        $this->taxeType = $taxeType;

        return $this;
    }

    /**
     * Get taxeType
     *
     * @return float 
     */
    public function getTaxeType()
    {
        return $this->taxeType;
    }
}
