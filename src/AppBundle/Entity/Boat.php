<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:31
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="boat")
 */
class Boat
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $fullname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $serrialnumber;

    /**
     * @ORM\Column(type="float")
     */
    private $drivehour;


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
     * Set brand
     *
     * @param string $brand
     *
     * @return Boat
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Boat
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $fullname
     * @return $this
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }


    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set serrialnumber
     *
     * @param string $serrialnumber
     *
     * @return Boat
     */
    public function setSerrialnumber($serrialnumber)
    {
        $this->serrialnumber = $serrialnumber;

        return $this;
    }

    /**
     * Get serrialnumber
     *
     * @return string
     */
    public function getSerrialnumber()
    {
        return $this->serrialnumber;
    }

    /**
     * Set drivehour
     *
     * @param string $drivehour
     *
     * @return Boat
     */
    public function setDrivehour($drivehour)
    {
        $this->drivehour = $drivehour;

        return $this;
    }

    /**
     * Get drivehour
     *
     * @return string
     */
    public function getDrivehour()
    {
        return $this->drivehour;
    }
}
