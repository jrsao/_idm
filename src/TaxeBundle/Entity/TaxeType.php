<?php

namespace TaxeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TaxeBundle\Entity\Taxe;

/**
 * TaxeType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TaxeType
{
    /**
     * @ORM\OneToMany(targetEntity="TaxeBundle\Entity\Taxe", mappedBy="taxeType")
     **/
    private $taxes;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10)
     */
    private $type;

    public function __toString()
    {
        return $this->type;
    }

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
     * Set type
     *
     * @param string $type
     * @return TaxeType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
        
    /**
     * Add taxe
     *
     * @param \Adress $taxe
     * @return TaxeType
     */
    public function addTaxe(Taxe $taxe)
    {
        $taxe->setTaxeType($this);
        $this->taxes[] = $taxe;
        
        return $this;
    }
    
    /**
     * remove taxe
     *
     * @param \Adress $taxe
     * @return TaxeType
     */
    public function removeTaxe(Taxe $taxe)
    {
        $this->taxes->removeElement($taxe);
        
        return $this;
    }
    
    /**
     * Set taxes
     *
     * @param \Adress $taxes
     * @return TaxeType
     */
    public function setTaxes($taxes)
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * Get taxes
     *
     * @return \Taxe 
     */
    public function getTaxes()
    {
        return $this->taxes ;
    }
}
