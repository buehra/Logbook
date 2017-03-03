<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:34
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="damage")
 */
class damage
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
    private $damage_date;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $damge_picture;

    /**
     * One Damage has One driver.
     * @OneToOne(targetEntity="driver")
     */
    private $driver;

    /**
     * One Damage has One Boat.
     * @OneToOne(targetEntity="Boat")
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
     * Set damageDate
     *
     * @param \DateTime $damageDate
     *
     * @return damage
     */
    public function setDamageDate($damageDate)
    {
        $this->damage_date = $damageDate;

        return $this;
    }

    /**
     * Get damageDate
     *
     * @return \DateTime
     */
    public function getDamageDate()
    {
        return $this->damage_date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return damage
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
     * Set place
     *
     * @param string $place
     *
     * @return damage
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set damgePicture
     *
     * @param string $damgePicture
     *
     * @return damage
     */
    public function setDamgePicture($damgePicture)
    {
        $this->damge_picture = $damgePicture;

        return $this;
    }

    /**
     * Get damgePicture
     *
     * @return string
     */
    public function getDamgePicture()
    {
        return $this->damge_picture;
    }

    /**
     * Set driver
     *
     * @param \AppBundle\Entity\driver $driver
     *
     * @return damage
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
     * @return damage
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
