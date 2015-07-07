<?php

namespace PersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use PersonBundle\Entity\Client;
use CoordinateBundle\Entity\Address;
use CoordinateBundle\Entity\PhoneNumber;

/**
 * Person
 *
 * @ORM\Table(name="persons")
 * @ORM\Entity(repositoryClass="PersonBundle\Entity\PersonRepository")
 */
class Person
{
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\Address", mappedBy="person")
     **/
    private $addresses;
    
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\PhoneNumber", mappedBy="person")
     **/
    private $phoneNumbers;
    
    /**
     * @ORM\OneToOne(targetEntity="Client", mappedBy="person")
     **/
   protected $client;
    
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    public function __toString()
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Set client
     *
     * @param \Client $client
     * @return Person
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * Add address
     *
     * @param \Adress $address
     * @return Person
     */
    public function addAddress(Address $address)
    {
        $address->setPerson($this);
        $this->addresses[] = $address;
        
        return $this;
    }
    
    /**
     * remove address
     *
     * @param \Adress $address
     * @return Person
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
     * @return Person
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
     * @return Person
     */
    public function addPhoneNumber(PhoneNumber $phoneNumber)
    {
        $phoneNumber->setPerson($this);
        $this->phoneNumbers[] = $phoneNumber;
        
        return $this;
    }
    
    /**
     * remove phoneNumber
     *
     * @param \Adress $phoneNumber
     * @return Person
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
     * @return Person
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
}
