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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAdded;

    /**
     * @ORM\Column(type="date")
     */
    private $dateWatered;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userplants")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plant", inversedBy="userplants")
     *
     */
    private $plant;

    public function getId(): ?int
    {
        return $this->id;
    }

    /*public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }*/

    /*public function getIdPlant(): ?Plant
    {
        return $this->id_plant;
    }

    public function setIdPlant(Plant $id_plant): self
    {
        $this->id_plant = $id_plant;

        return $this;
    }*/

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTimeInterface $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getDateWatered(): ?\DateTimeInterface
    {
        return $this->dateWatered;
    }

    public function setDateWatered(\DateTimeInterface $dateWatered): self
    {
        $this->dateWatered = $dateWatered;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPlant(): ?Plant
    {
        return $this->plant;
    }

    public function setPlant(?Plant $plant): self
    {
        $this->plant = $plant;

        return $this;
    }

    public function toAssoc(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'dateAdded' => $this->dateAdded,
            'dateWatered' => $this->dateWatered,
            'notes' => $this->notes,
            'plant' => $this->plant->toAssoc()
        ];
    }
}
