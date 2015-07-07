<?php

namespace CoordinateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity(repositoryClass="CoordinateBundle\Entity\CountryRepository")
 */
class Country
{
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\State", mappedBy="country")
     **/
    private $states;
    
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\Address", mappedBy="country")
     **/
    private $addresses;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=15, nullable=true)
     */
    private $iso;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer", nullable=true)
     */
    private $code;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
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
     * @return Country
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
     * Set iso
     *
     * @param string $iso
     * @return Country
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string 
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * Set states
     *
     * @param \Adress $states
     * @return Country
     */
    public function setStates($states)
    {
        $this->states = $states;

        return $this;
    }

    /**
     * Get states
     *
     * @return \Country 
     */
    public function getStates()
    {
        return $this->states ;
    }
    
    /**
     * Add address
     *
     * @param \Adress $address
     * @return Country
     */
    public function addAddress(Address $address)
    {
        $address->setCountry($this);
        
        $this->addresses[] = $address;
        
        return $this;
    }
    
    /**
     * remove address
     *
     * @param \Adress $address
     * @return Country
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
     * @return Country
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
}
