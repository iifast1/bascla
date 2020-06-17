<?php

namespace ApresVenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Repair
 *
 * @ORM\Table(name="repair")
 * @ORM\Entity(repositoryClass="ApresVenteBundle\Repository\RepairRepository")
 */
class Repair
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
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="RepairDescription", type="string", length=255)
     */
    private $repairDescription;

    /**
     * @var bool
     *
     * @ORM\Column(name="RepairStatus", type="boolean")
     */
    private $repairStatus;


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
     * Set repairDescription
     *
     * @param string $repairDescription
     *
     * @return Repair
     */
    public function setRepairDescription($repairDescription)
    {
        $this->repairDescription = $repairDescription;

        return $this;
    }

    /**
     * Get repairDescription
     *
     * @return string
     */
    public function getRepairDescription()
    {
        return $this->repairDescription;
    }

    /**
     * Set repairStatus
     *
     * @param boolean $repairStatus
     *
     * @return Repair
     */
    public function setRepairStatus($repairStatus)
    {
        $this->repairStatus = $repairStatus;

        return $this;
    }

    /**
     * Get repairStatus
     *
     * @return bool
     */
    public function getRepairStatus()
    {
        return $this->repairStatus;
    }
}

