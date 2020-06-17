<?php

namespace ApresVenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="ApresVenteBundle\Repository\ReclamationRepository")
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ReclamationSubject", type="string", length=255)
     */
    private $reclamationSubject;

    /**
     * @var int
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      minMessage = "You must Enter 1 rating at least",
     *      maxMessage = "You must Enter Equal or Lesser than 5 Rating"
     * )
     *
     * @ORM\Column(name="Quality", type="integer")
     */

    private $quality;

    /**
     * @var int
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      minMessage = "You must Enter 1 rating at least",
     *      maxMessage = "You must Enter Equal or Lesser than 5 Rating"
     * )
     *
     * @ORM\Column(name="Disponibility", type="integer")
     */
    private $disponibility;

    /**
     * @var int
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      minMessage = "You must Enter 1 rating at least",
     *      maxMessage = "You must Enter Equal or Lesser than 5 Rating"
     * )
     * @ORM\Column(name="Services", type="integer")
     */
    private $services;

    /**
     * @var string
     *
     * @ORM\Column(name="ReclamationDescription", type="string", length=255)
     */
    private $reclamationDescription;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reclamationSubject
     *
     * @param string $reclamationSubject
     *
     * @return Reclamation
     */
    public function setReclamationSubject($reclamationSubject)
    {
        $this->reclamationSubject = $reclamationSubject;

        return $this;
    }

    /**
     * Get reclamationSubject
     *
     * @return string
     */
    public function getReclamationSubject()
    {
        return $this->reclamationSubject;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     *
     * @return Reclamation
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set disponibility
     *
     * @param integer $disponibility
     *
     * @return Reclamation
     */
    public function setDisponibility($disponibility)
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    /**
     * Get disponibility
     *
     * @return int
     */
    public function getDisponibility()
    {
        return $this->disponibility;
    }

    /**
     * Set services
     *
     * @param integer $services
     *
     * @return Reclamation
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return int
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set reclamationDescription
     *
     * @param string $reclamationDescription
     *
     * @return Reclamation
     */
    public function setReclamationDescription($reclamationDescription)
    {
        $this->reclamationDescription = $reclamationDescription;

        return $this;
    }

    /**
     * Get reclamationDescription
     *
     * @return string
     */
    public function getReclamationDescription()
    {
        return $this->reclamationDescription;
    }
}

