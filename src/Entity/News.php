<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
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
    private $title;

    /**
     * @ORM\Column(type="date", nullable=true)
     * */
    private $date_posted;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $shortText;

    /**
     * @ORM\Column(type="string", length=10000)
     */
    private $long_text;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $thumbnail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDatePosted(): ?\DateTimeInterface
    {
        return $this->date_posted;
    }

    public function setDatePosted(\DateTimeInterface $date_posted): self
    {
        $this->date_posted = $date_posted;

        return $this;
    }

    public function getShortText(): ?string
    {
        return $this->shortText;
    }

    public function setShortText(string $shortText): self
    {
        $this->shortText = $shortText;

        return $this;
    }

    public function getLongText(): ?string
    {
        return $this->long_text;
    }

    public function setLongText(string $long_text): self
    {
        $this->long_text = $long_text;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }


    public function toAssoc()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date_posted' => $this->date_posted,
            'shortText' => $this->shortText,
            'long_Text' => $this->long_text,
            'thumbnail' => $this->thumbnail
        ];
    }
}
