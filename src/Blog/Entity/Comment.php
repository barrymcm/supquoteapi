<?php 

namespace Blog\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;

/**
 * Comment entity
 * 
 * @Entity 
 * @HasLifecycleCallbacks
 */
class Comment 
{
	/**
	* @var int
	* 
	* @Id
	* @Column(type="integer") 
    * @GeneratedValue
	*/
	protected $id;

	/**
	* @var text
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
	* @var Post
	* 
	* @ManyToOne(targetEntity="Post", inversedBy="comments")
	*/
	protected $post;

    /**
    * @var commentAuthor
    *
    * @ManyToOne(targetEntity="CommentAuthor", inversedBy="comments")
    */
    protected $commentAuthor;

    /**
     * Set id
     *
     * @param integer $id
     * @return Comment
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set body
     *
     * @param string $body
     * @return Comment
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
     * @return Comment
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
     * Set post
     *
     * @param \Blog\Entity\Post $post
     * @return Comment
     */
    public function setPost(\Blog\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Blog\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
    * Set commentAuthor 
    *
    * @param string $commentAuthor
    * @return Comment
    */
    public function setAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;

        return $this;
    }

    /**
    * Get commentAuthor 
    *
    * @return string
    */
    public function getAuthor()
    {
        return $this->commentAuthor;
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



    /**
     * Set commentAuthor
     *
     * @param \Blog\Entity\CommentAuthor $commentAuthor
     * @return Comment
     */
    public function setCommentAuthor(\Blog\Entity\CommentAuthor $commentAuthor = null)
    {
        $this->commentAuthor = $commentAuthor;

        return $this;
    }

    /**
     * Get commentAuthor
     *
     * @return \Blog\Entity\CommentAuthor 
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }
}
