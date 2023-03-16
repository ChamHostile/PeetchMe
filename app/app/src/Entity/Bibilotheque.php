<?php

namespace App\Entity;

use App\Repository\BibilothequeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibilothequeRepository::class)]
class Bibilotheque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Project::class)]
    private Collection $project_id;

    #[ORM\OneToOne(inversedBy: 'bibilotheque', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    public function __construct()
    {
        $this->project_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Project>
     */
    public function getProjectId(): Collection
    {
        return $this->project_id;
    }

    public function addProjectId(Project $projectId): self
    {
        if (!$this->project_id->contains($projectId)) {
            $this->project_id->add($projectId);
        }

        return $this;
    }

    public function removeProjectId(Project $projectId): self
    {
        $this->project_id->removeElement($projectId);

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
