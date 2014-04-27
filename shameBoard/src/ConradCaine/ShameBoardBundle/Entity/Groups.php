<?php

namespace ConradCaine\ShameBoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;

/**
 * Groups
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Groups extends BaseGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="decription", type="text")
     */
    private $decription;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $companyId;


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
     * Set decription
     *
     * @param string $decription
     * @return Groups
     */
    public function setDecription($decription)
    {
        $this->decription = $decription;

        return $this;
    }

    /**
     * Get decription
     *
     * @return string 
     */
    public function getDecription()
    {
        return $this->decription;
    }

    /**
     * Set companyId
     *
     * @param integer $companyId
     * @return Groups
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * Get companyId
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }
}
