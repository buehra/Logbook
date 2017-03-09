<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:46
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="driving_effective")
 */
class driving_effective
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $plane_date_from;

    /**
     * @ORM\Column(type="datetime")
     */
    private $plane_date_to;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $driving_hour;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

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
     * Set planeDateFrom
     *
     * @param \DateTime $planeDateFrom
     *
     * @return driving_effective
     */
    public function setPlaneDateFrom($planeDateFrom)
    {
        $this->plane_date_from = $planeDateFrom;

        return $this;
    }

    /**
     * Get planeDateFrom
     *
     * @return \DateTime
     */
    public function getPlaneDateFrom()
    {
        return $this->plane_date_from;
    }

    /**
     * Set planeDateTo
     *
     * @param \DateTime $planeDateTo
     *
     * @return driving_effective
     */
    public function setPlaneDateTo($planeDateTo)
    {
        $this->plane_date_to = $planeDateTo;

        return $this;
    }

    /**
     * Get planeDateTo
     *
     * @return \DateTime
     */
    public function getPlaneDateTo()
    {
        return $this->plane_date_to;
    }

    /**
     * Set drivingHour
     *
     * @param string $drivingHour
     *
     * @return driving_effective
     */
    public function setDrivingHour($drivingHour)
    {
        $this->driving_hour = $drivingHour;

        return $this;
    }

    /**
     * Get drivingHour
     *
     * @return string
     */
    public function getDrivingHour()
    {
        return $this->driving_hour;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return driving_effective
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
     * Set driver
     *
     * @param \AppBundle\Entity\driver $driver
     *
     * @return driving_effective
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
     * @return driving_effective
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
