<?php

namespace CoordinateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PersonBundle\Entity\Person;
use SiteBundle\Entity\Site;

/**
 * PhoneNumber
 *
 * @ORM\Table(name="phone_numbers")
 * @ORM\Entity(repositoryClass="CoordinateBundle\Entity\PhoneNumberRepository")
 */
class PhoneNumber
{
    /**
     * @ORM\ManyToOne(targetEntity="PersonBundle\Entity\Person", inversedBy="phoneNumbers", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     **/
    private $person;
    
    /**
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Site", inversedBy="phoneNumbers", cascade={"persist"})
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
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=false)
     */
    private $contact;
    
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255, nullable=false)
     */
    private $phoneNumber;
    

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
     * Set contact
     *
     * @param  $contact
     * @return PhoneNumber
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
    
    /**
     * Set type
     *
     * @param  $type
     * @return PhoneNumber
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Type 
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Set phoneNumber
     *
     * @param  $phoneNumber
     * @return PhoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return \PhoneNumber 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
