<?php 

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Address Entity
 * A company can have multiple addresses
 *
 * @Entity(repositoryClass="Blog\Repository\AddressRepository")
 * @Table=(indexes={
 *     @Index(name="country_idx", columns="country")}
 * )
 * @HasLifecycleCallbacks
 */
class Address
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
	 * @var company
     * 
	 * @ManyToOne(targetEntity="Company", inversedBy="address")
	 */
	protected $company;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set country
     *
     * @param $country
     * @return Address
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
     * @return Address
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
     * @return Address
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
     * @return Address
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
     * Get company
     *
     * @return \Blog\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set company
     *
     * @param \Blog\Entity\Company $company
     * @return Address
     */
    public function addCompany(\Blog\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Set company
     *
     * @param \Blog\Entity\Company $company
     * @return Address
     */
    public function setCompany(\Blog\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
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

    
}
