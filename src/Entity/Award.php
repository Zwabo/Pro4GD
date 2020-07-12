<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BadgeRepository")
 */
class Award
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
    private $awardIcon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $altText;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAwardIcon(): ?string
    {
        return $this->awardIcon;
    }

    public function setAwardIcon(string $awardIcon): self
    {
        $this->awardIcon = $awardIcon;

        return $this;
    }

    public function getAltText(): ?string
    {
        return $this->altText;
    }

    public function setAltText(?string $altText): self
    {
        $this->altText = $altText;

        return $this;
    }

    public function toAssoc() {
        return [
            'name' => $this->name,
            'awardIcon' => $this->awardIcon,
            'altText' => $this->altText
        ];
    }
}
