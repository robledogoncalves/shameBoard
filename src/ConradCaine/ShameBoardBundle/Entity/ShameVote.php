<?php

namespace ConradCaine\ShameBoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShameVote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ConradCaine\ShameBoardBundle\Repository\ShameVoteRepository")
 */
class ShameVote
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
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="shame_id", type="integer")
     */
    private $shameId;

    /**
     * @var integer
     *
     * @ORM\Column(name="vote", type="integer")
     */
    private $vote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set userId
     *
     * @param integer $userId
     * @return ShameVote
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
     * Set shameId
     *
     * @param integer $shameId
     * @return ShameVote
     */
    public function setShameId($shameId)
    {
        $this->shameId = $shameId;

        return $this;
    }

    /**
     * Get shameId
     *
     * @return integer 
     */
    public function getShameId()
    {
        return $this->shameId;
    }

    /**
     * Set vote
     *
     * @param integer $vote
     * @return ShameVote
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Get vote
     *
     * @return integer 
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return ShameVote
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
}
