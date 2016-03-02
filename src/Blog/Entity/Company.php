<?php 

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company Details Entity
 *
 * @Entity(repositoryClass="Blog\Repository\CompanyRepository")
 * @Table=(indexes={
 *     @Index(name="regdate_idx", columns="regDate")}
 * )
 * @HasLifecycleCallbacks
 */
class Company
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
	 * @var string
	 * @Column(type="string")
	 */
	protected $name;

    /**
     * @var address
     * 
     * @OneToMany(targetEntity="Address", mappedBy="company",
     *     fetch="EAGER", cascade={"persist"}, orphanRemoval=true)    
     */
    protected $address;

	/**
	 * @var string
	 * @Column(type="string")
	 */
	protected $country;

	/**
	 * @var region
	 * @Column(type="string")
	 */
	protected $region;

	/**
	 * @var city
	 * @Column(type="string")
	 */
	protected $city;

	/**
	 * @var street
	 * @Column(type="string")
	 */
	protected $street;

	/**
	 * @var postCode
	 * @Column(type="string")
	 */
	protected $postCode;

	/**
	 *	This is the companies Registration Number
	 * 
	 * @var regNo
	 * @Column(type="string")
	 */
	protected $regNo;

	/**
	 * This is the companies Registration Date
	 * 
	 * @var regDate
	 * @Column(type="datetime", options={"default": "0000-00-00 00:00:00"})
	 */
	protected $regDate;

	/**
	 * This is the companies registered tax number
	 * 
	 * @var taxNo
     * @Column(type="string")
	 */
	protected $taxNo;

    /**
     * @var website
     * @Column(type="string")
     */
    protected $website;

    /**
     * @var product
     *
     * @OneToMany(targetEntity="Product", mappedBy="company")
     */
    protected $product;

    /**
     * @var currency
     * 
     * @ManyToMany(targetEntity="Currency", mappedBy="company",
     *     fetch="EAGER", cascade={"persist"}, orphanRemoval=true)
     *
     * @JoinTable(
     *     inverseJoinColumns={@JoinColumn(name="currency_id",
     * referencedColumnName="id")}
     * )
     */
    protected $currency;

    /**
     * @var  $employee
     * 
     * @OnetoMany(targetEntity="Employee", mappedBy="company")
     */
    protected $employee;
    
    /**
     * Set name
     *
     * @param string $name
     * @return Company
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
     * Set country
     *
     * @param \country $country
     * @return Company
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Company
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     * @return Company
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string 
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set regNo
     *
     * @param string $regNo
     * @return Company
     */
    public function setRegNo($regNo)
    {
        $this->regNo = $regNo;

        return $this;
    }

    /**
     * Get regNo
     *
     * @return string 
     */
    public function getRegNo()
    {
        return $this->regNo;
    }

    /**
     * Set regDate
     *
     * @param \DateTime $regDate
     * @return Company
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get regDate
     *
     * @return \DateTime 
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add address
     *
     * @param \Blog\Entity\Address $address
     * @return Company
     */
    public function addAddress(\Blog\Entity\Address $address)
    {
        $this->address[] = $address;

        // This allows persisting with an association from inverse side
        $address->setCompany($this);

        return $this;
    }

    /**
     * Remove address
     *
     * @param \Blog\Entity\Address $address
     */
    public function removeAddress(\Blog\Entity\Address $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddresses()
    {
        return $this->addresses;
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
     * Set taxNo
     *
     * @param string $taxNo
     * @return Company
     */
    public function setTaxNo($taxNo)
    {
        $this->taxNo = $taxNo;

        return $this;
    }

    /**
     * Get taxNo
     *
     * @return string 
     */
    public function getTaxNo()
    {
        return $this->taxNo;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Company
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
     * Add currency
     *
     * @param \Blog\Entity\Currency $currency
     * @return Company
     */
    public function addCurrency(\Blog\Entity\Currency $currency)
    {
        $this->currency[] = $currency;

        $currency->setCurrency($this);

        return $this;
    }

    /**
     * Remove currency
     *
     * @param \Blog\Entity\Currency $currency
     */
    public function removeCurrency(\Blog\Entity\Currency $currency)
    {
        $this->currency->removeElement($currency);
    }

    /**
     * Get currency
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /** 
     * Get Employee
     *
     * @return  employee
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Add product
     *
     * @param \Blog\Entity\Product $product
     * @return Company
     */
    public function addProduct(\Blog\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Blog\Entity\Product $product
     */
    public function removeProduct(\Blog\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add employee
     *
     * @param \Blog\Entity\Employee $employee
     * @return Company
     */
    public function addEmployee(\Blog\Entity\Employee $employee)
    {
        $this->employee[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param \Blog\Entity\Employee $employee
     */
    public function removeEmployee(\Blog\Entity\Employee $employee)
    {
        $this->employee->removeElement($employee);
    }
}
