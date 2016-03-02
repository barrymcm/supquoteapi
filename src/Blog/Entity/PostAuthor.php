<?php 

namespace Blog\Entity;


use Blog\MappedSuperClass\Author;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Column;

/**
* Post author entity
*  
* @Entity
*/ 
class PostAuthor extends Author 
{

	/**
	* @var string
	*
	* @Column(type="text", nullable=true)
	*/
	protected $bio;

	/**
	* @var Post[]
	*
	* @OneToMany(targetEntity="Blog\Entity\Post", mappedBy="author")
	*/
	protected $posts;

	/**
	* Initializes collections
	*/
	public function __construct()
	{
		$this->posts = new ArrayCollection();
	}

	/**
	* Set bio
	*
	* @param string $bio
	* @return PostAuthor
	*/
	public function setBio($bio)
	{
		$this->bio = $bio;

		return $this;
	}

	/**
	* Get bio
	*
	* @return PostAuthor
	*/
	public function getBio()
	{
		return $this->bio;
	}

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;


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
     * @return PostAuthor
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
     * Set email
     *
     * @param string $email
     * @return PostAuthor
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
     * Add posts
     *
     * @param \Blog\Entity\Post $posts
     * @return PostAuthor
     */
    public function addPost(\Blog\Entity\Post $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Blog\Entity\Post $posts
     */
    public function removePost(\Blog\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
