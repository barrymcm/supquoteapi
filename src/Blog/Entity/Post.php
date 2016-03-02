<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;

/**
* Blog Post Entity
* 
* @Entity(repositoryClass="Blog\Repository\PostRepository")
* @Table=(indexes={
*   @Index(name="publication_date_idx", columns="publicationDate")}
* )
* @HasLifecycleCallbacks 
*/
class Post
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
	*
	* @Column(type="text")
	*/
	protected $title;

	/**
	* @var string
	*
	* @Column(type="text")
	*/
	protected $body;

	/**
	* @var \DateTime
	*
	* @Column(type="datetime")
	*/
	protected $publicationDate;

    /**
     * @var text
     *
     * @OneToMany(targetEntity="Comment", mappedBy="post")
     */
    protected $comments;

    /**
    * @var Tag[]
    *
    * @ManyToMany(targetEntity="Tag", inversedBy="posts",
    * fetch="EAGER", cascade={"persist"}, orphanRemoval=true)
    *
    * @JoinTable(
    *       inverseJoinColumns={@JoinColumn(name="tag_name", 
    * referencedColumnName="name")}
    * )
    */
    protected $tags;

    /**
    * @var postAuthor 
    *
    * @ManyToOne(targetEntity="PostAuthor", inversedBy="posts")
    */
    protected $author;

    /**
     * Initialise collections
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return Post
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Add comments
     *
     * @param \Blog\Entity\Comment $comments
     * @return Post
     */
    public function addComment(\Blog\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        // This allows persisting with an association from inverse side
        $comments->setPost($this);

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

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add tags
     *
     * @param \Blog\Entity\Tag $tags
     * @return Post
     */
    public function addTag(\Blog\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
        
        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Blog\Entity\Tag $tags
     */
    public function removeTag(\Blog\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Get author
     *
     * @param string $author
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Set author
     * 
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /**
    * Sets publication date to now at persist time
    *
    * @PrePersist
    */
    public function setPublicationDateOnPrePersist()
    {
        if (!$this->publicationDate) 
        {
            $this->publicationDate = new \DateTime();
        }
    }

}
