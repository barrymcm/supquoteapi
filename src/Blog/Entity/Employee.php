<?php 

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;

/** 
 * Employee Details Entity
 * An employee belongs to one company
 * 
 * @Entity(repositoryClass="Blog\Repository\EmployeeRepository")
 * @Table=(indexes={
 *     @Index(name="company_idx", columns="company")}
 * )
 */
class Employee
{
	/**
	 * @var int
	 * 
	 * @Id
	 * @GeneratedValue
	 * @Column(type="integer")
	 */
	protected $id;

	/**
	 * @var firstName
     * 
	 * @Column(type="string")
	 */
	protected $firstName;

	/**
	 * @var lastName
     * 
	 * @Column(type="string")
	 */
	protected $lastName;

	/**
	 * @var position
     * 
	 * @Column(type="string")
	 */
	protected $position;

	/**
	 * @var phone
     * 
	 * @Column(type="integer")
	 */
	protected $phone;

	/**
	 * @var fax
     * 
	 * @Column(type="integer")
	 */
	protected $fax;

	/**
	 * @var email
     * 
	 * @Column(type="string")
	 */
	protected $email;

    /**
     * @var  $company
     * 
     * @ManyToOne(targetEntity="Company", inversedBy="employee")
     */
    protected $company;  
    
    /**
     * @var  company_id 
     *
     * @Column(type="integer")
     */
    protected $company_id;

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
     * @return Employee
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
     * @return Employee
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
     * Set position
     *
     * @param string $position
     * @return Employee
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return Employee
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param integer $fax
     * @return Employee
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return integer 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->company = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Company
     *
     * @param  \Blog\Entity\Company $company
     * @return  Employee
     */
    public function addCompany(\Blog\Entity\Company $company = null)
    {
        $this->company[] = $company;

        // This allows persisting with an association from mapped side
        $company->setEmployee($this);

        return $this;
    }

    /**
     * Set company
     *
     * @param \Blog\Entity\Company $company
     * @return Employee
     */
    public function setCompany(\Blog\Entity\Company $company = null)
    {
        $this->company = $company;

        return $company;
    }    

    /**
     * Remove Company
     *
     * @param  \Blog\Entity\Company $company
     */
    public function removeCompany(\Blog\Entity\Company $company)
    {
        $this->company->removeElement($company);
    }

    /**
     * Get company_id
     *
     * @return \Blog\Entity\Company 
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Get company
     *
     * @return \Blog\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return Employee
     */
    public function setCompanyId($companyId)
    {
        $this->company_id = $companyId;

        return $this;
    }
}
