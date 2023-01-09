<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: domaine::class, inversedBy: 'articles')]
    private Collection $domaines;

    #[ORM\ManyToMany(targetEntity: topic::class, inversedBy: 'articles')]
    private Collection $topics;

    #[ORM\Column]
    private array $content = [];

    public function __construct()
    {
        $this->domaines = new ArrayCollection();
        $this->topics = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, domaine>
     */
    public function getDomaines(): Collection
    {
        return $this->domaines;
    }

    public function addDomaine(domaine $domaine): self
    {
        if (!$this->domaines->contains($domaine)) {
            $this->domaines->add($domaine);
        }

        return $this;
    }

    public function removeDomaine(domaine $domaine): self
    {
        $this->domaines->removeElement($domaine);

        return $this;
    }

    /**
     * @return Collection<int, topic>
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(topic $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics->add($topic);
        }

        return $this;
    }

    public function removeTopic(topic $topic): self
    {
        $this->topics->removeElement($topic);

        return $this;
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }
}
