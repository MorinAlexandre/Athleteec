<?php

namespace Ath\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Ath\MainBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

   /**
    * Creation date
    * @var datetime $createdAt
    *
    * @ORM\Column(name="created_at", type="datetime")
    * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
    * Modification date
    * @var datetime $updatedAt
    *
    * @ORM\Column(name="updated_at", type="datetime")
    * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @var \Ath\UserBundle\Entity\User
     *
	 * @ORM\ManyToOne(targetEntity="Ath\UserBundle\Entity\User",inversedBy="posts")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="Ath\MainBundle\Entity\FilePost", mappedBy="post", cascade={"persist", "remove"})
     */
    private $filePosts;

    public function __construct()
    {
        $this->filePosts = new ArrayCollection();
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
     * Set contenu
     *
     * @param string $contenu
     * @return Post
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Post
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get filePosts
     *
     * @return Array collection of filePosts
     */
    public function getFilePosts()
    {
        return $this->filePosts;
    }

    /**
     * Add filePost
     *
     * @param \Ath\MainBundle\Entity\FilePost $filePost
     *
     * @return Produit
     */
    public function addFilePost(\Ath\MainBundle\Entity\FilePost $filePost)
    {
        if (!$this->filePosts->contains($filePost))
            $this->filePosts[] = $filePost;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Ath\MainBundle\Entity\FilePost $filePost
     */
    public function removeFilePost(\Ath\MainBundle\Entity\Image $filePost)
    {
        $this->filePosts->removeElement($filePost);
    }
}
