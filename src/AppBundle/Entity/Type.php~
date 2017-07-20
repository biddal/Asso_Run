<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity
 */
class Type
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=false)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="coef", type="float", precision=10, scale=0, nullable=false)
     */
    private $coef;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_min", type="integer", nullable=false)
     */
    private $ageMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_max", type="integer", nullable=false)
     */
    private $ageMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set coef
     *
     * @param float $coef
     *
     * @return Type
     */
    public function setCoef($coef)
    {
        $this->coef = $coef;

        return $this;
    }

    /**
     * Get coef
     *
     * @return float
     */
    public function getCoef()
    {
        return $this->coef;
    }

    /**
     * Set ageMin
     *
     * @param integer $ageMin
     *
     * @return Type
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    /**
     * Get ageMin
     *
     * @return integer
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * Set ageMax
     *
     * @param integer $ageMax
     *
     * @return Type
     */
    public function setAgeMax($ageMax)
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * Get ageMax
     *
     * @return integer
     */
    public function getAgeMax()
    {
        return $this->ageMax;
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
}
