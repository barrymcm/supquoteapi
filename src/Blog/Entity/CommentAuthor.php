<?php 

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Entity;
use Blog\MappedSuperClass\Author;


/**
* Comment author entity
*
* @Entity
*/
class CommentAuthor extends Author {

	/**
	* @var Comment[]
	*
	* @OneToMany(targetEntity="Blog\Entity\Comment", mappedBy="commentAuthor")
	*/
	protected $comments;

	/**
	* Set comments
	*
	* @param text $comments
	* @return CommentAuthor
	*/
	public function setComments($comments)
	{
		$this->comments = $comments;

		return $this;
	}

	/**
	* Get comments
	*
	* @return CommentAuthor
	*/
	public function getComments()
	{
		return $this->comments;
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
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return CommentAuthor
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
     * @return CommentAuthor
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
     * Add comments
     *
     * @param \Blog\Entity\Comment $comments
     * @return CommentAuthor
     */
    public function addComment(\Blog\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Blog\Entity\Comment $comments
     */
    public function removeComment(\Blog\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }
}
