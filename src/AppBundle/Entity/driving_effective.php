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
    private $effective_date_from;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $effective_date_to;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $driving_hour;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
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

    public function validEndDatetime(){
        if ($this->effective_date_to == null){
            return false;
        }else{
            return true;
        }
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
     * Set planeDateFrom
     *
     * @param $effectiveDateFrom
     * @return driving_effective
     * @internal param \DateTime $planeDateFrom
     *
     */
    public function setEffectiveDateFrom($effectiveDateFrom)
    {
        $this->effective_date_from = $effectiveDateFrom;

        return $this;
    }

    /**
     * Get planeDateFrom
     *
     * @return \DateTime
     */
    public function getEffectiveDateFrom()
    {
        return $this->effective_date_from;
    }

    /**
     * Set planeDateTo
     *
     * @param $effectiveDateTo
     * @return driving_effective
     * @internal param \DateTime $planeDateTo
     *
     */
    public function setEffectiveDateTo($effectiveDateTo)
    {
        $this->effective_date_to = $effectiveDateTo;

        return $this;
    }

    /**
     * Get planeDateTo
     *
     * @return \DateTime
     */
    public function getEffectiveDateTo()
    {
        return $this->effective_date_to;
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
