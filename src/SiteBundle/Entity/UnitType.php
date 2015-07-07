<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use SiteBundle\Entity\Site;

/**
 * SpaceType
 *
 * @ORM\Table(name="unit_types")
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\UnitTypeRepository")
 */
class UnitType
{
    /**
     * @ORM\ManyToMany(targetEntity="Site")
     * @ORM\JoinTable(name="unit_types_sites",
     *      joinColumns={@ORM\JoinColumn(name="unit_type_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")}
     *      )
     **/
    private $sites;
    
    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="unitType")
     **/
    private $units;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=false)
     */
    private $width;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=false)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="suggestedPrice", type="decimal")
     */
    private $suggestedPrice;
    
    public function __toString()
    {
        return $this->getWidth()."' x ".$this->getHeight()."':   ".$this->getSuggestedPrice()." $";
    }
    
    public function __construct()
    {
        $this->units = new ArrayCollection();
        $this->sites = new ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return SpaceType
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
     * Set suggestedPrice
     *
     * @param string $suggestedPrice
     * @return SpaceType
     */
    public function setSuggestedPrice($suggestedPrice)
    {
        $this->suggestedPrice = $suggestedPrice;

        return $this;
    }

    /**
     * Get suggestedPrice
     *
     * @return string 
     */
    public function getSuggestedPrice()
    {
        return $this->suggestedPrice;
    }
    
    /**
     * Set width
     *
     * @param string $width
     * @return SpaceType
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string 
     */
    public function getWidth()
    {
        return $this->width;
    }
    
    /**
     * Set height
     *
     * @param string $height
     * @return SpaceType
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string 
     */
    public function getHeight()
    {
        return $this->height;
    }
    
    /**
     * Add units
     *
     * @param \Adress $units
     * @return UnitType
     */
    public function addUnit(Unit $units)
    {
        $units->setUnitType($this);
        $this->units[] = $units;
        
        return $this;
    }
    
    /**
     * remove units
     *
     * @param \Unit $units
     * @return UnitType
     */
    public function removeUnit(Unit $units)
    {
        $this->units->removeElement($units);
        
        return $this;
    }
    
    /**
     * Set units
     *
     * @param \Unit $units
     * @return UnitType
     */
    public function setUnits(Unit $units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units
     *
     * @return \Units 
     */
    public function getUnits()
    {
        return $this->units ;
    }
 
    /**
     * Add sites
     *
     * @param \Adress $sites
     * @return SiteType
     */
    public function addSite(Site $sites)
    {
        $sites->addUnitType($this);
        $this->sites[] = $sites;
        
        return $this;
    }
    
    /**
     * remove sites
     *
     * @param \Site $sites
     * @return SiteType
     */
    public function removeSite(Site $sites)
    {
        $this->sites->removeElement($sites);
        
        return $this;
    }
    
    /**
     * Set sites
     *
     * @param \Site $sites
     * @return SiteType
     */
    public function setSites(Site $sites)
    {
        $this->sites = $sites;

        return $this;
    }

    /**
     * Get sites
     *
     * @return \Sites 
     */
    public function getSites()
    {
        return $this->sites ;
    }
}
