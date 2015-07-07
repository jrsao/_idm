<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Building
 *
 * @ORM\Table(name="buildings")
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\BuildingRepository")
 */
class Building
{
    /**
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="buildings", cascade={"persist"})
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     **/
    private $site;
        
    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="building")
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }
    
    /**
     * Set site
     *
     * @param \Space $site
     * @return Building
     */
    public function setSite(Site $site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \site 
     */
    public function getSite()
    {
        return $this->site ;
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
     * Set name
     *
     * @param string $name
     * @return Building
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Building
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
     * Add units
     *
     * @param \Adress $units
     * @return UnitType
     */
    public function addUnit(Unit $units)
    {
        $units->setBuilding($this);
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
}
