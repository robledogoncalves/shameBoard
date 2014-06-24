<?php

namespace ConradCaine\ShameBoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Shame
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ConradCaine\ShameBoardBundle\Repository\ShameRepository")
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
     * @ORM\Column(name="extra_points", type="integer", nullable=true)
     */
    private $extraPoints;

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
     * @ORM\JoinColumn(name="shame_rule_id", referencedColumnName="id", nullable=false)
     */
    private $shameRule;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="reporter_id", referencedColumnName="id", nullable=false)
     */
    private $reporter;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="indicted_id", referencedColumnName="id", nullable=false)
     */
    private $indicted;

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $extraPoints
     * @return $this
     */
    public function setExtraPoints($extraPoints)
    {
        $this->extraPoints = $extraPoints;
        return $this;
    }

    /**
     * @return int
     */
    public function getExtraPoints()
    {
        return $this->extraPoints;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $indicted
     * @return $this
     */
    public function setIndicted($indicted)
    {
        $this->indicted = $indicted;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicted()
    {
        return $this->indicted;
    }

    /**
     * @param mixed $reporter
     * @return $this
     */
    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * @param mixed $shameRule
     * @return $this
     */
    public function setShameRule($shameRule)
    {
        $this->shameRule = $shameRule;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShameRule()
    {
        return $this->shameRule;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function __toString()
    {
        return strval($this->getId());
    }
}
