<?php

namespace App\Entity;

use App\Entity\WorkField;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use App\Controller\MeController;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Doctrine\Odm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\CollectionOperationInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    openapiContext:  [
        'security' => [['bearerAuth' =>  []]]
    ],
    operations: [
        new GetCollection(),
        new Post(processor: UserPasswordHasher::class),
        new Get(),
        new Put(processor: UserPasswordHasher::class),
        new Patch(processor: UserPasswordHasher::class),
        new Delete()
    ]
    )

    ]
#[Get(
    name: 'me',
    controller: MeController::class,
    read: false,
    uriTemplate: '/me',
    paginationEnabled: false, 
    openapiContext: [
        'security' => [['bearerAuth' => []]]
    ]
)]

class User implements UserInterface, PasswordAuthenticatedUserInterface, JWTUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Groups(['read, write'])]
    private ?string $email = null;

    #[ORM\ManyToMany(targetEntity: Skills::class)]
    #[Groups(['read', 'write'])]
    private Collection $skills;

    #[ORM\ManyToMany(targetEntity: WorkField::class)]
    #[Groups(['read', 'write'])]
    private Collection $workField;

    #[ORM\Column]
    #[Groups(['read, write'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['write'])]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read', 'write'])]
    private ?int $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read', 'write'])]
    private ?string $nom = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read', 'write'])]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read', 'write'])]
    private ?string $experience = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read', 'write'])]
    private ?string $secteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read', 'write'])]
    private ?string $telephone = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read'])]
    private ?int $user_type = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read', 'write'])]
    private ?int $subscription_type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\OneToMany(mappedBy: 'user1', targetEntity: Chatroom::class, orphanRemoval: true)]
    private Collection $chatrooms;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Message $message = null;

    public function __construct()
    {
        $this->chatrooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self  
    {
        $this->id = $id;

        return $this;
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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSecteur(): ?int
    {
        return $this->secteur;
    }

    public function setSecteur(?int $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUserType(): ?int
    {
        return $this->user_type;
    }

    public function setUserType(int $user_type): self
    {
        $this->user_type = $user_type;

        return $this;
    }

    public function getSubscriptionType(): ?int
    {
        return $this->subscription_type;
    }

    public function setSubscriptionType(?int $subscription_type): self
    {
        $this->subscription_type = $subscription_type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

        /**
     * @return Collection<int, Skills>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skills $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skills $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }

            /**
     * @return Collection<int, Skills>
     */
    public function getWorkField(): Collection
    {
        return $this->workField;
    }

    public function addWorkField(WorkField $workField): self
    {
        if (!$this->workField->contains($workField)) {
            $this->workField->add($workField);
        }

        return $this;
    }

    public function removeWorkField(WorkField $workField): self
    {
        $this->workField->removeElement($workField);

        return $this;
    }

    public static function createFromPayload($id, array $payload)
    {
        return (new User())->setId($id);
    }

    /**
     * @return Collection<int, Chatroom>
     */
    public function getChatrooms(): Collection
    {
        return $this->chatrooms;
    }

    public function addChatroom(Chatroom $chatroom): self
    {
        if (!$this->chatrooms->contains($chatroom)) {
            $this->chatrooms->add($chatroom);
            $chatroom->setUser1($this);
        }

        return $this;
    }

    public function removeChatroom(Chatroom $chatroom): self
    {
        if ($this->chatrooms->removeElement($chatroom)) {
            // set the owning side to null (unless already changed)
            if ($chatroom->getUser1() === $this) {
                $chatroom->setUser1(null);
            }
        }

        return $this;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): self
    {
        // set the owning side of the relation if necessary
        if ($message->getUser() !== $this) {
            $message->setUser($this);
        }

        $this->message = $message;

        return $this;
    }

}
