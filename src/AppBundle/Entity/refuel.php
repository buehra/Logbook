<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:48
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RefuelRepository")
 * @ORM\Entity
 * @ORM\Table(name="refuel")
 */
class refuel
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $refuel_date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $refuel_place;

    /**
     * @ORM\Column(type="float")
     */
    private $refuel_liter;

    /**
     * @ORM\Column(type="float")
     */
    private $refuel_cost;

    /**
     * One Damage has One driver.
     * @ManyToOne(targetEntity="driver")
     */
    private $driver;

    /**
     * One Damage has One Boat.
     * @ManyToOne(targetEntity="Boat")
     */
    private $boat;

    public function __construct()
    {
        $this->refuel_date = new \DateTime();
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
     * Set refuelDate
     *
     * @param \DateTime $refuelDate
     *
     * @return refuel
     */
    public function setRefuelDate($refuelDate)
    {
        $this->refuel_date = $refuelDate;

        return $this;
    }

    /**
     * Get refuelDate
     *
     * @return \DateTime
     */
    public function getRefuelDate()
    {
        return $this->refuel_date;
    }

    /**
     * Set refuelPlace
     *
     * @param string $refuelPlace
     *
     * @return refuel
     */
    public function setRefuelPlace($refuelPlace)
    {
        $this->refuel_place = $refuelPlace;

        return $this;
    }

    /**
     * Get refuelPlace
     *
     * @return string
     */
    public function getRefuelPlace()
    {
        return $this->refuel_place;
    }

    /**
     * Set refuelLiter
     *
     * @param float $refuelLiter
     *
     * @return refuel
     */
    public function setRefuelLiter($refuelLiter)
    {
        $this->refuel_liter = $refuelLiter;

        return $this;
    }

    /**
     * Get refuelLiter
     *
     * @return float
     */
    public function getRefuelLiter()
    {
        return $this->refuel_liter;
    }

    /**
     * Set refuelCost
     *
     * @param float $refuelCost
     *
     * @return refuel
     */
    public function setRefuelCost($refuelCost)
    {
        $this->refuel_cost = $refuelCost;

        return $this;
    }

    /**
     * Get refuelCost
     *
     * @return float
     */
    public function getRefuelCost()
    {
        return $this->refuel_cost;
    }

    /**
     * Set driver
     *
     * @param \AppBundle\Entity\driver $driver
     *
     * @return refuel
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

    /**
     * Set boat
     *
     * @param \AppBundle\Entity\Boat $boat
     *
     * @return refuel
     */
    public function setBoat(\AppBundle\Entity\Boat $boat = null)
    {
        $this->boat = $boat;

        return $this;
    }

    /**
     * Get boat
     *
     * @return \AppBundle\Entity\Boat
     */
    public function getBoat()
    {
        return $this->boat;
    }
}
