<?php

namespace ConradCaine\ShameBoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoteToken
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ConradCaine\ShameBoardBundle\Repository\VoteTokenRepository")
 */
class VoteToken
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
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var integer
     *
     * @ORM\Column(name="shame_id", type="integer")
     */
    private $shameId;


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
     * Set token
     *
     * @param string $token
     * @return VoteToken
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set shameId
     *
     * @param integer $shameId
     * @return VoteToken
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
}
