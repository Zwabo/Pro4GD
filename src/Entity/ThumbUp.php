<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 18.05.2020
 * Time: 12:45
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ThumbUpRepository")
 */
class ThumbUp {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     *
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comment")
     *
     */
    private $Comment;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * @param mixed $Comment
     */
    public function setComment($Comment)
    {
        $this->Comment = $Comment;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function toAssoc()
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'comment' => $this->Comment,
        ];
    }
}