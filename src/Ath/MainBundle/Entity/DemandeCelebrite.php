<?php

namespace Ath\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Ath\MainBundle\Model\StatutDemandeCelebrite;

/**
 * DemandeCelebrite
 *
 * @ORM\Table(name="demande_celebrite")
 * @ORM\Entity(repositoryClass="Ath\MainBundle\Repository\DemandeCelebriteRepository")
 */
class DemandeCelebrite
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
     * @var bool
     *
     * @ORM\Column(name="statut", type="integer")
     */
    private $statut; // 1 = En cours, 2 = Accepte, 3 = Refuser

    /**
     * @var \Ath\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Ath\UserBundle\Entity\User",inversedBy="demandeCelebrites")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var \Ath\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Ath\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     */
    private $updatedBy;

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
     * @var datetime $dateDemande
     *
     * @ORM\Column(name="date_demande", type="datetime")
     */
    private $dateDemande;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="date_reponse", type="datetime", nullable = true)
     */
    private $dateReponse;

    
    public function __construct()
    {
        $this->statut = 1; // si le statut n'est pas renseigné on le met à en cours
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
     * @return DemandeCelebrite
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
     * Set statut
     *
     * @param integer $statut
     * @return DemandeCelebrite
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return StatutDemandeCelebrite::getLibFromId($this->statut);
    }

    /**
     * Get the value of statut
     *
     * @return integer
     */
    public function getStatutId()
    {
        return $this->statut;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return DemandeCelebrite
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
     * @return DemandeCelebrite
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
     * Set createdBy
     *
     * @param \Ath\UserBundle\Entity\User $createdBy
     * @return DemandeCelebrite
     */
    public function setCreatedBy(\Ath\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Ath\UserBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \Ath\UserBundle\Entity\User $updatedBy
     * @return DemandeCelebrite
     */
    public function setUpdatedBy(\Ath\UserBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \Ath\UserBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     * @return DemandeCelebrite
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime 
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateReponse
     *
     * @param \DateTime $dateReponse
     * @return DemandeCelebrite
     */
    public function setDateReponse($dateReponse)
    {
        $this->dateReponse = $dateReponse;

        return $this;
    }

    /**
     * Get dateReponse
     *
     * @return \DateTime
     */
    public function getDateReponse()
    {
        return $this->dateReponse;
    }

    public function __toString()
    {
        return $this->id;
    }
}
