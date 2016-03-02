<?php 

namespace Blog\Entity;

use Blog\Repository\PostRepository;
use Blog\Repository\BlogRepository;
use Symfony\Component\Finder\Finder;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Blog\Repository\RepositoryContainer;
use Silex\Application as SilexApplication;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Blog\Provider\ApplicationServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\SwiftmailerServiceProvider;
use Blog\Controller\ApplicationControllerProvider;


/**
 * Product Details Entity
 * A product belongs to one companies
 *
 * @Entity(repositoryClass="Blog\Repository\ProductRepository")
 * @Table=(indexes={
 * 		@Index(name="company_idx", columns="company"),
 * 		@Index(name="category_idx", columns="category")
 * })
 */
class Product
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
	 * @var name
	 * 
	 * @Column(type="string")
	 */
	protected $name;

	/**
	 * @var description
	 *
	 * @Column(type="text")
	 */
	protected $description;
	
	/**
	 * @var price
	 *
	 * @Column(type="integer")
	 */
	protected $price;
	
	/**
	 * @var quantity
	 *
	 * @Column(type="decimal")
	 */
	protected $quantity;
	
	/**
	 * @var company
	 *
	 * @ManyToOne(targetEntity="Company", inversedBy="product")
	 */
	protected $company;

	/**
	 * @var company_id
	 *
	 * @Column(type="integer")
	 */
	protected $company_id;
	
	/**
	 * @var category
	 *
	 * @ManyToOne(targetEntity="BusinessCategory", inversedBy="product")
	 */
	protected $category;

	/**
	 * @var category_id
	 *
	 * @Column(type="integer")
	 */
	protected $category_id;


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
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
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
     * Set price
     *
     * @param integer $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return Product
     */
    public function setCompanyId($companyId)
    {
        $this->company_id = $companyId;

        return $this;
    }

    /**
     * Get company_id
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Set category_id
     *
     * @param integer $categoryId
     * @return Product
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set company
     *
     * @param \Blog\Entity\Company $company
     * @return Product
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
     * Set category
     *
     * @param \Blog\Entity\BusinessCategory $category
     * @return Product
     */
    public function setCategory(\Blog\Entity\BusinessCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Blog\Entity\BusinessCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
