<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserplantRepository")
 */
class Userplant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    // connected id of the user of the plant
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    //name for the plant, given by the user
    private $plantName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    //physical location of the plant
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    // notes of the user for the plant
    private $notes;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    // plant category, connected to the plant inside the database
    private $plant_category;

    /**
     * @ORM\Column(type="datetime")
     */
    // date, when the plant was added
    private $date_added;

    /**
     * @ORM\Column(type="datetime")
     */
    // date, when the plant was last watered
    private $date_watered;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userplant_care_tips;

    //---------------- getter and setter ---------------------------------------------------------------
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function getPlantName(): ?string
    {
        return $this->plantName;
    }

    public function setPlantName(string $name): self
    {
        $this->plantName = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getPlantCategory(): ?user
    {
        return $this->plant_category;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->date_added;
    }

    public function setDateAdded(\DateTimeInterface $date_added): self
    {
        $this->date_added = $date_added;

        return $this;
    }

    public function getDateWatered(): ?\DateTimeInterface
    {
        return $this->date_watered;
    }

    public function setDateWatered(\DateTimeInterface $date_watered): self
    {
        $this->date_watered = $date_watered;

        return $this;
    }

    public function getUserplantCareTips(): ?string
    {
        return $this->userplant_care_tips;
    }

    public function setUserplantCareTips(string $userplant_care_tips): self
    {
        $this->userplant_care_tips = $userplant_care_tips;

        return $this;
    }
}

