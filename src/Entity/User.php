<?php

namespace App\Entity;

use App\Entity\Userplant;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userPic;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $achievements = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $friends = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $comments = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Userplant", mappedBy="user")
     */
    private $userplants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FriendRequest", mappedBy="sender")
     */
    private $outgoingFriendRequests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FriendRequest", mappedBy="receiver")
     */
    private $incomingFriendRequests;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $privacyBirthday = "all";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $privacyComments = "all";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $privacyFriends = "all";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $privacyGarden = "all";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $privacyForum = "all";

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $notifications = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $XP;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $awards = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $counterFriends;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $counterPlantsAdded;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $counterPlantsWatered;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $friendsAward;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $livedAward;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $memberAward;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userplantAward;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wateredAward;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lvlAward;

    /*---------------userprofile comments-----------------------*/

     // @ORM\OneToMany(targetEntity="App\Entity\ProfileComments", mappedBy="user", cascade={"persist", "remove"})
    //private $writtenComments;


     // @ORM\ManyToOne(targetEntity="App\Entity\ProfileComments", inversedBy="profileUser")
    //private $gottenComments;

    /*----------------------constructor-------------------------------*/

    public function __construct()
    {
        $this->userplants = new ArrayCollection();

        $this->outgoingFriendRequests = new ArrayCollection();
        $this->incomingFriendRequests = new ArrayCollection();
    }

    /*-------------------------getter and setter--------------------------*/

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?\DateTimeInterface $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAchievements(): ?array
    {
        return $this->achievements;
    }

    public function setAchievements(?array $achievements): self
    {
        $this->achievements = $achievements;

        return $this;
    }

    public function getFriends(): ?array
    {
        return $this->friends;
    }

    public function setFriends(?array $friends): self
    {
        $this->friends = $friends;

        return $this;
    }

    public function getComments(): ?array
    {
        return $this->comments;
    }

    public function setComments(?array $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getUserPic(): ?string
    {
        return $this->userPic;
    }

    public function setUserPic(string $userPic): self
    {
        $this->userPic = $userPic;

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
            $userplant->setUser($this);
        }

        return $this;
    }

    public function removeUserplant(Userplant $userplant): self
    {
        if ($this->userplants->contains($userplant)) {
            $this->userplants->removeElement($userplant);
            // set the owning side to null (unless already changed)
            if ($userplant->getUser() === $this) {
                $userplant->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FriendRequest[]
     */
    public function getOutgoingFriendRequests(): Collection
    {
        return $this->outgoingFriendRequests;
    }

    public function addOutgoingFriendRequest(FriendRequest $outgoingFriendRequest): self
    {
        if (!$this->outgoingFriendRequests->contains($outgoingFriendRequest)) {
            $this->outgoingFriendRequests[] = $outgoingFriendRequest;
            $outgoingFriendRequest->setSender($this);
        }

        return $this;
    }

    public function removeOutgoingFriendRequest(FriendRequest $outgoingFriendRequest): self
    {
        if ($this->outgoingFriendRequests->contains($outgoingFriendRequest)) {
            $this->outgoingFriendRequests->removeElement($outgoingFriendRequest);
            // set the owning side to null (unless already changed)
            if ($outgoingFriendRequest->getSender() === $this) {
                $outgoingFriendRequest->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FriendRequest[]
     */
    public function getIncomingFriendRequests(): Collection
    {
        return $this->incomingFriendRequests;
    }

    public function addIncomingFriendRequest(FriendRequest $incomingFriendRequest): self
    {
        if (!$this->incomingFriendRequests->contains($incomingFriendRequest)) {
            $this->incomingFriendRequests[] = $incomingFriendRequest;
            $incomingFriendRequest->setReceiver($this);
        }

        return $this;
    }

    public function removeIncomingFriendRequest(FriendRequest $incomingFriendRequest): self
    {
        if ($this->incomingFriendRequests->contains($incomingFriendRequest)) {
            $this->incomingFriendRequests->removeElement($incomingFriendRequest);
            // set the owning side to null (unless already changed)
            if ($incomingFriendRequest->getReceiver() === $this) {
                $incomingFriendRequest->setReceiver(null);
            }
        }

        return $this;
    }

    public function getPrivacyBirthday(): ?string
    {
        return $this->privacyBirthday;
    }

    public function setPrivacyBirthday(string $privacyBirthday): self
    {
        $this->privacyBirthday = $privacyBirthday;

        return $this;
    }

    public function getPrivacyComments(): ?string
    {
        return $this->privacyComments;
    }

    public function setPrivacyComments(string $privacyComments): self
    {
        $this->privacyComments = $privacyComments;

        return $this;
    }

    public function getPrivacyFriends(): ?string
    {
        return $this->privacyFriends;
    }

    public function setPrivacyFriends(string $privacyFriends): self
    {
        $this->privacyFriends = $privacyFriends;

        return $this;
    }

    public function getPrivacyGarden(): ?string
    {
        return $this->privacyGarden;
    }

    public function setPrivacyGarden(string $privacyGarden): self
    {
        $this->privacyGarden = $privacyGarden;

        return $this;
    }

    public function getPrivacyForum(): ?string
    {
        return $this->privacyForum;
    }

    public function setPrivacyForum(string $privacyForum): self
    {
        $this->privacyForum = $privacyForum;

        return $this;
    }

    public function getNotifications(): ?array
    {
        return $this->notifications;
    }

    public function setNotifications(?array $notifications): self
    {
        $this->notifications = $notifications;

        return $this;
    }

    public function clearNotifications(){
        $this->notifications = null;
    }

    public function addNotification(string $title, string $text){
        $newNotification = [$title, $text];
        if($this->notifications != null){
            array_push($this->notifications, $newNotification);
        }
        else{
            $this->setNotifications([$newNotification]);
        }
    }

    public function getXP(): ?int
    {
        return $this->XP;
    }

    public function setXP(int $XP): self
    {
        $this->XP = $XP;

        return $this;
    }

    /*awards*/
    public function getAwards(): ?array
    {
        return $this->awards;
    }

    public function setAwards(?array $awards): self
    {
        $this->awards = $awards;

        return $this;
    }

    public function getCounterFriends(): ?int
    {
        return $this->counterFriends;
    }

    public function setCounterFriends(?int $counterFriends): self
    {
        $this->counterFriends = $counterFriends;

        return $this;
    }

    public function getCounterPlantsAdded(): ?int
    {
        return $this->counterPlantsAdded;
    }

    public function setCounterPlantsAdded(?int $counterPlantsAdded): self
    {
        $this->counterPlantsAdded = $counterPlantsAdded;

        return $this;
    }

    public function getCounterPlantsWatered(): ?int
    {
        return $this->counterPlantsWatered;
    }

    public function setCounterPlantsWatered(?int $counterPlantsWatered): self
    {
        $this->counterPlantsWatered = $counterPlantsWatered;

        return $this;
    }

    public function getFriendsAward(): ?int
    {
        return $this->friendsAward;
    }

    public function setFriendsAward(?int $friendsAward): self
    {
        $this->friendsAward = $friendsAward;

        return $this;
    }

    public function getLivedAward(): ?int
    {
        return $this->livedAward;
    }

    public function setLivedAward(?int $livedAward): self
    {
        $this->livedAward = $livedAward;

        return $this;
    }

    public function getMemberAward(): ?int
    {
        return $this->memberAward;
    }

    public function setMemberAward(?int $memberAward): self
    {
        $this->memberAward = $memberAward;

        return $this;
    }

    public function getUserplantAward(): ?int
    {
        return $this->userplantAward;
    }

    public function setUserplantAward(?int $userplantAward): self
    {
        $this->userplantAward = $userplantAward;

        return $this;
    }

    public function getWateredAward(): ?int
    {
        return $this->wateredAward;
    }

    public function setWateredAward(?int $wateredAward): self
    {
        $this->wateredAward = $wateredAward;

        return $this;
    }

    public function getLvlAward(): ?string
    {
        return $this->lvlAward;
    }

    public function setLvlAward(?string $lvlAward): self
    {
        $this->lvlAward = $lvlAward;

        return $this;
    }


    public function toAssoc()
    {
        $plants = [];
        foreach($this->userplants as $userplant) {
            $plants = $userplant->toAssoc();
        }

        return [
            'id' => $this->id,
            'email' => $this->email,
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'userPic' => $this->userPic,
            'dateBirth' => $this->dateBirth,
            'country' => $this->country,
            'description' => $this->description,
            'level' => $this->level,
            'dateCreated' => $this->created,
            'roles' => $this->roles,
            'achievments' => $this->achievements,
            'friends' => $this->friends,
            'userplants' =>$plants,
            'comments' =>$this->comments,
            'notifications' =>$this->notifications,
            'privacyBirthday' => $this->privacyBirthday,
            'privacyComments' => $this->privacyComments,
            'privacyForum' => $this->privacyForum,
            'privacyFriends' => $this->privacyFriends,
            'privacyGarden' => $this->privacyGarden,
            'xp' => $this->XP,
            'awards' => $this->awards,
            'counterFriends' => $this->counterFriends,
            'counterPlantsAdded' => $this->counterPlantsAdded,
            'counterPlantsWatered' => $this->counterPlantsWatered,
            'friendsAward' => $this->friendsAward,
            'livedAward' => $this->livedAward,
            'memberAward' => $this->memberAward,
            'userplantAward' => $this->userplantAward,
            'wateredAward' => $this->wateredAward,
            'lvlAward' => $this->lvlAward,
        ];
    }


    /*public function getWrittenComments(): ?ProfileComments
    {
        return $this->writtenComments;
    }

    public function setWrittenComments(ProfileComments $writtenComments): self
    {
        $this->writtenComments = $writtenComments;

        // set the owning side of the relation if necessary
        if ($writtenComments->getUser() !== $this) {
            $writtenComments->setUser($this);
        }

        return $this;
    }

    public function getGottenComments(): ?ProfileComments
    {
        return $this->gottenComments;
    }

    public function setGottenComments(?ProfileComments $gottenComments): self
    {
        $this->gottenComments = $gottenComments;

        return $this;
    }
    */

}
