<?php
namespace AppBundle\Entity;

use AppBundle\Entity\Result;
use AppBundle\Entity\Run;
use AppBundle\Entity\User;
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
     * @var float
     *
     * @ORM\Column(name="times", type="float", nullable=false)
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
     * @var Run
     *
     * @ORM\ManyToOne(targetEntity="Run")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_run", referencedColumnName="id")
     * })
     */
    private $idRun;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



    /**
     * Set times
     *
     * @param flaot $times
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
     * @return float
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
     * @param Run $idRun
     *
     * @return Result
     */
    public function setIdRun(Run $idRun = null)
    {
        $this->idRun = $idRun;

        return $this;
    }

    /**
     * Get idRun
     *
     * @return Run
     */
    public function getIdRun()
    {
        return $this->idRun;
    }

    /**
     * Set idUser
     *
     * @param User $idUser
     *
     * @return Result
     */
    public function setIdUser(User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
    /**
     * @var integer
     */
    private $point;


    /**
     * Set point
     *
     * @param integer $point
     *
     * @return Result
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return integer
     */
    public function getPoint()
    {
        return $this->point;
    }
}
