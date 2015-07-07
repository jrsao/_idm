<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\Parking;
use SiteBundle\Entity\Site;

/**
 * ParkingType
 *
 * @ORM\Table(name="parking_types")
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\UnitTypeRepository")
 */
class ParkingType
{
    /**
     * @ORM\ManyToMany(targetEntity="Site")
     * @ORM\JoinTable(name="parking_type_sites",
     *      joinColumns={@ORM\JoinColumn(name="parking_type_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="site_id", referencedColumnName="id")}
     *      )
     **/
    private $sites;
    
    /**
     * @ORM\OneToMany(targetEntity="Parking", mappedBy="parkingType")
     **/
    private $parkings;
    
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
     * @ORM\Column(name="description", type="string", length=255)
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
        return $this->description.' ( '.$this->suggestedPrice.' $ )';
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
     * Add parkings
     *
     * @param \Adress $parkings
     * @return ParkingType
     */
    public function addParking(Parking $parkings)
    {
        $parkings->setParkingType($this);
        $this->parkings[] = $parkings;
        
        return $this;
    }
    
    /**
     * remove parkings
     *
     * @param \Parking $parkings
     * @return ParkingType
     */
    public function removeParking(Parking $parkings)
    {
        $this->parkings->removeElement($parkings);
        
        return $this;
    }
    
    /**
     * Set parkings
     *
     * @param \Parking $parkings
     * @return ParkingType
     */
    public function setParkings(Parking $parkings)
    {
        $this->parkings = $parkings;

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
 
    /**
     * Add sites
     *
     * @param \Adress $sites
     * @return SiteType
     */
    public function addSite(Site $sites)
    {
        $sites->addParkingType($this);
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
