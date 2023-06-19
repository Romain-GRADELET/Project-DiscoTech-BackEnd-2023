<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StyleRepository::class)
 */
class Style
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"style_browse"})
     * @Groups({"album_browse"})
     * @Groups({"album_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"album_browse"})
     * @Groups({"style_browse"})
     * @Assert\NotBlank(message= "Ce champs ne peut pas être vide")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"style_browse"})
     * @Assert\NotBlank(message= "Ce champs ne peut pas être vide")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Album::class, mappedBy="style")
     * @Groups({"style_read"})
     */
    private $albums;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
    }

    

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

    /**
     * A visual identifier that represents this style.
     *
     * @see StyleInterface
     */
    public function getStylenameInterface(): string
    {
        return (string) $this->name;
    }

    /**
     * @deprecated since Symfony 5.3, use getStyleIdentifier instead
     */
    public function getStylename(): string
    {
        return (string) $this->name;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Album>
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->albums->contains($album)) {
            $this->albums[] = $album;
            $album->addStyle($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->albums->removeElement($album)) {
            $album->removeStyle($this);
        }

        return $this;
    }
}
