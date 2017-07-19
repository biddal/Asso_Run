<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Inscription
 *@UniqueEntity(
 *     fields={"idRun"},
 *     fields={"idUser"},
 *     errorPath="idRun",
 *     message="Vous êtes déjà inscrit à cette course."
 *      
 * )
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="FK_idrun", columns={"id_run"}), @ORM\Index(name="FKiduser", columns={"id_user"})})
 * @ORM\Entity
 */
class Inscription
{
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
     * @return Inscription
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
     * @return Inscription
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
}
