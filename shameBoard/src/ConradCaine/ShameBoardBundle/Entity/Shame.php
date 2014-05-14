<?php

namespace ConradCaine\ShameBoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Shame
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ConradCaine\ShameBoardBundle\Entity\ShameRepository")
 * @ORM\HasLifecycleCallbacks
 */

class Shame
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="shame_rule_id", type="integer")
     */
    private $shameRuleId;


    /**
     * @var integer
     *
     * @ORM\Column(name="extra_points", type="integer", nullable=true)
     */
    private $extraPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="ShameRule")
     * @ORM\JoinColumn(name="shame_rule_id", referencedColumnName="id")
     */
    protected $shameRule;

     /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


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
     * Set description
     *
     * @param string $description
     * @return Shame
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
     * Set shameRuleId
     *
     * @param integer $shameRuleId
     * @return Shame
     */
    public function setShameRuleId($shameRuleId)
    {
        $this->shameRuleId = $shameRuleId;

        return $this;
    }

    /**
     * Get shameRuleId
     *
     * @return integer 
     */
    public function getShameRuleId()
    {
        return $this->shameRuleId;
    }


    /**
     * @param $extraPoints
     * @return Shame
     */
    public function setExtraPoints($extraPoints)
    {
        $this->extraPoints = $extraPoints;

        return $this;
    }

    /**
     * Get extraPoints
     * @return int
     */
    public function getExtraPoints()
    {
        return $this->extraPoints;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Shame
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Shame
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Shame
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setShameRule($shameRule)
    {
        $this->shameRule = $shameRule;

        return $this;
    }

    public function getShameRule()
    {
        return $this->shameRule;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return strval($this->getId());
    }
}
