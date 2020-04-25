<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlantRepository")
 */
class Plant
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
    private $linkName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alternativeName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latinName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $careLevel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wateringAmount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locationIcon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperatureIcon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fertiliserIcon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $substrateIcon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heydayIcon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heightIcon;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $specialFeatureIcon;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $specialFeaturesAddinfo;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $locationAddinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $temperatureAddinfo;

    /**
     * @ORM\Column(type="string", length=700, nullable=true)
     */
    private $pot;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $wateringAmountAddinfo;

    /**
     * @ORM\Column(type="string", length=700, nullable=true)
     */
    private $substrateAddinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $fertiliserAddinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $flowerColor;

    /**
     * @ORM\Column(type="string", length=700, nullable=true)
     */
    private $heydayAddinfo;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $careTips;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Userplant", mappedBy="plant")
     */
    private $userplants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $WindowIcon;

    public function __construct()
    {
        $this->userplantId = new ArrayCollection();
        $this->userplants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkName(): ?string
    {
        return $this->linkName;
    }

    public function setLinkName(string $linkName): self
    {
        $this->linkName = $linkName;

        return $this;
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

    public function getAlternativeName(): ?string
    {
        return $this->alternativeName;
    }

    public function setAlternativeName(?string $alternativeName): self
    {
        $this->alternativeName = $alternativeName;

        return $this;
    }

    public function getLatinName(): ?string
    {
        return $this->latinName;
    }

    public function setLatinName(string $latinName): self
    {
        $this->latinName = $latinName;

        return $this;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(string $genus): self
    {
        $this->genus = $genus;

        return $this;
    }

    public function getCareLevel(): ?string
    {
        return $this->careLevel;
    }

    public function setCareLevel(string $careLevel): self
    {
        $this->careLevel = $careLevel;

        return $this;
    }

    public function getWateringAmount(): ?string
    {
        return $this->wateringAmount;
    }

    public function setWateringAmount(string $wateringAmount): self
    {
        $this->wateringAmount = $wateringAmount;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getLocationIcon(): ?string
    {
        return $this->locationIcon;
    }

    public function setLocationIcon(string $locationIcon): self
    {
        $this->locationIcon = $locationIcon;

        return $this;
    }

    public function getTemperatureIcon(): ?string
    {
        return $this->temperatureIcon;
    }

    public function setTemperatureIcon(string $temperatureIcon): self
    {
        $this->temperatureIcon = $temperatureIcon;

        return $this;
    }

    public function getFertiliserIcon(): ?string
    {
        return $this->fertiliserIcon;
    }

    public function setFertiliserIcon(?string $fertiliserIcon): self
    {
        $this->fertiliserIcon = $fertiliserIcon;

        return $this;
    }

    public function getSubstrateIcon(): ?string
    {
        return $this->substrateIcon;
    }

    public function setSubstrateIcon(string $substrateIcon): self
    {
        $this->substrateIcon = $substrateIcon;

        return $this;
    }

    public function getHeydayIcon(): ?string
    {
        return $this->heydayIcon;
    }

    public function setHeydayIcon(?string $heydayIcon): self
    {
        $this->heydayIcon = $heydayIcon;

        return $this;
    }

    public function getHeightIcon(): ?string
    {
        return $this->heightIcon;
    }

    public function setHeightIcon(string $heightIcon): self
    {
        $this->heightIcon = $heightIcon;

        return $this;
    }

    public function getSpecialFeatureIcon(): ?string
    {
        return $this->specialFeatureIcon;
    }

    public function setSpecialFeatureIcon(?string $specialFeatureIcon): self
    {
        $this->specialFeatureIcon = $specialFeatureIcon;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getSpecialFeaturesAddinfo(): ?string
    {
        return $this->specialFeaturesAddinfo;
    }

    public function setSpecialFeaturesAddinfo(?string $specialFeaturesAddinfo): self
    {
        $this->specialFeaturesAddinfo = $specialFeaturesAddinfo;

        return $this;
    }

    public function getLocationAddinfo(): ?string
    {
        return $this->locationAddinfo;
    }

    public function setLocationAddinfo(?string $locationAddinfo): self
    {
        $this->locationAddinfo = $locationAddinfo;

        return $this;
    }

    public function getTemperatureAddinfo(): ?string
    {
        return $this->temperatureAddinfo;
    }

    public function setTemperatureAddinfo(?string $temperatureAddinfo): self
    {
        $this->temperatureAddinfo = $temperatureAddinfo;

        return $this;
    }

    public function getPot(): ?string
    {
        return $this->pot;
    }

    public function setPot(?string $pot): self
    {
        $this->pot = $pot;

        return $this;
    }

    public function getWateringAmountAddinfo(): ?string
    {
        return $this->wateringAmountAddinfo;
    }

    public function setWateringAmountAddinfo(?string $wateringAmountAddinfo): self
    {
        $this->wateringAmountAddinfo = $wateringAmountAddinfo;

        return $this;
    }

    public function getSubstrateAddinfo(): ?string
    {
        return $this->substrateAddinfo;
    }

    public function setSubstrateAddinfo(?string $substrateAddinfo): self
    {
        $this->substrateAddinfo = $substrateAddinfo;

        return $this;
    }

    public function getFertiliserAddinfo(): ?string
    {
        return $this->fertiliserAddinfo;
    }

    public function setFertiliserAddinfo(?string $fertiliserAddinfo): self
    {
        $this->fertiliserAddinfo = $fertiliserAddinfo;

        return $this;
    }

    public function getFlowerColor(): ?string
    {
        return $this->flowerColor;
    }

    public function setFlowerColor(?string $flowerColor): self
    {
        $this->flowerColor = $flowerColor;

        return $this;
    }

    public function getHeydayAddinfo(): ?string
    {
        return $this->heydayAddinfo;
    }

    public function setHeydayAddinfo(?string $heydayAddinfo): self
    {
        $this->heydayAddinfo = $heydayAddinfo;

        return $this;
    }

    public function getCareTips(): ?string
    {
        return $this->careTips;
    }

    public function setCareTips(string $careTips): self
    {
        $this->careTips = $careTips;

        return $this;
    }

    /**
     * @return Collection|Userplant[]
     */
    public function getUserplants(): Collection
    {
        return $this->userplants;
    }

    public function addUserplant(Userplant $userplant): self
    {
        if (!$this->userplants->contains($userplant)) {
            $this->userplants[] = $userplant;
            $userplant->setPlant($this);
        }

        return $this;
    }

    public function removeUserplant(Userplant $userplant): self
    {
        if ($this->userplants->contains($userplant)) {
            $this->userplants->removeElement($userplant);
            // set the owning side to null (unless already changed)
            if ($userplant->getPlant() === $this) {
                $userplant->setPlant(null);
            }
        }

        return $this;
    }

    public function getWindowIcon(): ?string
    {
        return $this->WindowIcon;
    }

    public function setWindowIcon(string $WindowIcon): self
    {
        $this->WindowIcon = $WindowIcon;

        return $this;
    }

}
