<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 03.03.2017
 * Time: 15:34
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DamageRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $place;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="damage_image", fileNameProperty="damge_picture")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $damge_picture;

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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return damage
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

}
