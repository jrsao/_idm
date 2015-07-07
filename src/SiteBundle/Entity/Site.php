<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use SiteBundle\Entity\UnitType;
use SiteBundle\Entity\ParkingType;
use SiteBundle\Entity\Building;
use SiteBundle\Entity\Parking;

use CoordinateBundle\Entity\Address;
use CoordinateBundle\Entity\PhoneNumber;

/**
 * Site
 *
 * @ORM\Table(name="sites")
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\SiteRepository")
 */
class Site
{
    /**
     * @ORM\OneToMany(targetEntity="Building", mappedBy="site")
     **/
    private $buildings;
    
        /**
     * @ORM\OneToMany(targetEntity="Parking", mappedBy="site")
     **/
    private $parkings;
    
    /**
     * @ORM\ManyToMany(targetEntity="UnitType", mappedBy="sites")
     **/
    private $unitTypes;
    
    /**
     * @ORM\ManyToMany(targetEntity="ParkingType", mappedBy="sites")
     **/
    private $parkingTypes;
    
     /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\Address", mappedBy="site")
     **/
    private $addresses;
    
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\PhoneNumber", mappedBy="site")
     **/
    private $phoneNumbers;
    
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

    public function __toString()
    {
        return $this->getName();
    }
    public function __construct()
    {
        $this->buildings = new ArrayCollection();
        $this->parkings = new ArrayCollection();
        $this->unitTypes = new ArrayCollection();
        $this->parkingTypes = new ArrayCollection();
        $this->address = new ArrayCollection();
        $this->phoneNumbers = new ArrayCollection();
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
     * @return Site
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
     * getDefaultAddress
     * 
     * @return Address
     */
    public function getDefaultAddress()
    {
        $addresses = $this->getAddresses();
       
        if (sizeof($addresses) > 0) {
            return (string)$addresses[0];
        }
        
        return null;
    }
    
    
    /**
     * Add address
     *
     * @param \Adress $address
     * @return Site
     */
    public function addAddress(Address $address)
    {
        $address->setSite($this);
        $this->addresses[] = $address;
        
        return $this;
    }
    
    /**
     * remove address
     *
     * @param \Adress $address
     * @return Site
     */
    public function removeAddress(Address $address)
    {
        $this->addresses->removeElement($address);
        
        return $this;
    }
    
    /**
     * Set addresses
     *
     * @param \Adress $addresses
     * @return Site
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Get addresses
     *
     * @return \Address 
     */
    public function getAddresses()
    {
        return $this->addresses ;
    }
    
        /**
     * Add phoneNumber
     *
     * @param \Adress $phoneNumber
     * @return Site
     */
    public function addPhoneNumber(PhoneNumber $phoneNumber)
    {
        $phoneNumber->setSite($this);
        $this->phoneNumbers[] = $phoneNumber;
        
        return $this;
    }
    
    /**
     * remove phoneNumber
     *
     * @param \Adress $phoneNumber
     * @return Site
     */
    public function removePhoneNumber(PhoneNumber $phoneNumber)
    {
        $this->phoneNumbers->removeElement($phoneNumber);
        
        return $this;
    }
    
    /**
     * Set phoneNumbers
     *
     * @param \Adress $phoneNumbers
     * @return Site
     */
    public function setPhoneNumbers($phoneNumbers)
    {
        $this->phoneNumbers = $phoneNumbers;

        return $this;
    }

    /**
     * Get phoneNumbers
     *
     * @return \PhoneNumber 
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers ;
    }
    
    /**
     * Add unitTypes
     *
     * @param \Adress $unitTypes
     * @return UnitTypeType
     */
    public function addUnitType(UnitType $unitTypes)
    {
//        $unitTypes->addSite($this);
//        $this->unitTypes[] = $unitTypes;
        
        return $this;
    }
    
    /**
     * remove unitTypes
     *
     * @param \UnitType $unitTypes
     * @return UnitTypeType
     */
    public function removeUnitTypes(UnitType $unitTypes)
    {
        $this->unitTypes->removeElement($unitTypes);
        
        return $this;
    }
    
    /**
     * Set unitTypes
     *
     * @param \UnitType $unitTypes
     * @return UnitTypeType
     */
    public function setUnitTypes(UnitType $unitTypes)
    {
        $this->unitTypes = $unitTypes;

        return $this;
    }

    /**
     * Get unitTypes
     *
     * @return \UnitTypes 
     */
    public function getUnitTypes()
    {
        return $this->unitTypes ;
    }
    
    /**
     * Add parkingTypes
     *
     * @param \ParkingType $parkingType
     * @return Site
     */
    public function addParkingType(ParkingType $parkingType)
    {
//        $parkingType->setSite($this);
        $this->parkingTypes[] = $parkingType;
        
        return $this;
    }
    
    /**
     * remove parkingTypes
     *
     * @param \ParkingType $parkingTypes
     * @return Site
     */
    public function removeParkingType(ParkingType $parkingType)
    {
        $this->parkingTypes->removeElement($parkingType);
        
        return $this;
    }
    
    /**
     * Set parkingTypes
     *
     * @param \ParkingType $parkingType
     * @return Site
     */
    public function setParkingType(ParkingType $parkingType)
    {
        $this->parkingTypes = $parkingType;

        return $this;
    }

    /**
     * Get parkingTypes
     *
     * @return \ParkingTypes 
     */
    public function getParkingTypes()
    {
        return $this->parkingTypes ;
    }
    
    /**
     * Add buildings
     *
     * @param \Building $buildings
     * @return Site
     */
    public function addBuilding(Building $building)
    {
        $building->setSite($this);
        $this->buildings[] = $building;
        
        return $this;
    }
    
    /**
     * remove buildings
     *
     * @param \Building $building
     * @return Site
     */
    public function removeBuilding(Building $building)
    {
        $this->buildings->removeElement($building);
        
        return $this;
    }
    
    /**
     * Set buildings
     *
     * @param \Building $buildings
     * @return Site
     */
    public function setBuildings(Building $buildings)
    {
        $this->buildings = $buildings;

        return $this;
    }

    /**
     * Get buildings
     *
     * @return \Buildings 
     */
    public function getBuildings()
    {
        return $this->buildings ;
    }
    
        
    /**
     * Add parkings
     *
     * @param \Parking $parking
     * @return Site
     */
    public function addParking(Parking $parking)
    {
        $parking->setSite($this);
        $this->parkings[] = $parking;
        
        return $this;
    }
    
    /**
     * remove parkings
     *
     * @param \Parking $parkings
     * @return Site
     */
    public function removeParking(Parking $parking)
    {
        $this->parkings->removeElement($parking);
        
        return $this;
    }
    
    /**
     * Set parkings
     *
     * @param \Parking $parking
     * @return Site
     */
    public function setParking(Parking $parking)
    {
        $this->parkings = $parking;

        return $this;
    }

    /**
     * Get parkings
     *
     * @return \Parkings 
     */
    public function getParkings()
    {
        return $this->parkings ;
    }
}
