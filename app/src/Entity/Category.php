<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryFeature", mappedBy="category", orphanRemoval=true)
     */
    private $categoryFeatures;

    public function __construct()
    {
        $this->categoryFeatures = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Collection|CategoryFeature[]
     */
    public function getCategoryFeatures(): Collection
    {
        return $this->categoryFeatures;
    }

    public function addCategoryFeature(CategoryFeature $categoryFeature): self
    {
        if (!$this->categoryFeatures->contains($categoryFeature)) {
            $this->categoryFeatures[] = $categoryFeature;
            $categoryFeature->setCategory($this);
        }

        return $this;
    }

    public function removeCategoryFeature(CategoryFeature $categoryFeature): self
    {
        if ($this->categoryFeatures->contains($categoryFeature)) {
            $this->categoryFeatures->removeElement($categoryFeature);
            // set the owning side to null (unless already changed)
            if ($categoryFeature->getCategory() === $this) {
                $categoryFeature->setCategory(null);
            }
        }

        return $this;
    }
}
