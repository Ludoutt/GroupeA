<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FeatureRepository")
 */
class Feature
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $jobValue;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $acceptationValidation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryFeature", mappedBy="feature", orphanRemoval=true)
     */
    private $categoryFeatures;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sortBy;

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

    public function getJobValue(): ?int
    {
        return $this->jobValue;
    }

    public function setJobValue(?int $jobValue): self
    {
        $this->jobValue = $jobValue;

        return $this;
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

    public function getAcceptationValidation(): ?string
    {
        return $this->acceptationValidation;
    }

    public function setAcceptationValidation(?string $acceptationValidation): self
    {
        $this->acceptationValidation = $acceptationValidation;

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
            $categoryFeature->setFeature($this);
        }

        return $this;
    }

    public function removeCategoryFeature(CategoryFeature $categoryFeature): self
    {
        if ($this->categoryFeatures->contains($categoryFeature)) {
            $this->categoryFeatures->removeElement($categoryFeature);
            // set the owning side to null (unless already changed)
            if ($categoryFeature->getFeature() === $this) {
                $categoryFeature->setFeature(null);
            }
        }

        return $this;
    }

    public function getSortBy(): ?int
    {
        return $this->sortBy;
    }

    public function setSortBy(?int $sortBy): self
    {
        $this->sortBy = $sortBy;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
