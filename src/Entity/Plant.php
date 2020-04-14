<?php

namespace App\Entity;

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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alternative_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latin_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $care_level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $watering_amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location_icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperature_icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fertiliser_icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $substrate_icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heyday_icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $height_icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $special_feature_icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $short_description;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $special_features_addinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $location_addinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $temperature_addinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $pot;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $watering_amount_addinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $substrate_addinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $fertiliser_addinfo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $flower_color;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $heyday_addinfo;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $care_tips;

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

    public function getAlternativeName(): ?string
    {
        return $this->alternative_name;
    }

    public function setAlternativeName(?string $alternative_name): self
    {
        $this->alternative_name = $alternative_name;

        return $this;
    }

    public function getLatinName(): ?string
    {
        return $this->latin_name;
    }

    public function setLatinName(string $latin_name): self
    {
        $this->latin_name = $latin_name;

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
        return $this->care_level;
    }

    public function setCareLevel(string $care_level): self
    {
        $this->care_level = $care_level;

        return $this;
    }

    public function getWateringAmount(): ?string
    {
        return $this->watering_amount;
    }

    public function setWateringAmount(string $watering_amount): self
    {
        $this->watering_amount = $watering_amount;

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
        return $this->location_icon;
    }

    public function setLocationIcon(string $location_icon): self
    {
        $this->location_icon = $location_icon;

        return $this;
    }

    public function getTemperatureIcon(): ?string
    {
        return $this->temperature_icon;
    }

    public function setTemperatureIcon(string $temperature_icon): self
    {
        $this->temperature_icon = $temperature_icon;

        return $this;
    }

    public function getFertiliserIcon(): ?string
    {
        return $this->fertiliser_icon;
    }

    public function setFertiliserIcon(?string $fertiliser_icon): self
    {
        $this->fertiliser_icon = $fertiliser_icon;

        return $this;
    }

    public function getSubstrateIcon(): ?string
    {
        return $this->substrate_icon;
    }

    public function setSubstrateIcon(string $substrate_icon): self
    {
        $this->substrate_icon = $substrate_icon;

        return $this;
    }

    public function getHeydayIcon(): ?string
    {
        return $this->heyday_icon;
    }

    public function setHeydayIcon(?string $heyday_icon): self
    {
        $this->heyday_icon = $heyday_icon;

        return $this;
    }

    public function getHeightIcon(): ?string
    {
        return $this->height_icon;
    }

    public function setHeightIcon(string $height_icon): self
    {
        $this->height_icon = $height_icon;

        return $this;
    }

    public function getSpecialFeatureIcon(): ?string
    {
        return $this->special_feature_icon;
    }

    public function setSpecialFeatureIcon(?string $special_feature_icon): self
    {
        $this->special_feature_icon = $special_feature_icon;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getSpecialFeaturesAddinfo(): ?string
    {
        return $this->special_features_addinfo;
    }

    public function setSpecialFeaturesAddinfo(?string $special_features_addinfo): self
    {
        $this->special_features_addinfo = $special_features_addinfo;

        return $this;
    }

    public function getLocationAddinfo(): ?string
    {
        return $this->location_addinfo;
    }

    public function setLocationAddinfo(?string $location_addinfo): self
    {
        $this->location_addinfo = $location_addinfo;

        return $this;
    }

    public function getTemperatureAddinfo(): ?string
    {
        return $this->temperature_addinfo;
    }

    public function setTemperatureAddinfo(?string $temperature_addinfo): self
    {
        $this->temperature_addinfo = $temperature_addinfo;

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
        return $this->watering_amount_addinfo;
    }

    public function setWateringAmountAddinfo(?string $watering_amount_addinfo): self
    {
        $this->watering_amount_addinfo = $watering_amount_addinfo;

        return $this;
    }

    public function getSubstrateAddinfo(): ?string
    {
        return $this->substrate_addinfo;
    }

    public function setSubstrateAddinfo(?string $substrate_addinfo): self
    {
        $this->substrate_addinfo = $substrate_addinfo;

        return $this;
    }

    public function getFertiliserAddinfo(): ?string
    {
        return $this->fertiliser_addinfo;
    }

    public function setFertiliserAddinfo(?string $fertiliser_addinfo): self
    {
        $this->fertiliser_addinfo = $fertiliser_addinfo;

        return $this;
    }

    public function getFlowerColor(): ?string
    {
        return $this->flower_color;
    }

    public function setFlowerColor(?string $flower_color): self
    {
        $this->flower_color = $flower_color;

        return $this;
    }

    public function getHeydayAddinfo(): ?string
    {
        return $this->heyday_addinfo;
    }

    public function setHeydayAddinfo(?string $heyday_addinfo): self
    {
        $this->heyday_addinfo = $heyday_addinfo;

        return $this;
    }

    public function getCareTips(): ?string
    {
        return $this->care_tips;
    }

    public function setCareTips(string $care_tips): self
    {
        $this->care_tips = $care_tips;

        return $this;
    }
}
