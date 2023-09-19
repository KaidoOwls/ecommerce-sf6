<?php

namespace App\Entity;

use App\Entity\Trait\Slugtrait;
use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    use Slugtrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

// test 

#[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'categories')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private $parent;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private $categories;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: Plat::class)]
    private $plat;

   public function __construct()
    {
       $this->categories = new ArrayCollection();
       $this->plat = new ArrayCollection();
    }
//fin test

    #[ORM\Column]
    private ?int $categoryOrder = null;

    #[ORM\Column(length: 50)]
    private ?string $image = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Plat::class)]
    private Collection $plats;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getCategoryOrder(): ?int
    {
        return $this->categoryOrder;
    }

    public function setCategoryOrder(int $categoryOrder): self
    {
        $this->categoryOrder = $categoryOrder;

        return $this;
    }



    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }
// test
public function getParent(): ?self
{
    return $this->parent;
}

public function setParent(?self $parent): self
{
    $this->parent = $parent;

    return $this;
}

/**
 * @return Collection|self[]
 */
public function getCategories(): Collection
{
    return $this->categories;
}

public function addCategory(self $category): self
{
    if (!$this->categories->contains($category)) {
        $this->categories[] = $category;
        $category->setParent($this);
    }

    return $this;
}

public function removeCategory(self $category): self
{
    if ($this->categories->removeElement($category)) {
        // set the owning side to null (unless already changed)
        if ($category->getParent() === $this) {
            $category->setParent(null);
        }
    }

    return $this;
}

















//test
    /**
     * @return Collection<int, Plat>
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plat $plat): static
    {
        if (!$this->plats->contains($plat)) {
            $this->plats->add($plat);
            $plat->setCategorie($this);
        }

        return $this;
    }

    public function removePlat(Plat $plat): static
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getCategorie() === $this) {
                $plat->setCategorie(null);
            }
        }

        return $this;
    }
}
// test 
