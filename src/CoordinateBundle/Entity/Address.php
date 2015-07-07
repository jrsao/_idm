<?php

namespace CoordinateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PersonBundle\Entity\Person;
use CoordinateBundle\Entity\Country;
use CoordinateBundle\Entity\State;
use CoordinateBundle\Entity\City;
use SiteBundle\Entity\Site;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="CoordinateBundle\Entity\AddressRepository")
 */
class Address
{
    /**
     * @ORM\ManyToOne(targetEntity="State", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     **/
    private $state;
    
    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="address", cascade={"persist"})
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     **/
    private $city;
   
    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="address", cascade={"persist"})
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     **/
    private $country;
    
    /**
     * @ORM\ManyToOne(targetEntity="PersonBundle\Entity\Person", inversedBy="address", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     **/
    private $person;
    
    /**
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Site", inversedBy="address", cascade={"persist"})
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     **/
    private $site;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="streetNumber", type="integer", nullable=false)
     */
    private $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=15, nullable=true)
     */
    private $zipCode;

    public function __toString()
    {
        return $this->getStreetNumber().' '.$this->getStreet().' '.$this->getCity();
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
     * Set streetNumber
     *
     * @param integer $streetNumber
     * @return Address
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return integer 
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
    
        
    /**
     * Set person
     *
     * @param \Person $person
     * @return Address
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
    
    /**
     * Set site
     *
     * @param \Site $site
     * @return Address
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
     * Set Country
     *
     * @param \Country $country
     * @return Address
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Set State
     *
     * @param \State $state
     * @return Address
     */
    public function setState(State $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \State 
     */
    public function getState()
    {
        return $this->state;
    }
    
    /**
     * Set City
     *
     * @param \City $city
     * @return Address
     */
    public function setCity(City $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \City 
     */
    public function getCity()
    {
        return $this->city;
    }
}
