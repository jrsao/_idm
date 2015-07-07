<?php

namespace PersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PersonBundle\Entity\Person;
use ContractBundle\Entity\Contract;

use DateTime;

/**
 * Client
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="PersonBundle\Entity\ClientRepository")
 */
class Client
{
    /**
     * @ORM\OneToMany(targetEntity="ContractBundle\Entity\Contract", mappedBy="client")
     **/
    private $contracts;
    
    /**
     * @ORM\OneToOne(targetEntity="Person", inversedBy="client", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     **/
    protected $person;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerDate", type="datetime")
     */
    private $registerDate;
    
    public function __construct()
    {
        $this->registerDate = new DateTime;
    }    
    
    public function __toString()
    {
        return (string)$this->person;
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
     * Set registerDate
     *
     * @param \DateTime $registerDate
     * @return Client
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }
    
    /**
     * Set person
     *
     * @param \Person $person
     * @return Client
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
     * Add contract
     *
     * @param \Adress $contract
     * @return Person
     */
    public function addContract(Contract $contract)
    {
        $contract->setClient($this);
        $this->contracts[] = $contract;
        
        return $this;
    }
    
    /**
     * remove contract
     *
     * @param \Adress $contract
     * @return Person
     */
    public function removeContract(Contract $contract)
    {
        $this->contracts->removeElement($contract);
        
        return $this;
    }
    
    /**
     * Set contracts
     *
     * @param \Adress $contracts
     * @return Person
     */
    public function setContracts($contracts)
    {
        $this->contracts = $contracts;

        return $this;
    }

    /**
     * Get contracts
     *
     * @return \Contract 
     */
    public function getContracts()
    {
        return $this->contracts ;
    }
}
