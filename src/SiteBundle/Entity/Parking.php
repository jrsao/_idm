<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\Vehicule;
use SiteBundle\Entity\Site;
use SiteBundle\Entity\ParkingType;

/**
 * Parking
 *
 * @ORM\Table(name="parkings")
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\ParkingRepository")
 */
class Parking
{    
    /**
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="parkings", cascade={"persist"})
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     **/
    protected $site;
    
    /**
     * @ORM\ManyToOne(targetEntity="ParkingType", inversedBy="parkings", cascade={"persist"})
     * @ORM\JoinColumn(name="parking_type_id", referencedColumnName="id")
     **/
    protected $parkingType;
    
    /**
     * @ORM\OneToMany(targetEntity="Vehicule", mappedBy="parking")
     **/
    private $vehicules;
    
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
     * @return Parking
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
     * Add vehicules
     *
     * @param \Adress $vehicules
     * @return VehiculeType
     */
    public function addVehicules(Vehicule $vehicules)
    {
        $vehicules->setParking($this);
        $this->vehicules[] = $vehicules;
        
        return $this;
    }
    
    /**
     * remove vehicules
     *
     * @param \Vehicule $vehicules
     * @return VehiculeType
     */
    public function removeVehicules(Vehicule $vehicules)
    {
        $this->vehicules->removeElement($vehicules);
        
        return $this;
    }
    
    /**
     * Set vehicules
     *
     * @param \Vehicule $vehicules
     * @return VehiculeType
     */
    public function setVehicules(Vehicule $vehicules)
    {
        $this->vehicules = $vehicules;

        return $this;
    }

    /**
     * Get vehicules
     *
     * @return \Vehicules 
     */
    public function getVehicules()
    {
        return $this->vehicules ;
    }
    
    /**
     * Set site
     *
     * @param \Site $site
     * @return Parking
     */
    public function setSite(Site $site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \Site
     */
    public function getSite()
    {
        return $this->site;
    }
    
    /**
     * Set parkingType
     *
     * @param \ParkingType $parkingType
     * @return Parking
     */
    public function setParkingType(ParkingType $parkingType)
    {
        $this->parkingType = $parkingType;

        return $this;
    }

    /**
     * Get parkingType
     *
     * @return \ParkingType
     */
    public function getParkingType()
    {
        return $this->parkingType;
    }
}
