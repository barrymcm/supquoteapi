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
 * Currency Entity
 * A currency belongs to one country
 *
 * @Entity
 * @Table=(indexes={
 *     @Index(name="country_idx", columns="company")}
 * )
 * @HasLifeCycleCallbacks
 */
class Currency 
{
	/**
	 * @var  int [description]
	 *
	 * @Id
	 * @GeneratedValue
	 * @Column(type="integer")
	 */
	protected $id;

	/**
	 * @var  string [description]
     * 
	 * @Column(type="string")
	 */
    protected $name;

    /**
     * @var country [description]
     *
     * @Column(type="string")
     */
    protected $country;

    /**
     * @var code [the code is used to identify the currency]
     *
     * @Column(type="string")
     */
    protected $code;
    
    
    /**
     * @var company
     * 
     * @ManyToMany(targetEntity="Company", inversedBy="currency")
     */
    protected $company;

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
     * @return Currency
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
     * Set company
     *
     * @param \Blog\Entity\Company $company
     * @return Currency
     */
    public function setCompany(\Blog\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
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
     * Constructor
     */
    public function __construct()
    {
        $this->company = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Currency
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Currency
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add company
     *
     * @param \Blog\Entity\Company $company
     * @return Currency
     */
    public function addCompany(\Blog\Entity\Company $company)
    {
        $this->company[] = $company;

        return $this;
    }

    /**
     * Remove company
     *
     * @param \Blog\Entity\Company $company
     */
    public function removeCompany(\Blog\Entity\Company $company)
    {
        $this->company->removeElement($company);
    }
}
