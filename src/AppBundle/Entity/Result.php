<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Result
 *
 * @ORM\Table(name="result", indexes={@ORM\Index(name="FK_runid", columns={"id_run"}), @ORM\Index(name="FK_userid", columns={"id_user"})})
 * @ORM\Entity
 */
class Result
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="times", type="time", nullable=false)
     */
    private $times;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Run
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Run")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_run", referencedColumnName="id")
     * })
     */
    private $idRun;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



    /**
     * Set times
     *
     * @param \DateTime $times
     *
     * @return Result
     */
    public function setTimes($times)
    {
        $this->times = $times;

        return $this;
    }

    /**
     * Get times
     *
     * @return \DateTime
     */
    public function getTimes()
    {
        return $this->times;
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
     * Set idRun
     *
     * @param \AppBundle\Entity\Run $idRun
     *
     * @return Result
     */
    public function setIdRun(\AppBundle\Entity\Run $idRun = null)
    {
        $this->idRun = $idRun;

        return $this;
    }

    /**
     * Get idRun
     *
     * @return \AppBundle\Entity\Run
     */
    public function getIdRun()
    {
        return $this->idRun;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Result
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
