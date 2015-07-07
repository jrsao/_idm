<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\Building;
use SiteBundle\Entity\UnitType;

/**
 * Unit
 *
 * @ORM\Table(name="units")
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\UnitRepository")
 */
class Unit
{
    /**
     * @ORM\ManyToOne(targetEntity="Building", inversedBy="units", cascade={"persist"})
     * @ORM\JoinColumn(name="building_id", referencedColumnName="id")
     **/
    protected $building;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnitType", inversedBy="units", cascade={"persist"})
     * @ORM\JoinColumn(name="unit_type_id", referencedColumnName="id")
     **/
    protected $unitType;
    
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
     * @ORM\Column(name="no", type="string", length=255)
     */
    private $no;


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
     * Set no
     *
     * @param string $no
     * @return Unit
     */
    public function setNo($no)
    {
        $this->no = $no;

        return $this;
    }

    /**
     * Get no
     *
     * @return string 
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * Set building
     *
     * @param \Building $building
     * @return Unit
     */
    public function setBuilding(Building $building)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return \Building 
     */
    public function getBuilding()
    {
        return $this->building;
    }
    
    /**
     * Set unitType
     *
     * @param \UnitType $unitType
     * @return Unit
     */
    public function setUnitType(UnitType $unitType)
    {
        $this->unitType = $unitType;

        return $this;
    }

    /**
     * Get unitType
     *
     * @return \UnitType 
     */
    public function getUnitType()
    {
        return $this->unitType;
    }
}
