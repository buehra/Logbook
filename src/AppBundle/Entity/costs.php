<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 05.04.2017
 * Time: 11:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="costs")
 */

class costs
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $credit;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hours;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $dept;

    /**
     * Many Costs have One Driver.
     * @ManyToOne(targetEntity="driver", inversedBy="costs")
     */
    private $driver;


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
     * Set year
     *
     * @param integer $year
     *
     * @return costs
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set credit
     *
     * @param float $credit
     *
     * @return costs
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return float
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set dept
     *
     * @param float $dept
     *
     * @return costs
     */
    public function setDept($dept)
    {
        $this->dept = $dept;

        return $this;
    }

    /**
     * Get dept
     *
     * @return float
     */
    public function getDept()
    {
        return $this->dept;
    }


    /**
     * Set houers
     *
     * @param float $houers
     *
     * @return costs
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get houers
     *
     * @return float
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set driver
     *
     * @param \AppBundle\Entity\driver $driver
     *
     * @return costs
     */
    public function setDriver(\AppBundle\Entity\driver $driver = null)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Get driver
     *
     * @return \AppBundle\Entity\driver
     */
    public function getDriver()
    {
        return $this->driver;
    }
}
