<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nip;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $regon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vat;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $houseNo;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $flatNo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $firstContactDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="boolean")
     */
    private $removed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

    public function setNip(string $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getRegon(): ?string
    {
        return $this->regon;
    }

    public function setRegon(string $regon): self
    {
        $this->regon = $regon;

        return $this;
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

    public function isVat(): ?bool
    {
        return $this->vat;
    }

    public function setVat(bool $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function isRemoved(): ?bool
    {
        return $this->removed;
    }

    public function setRemoved(bool $removed = true): self
    {
        $this->removed = $removed;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getHouseNo(): ?string
    {
        return $this->houseNo;
    }

    public function setHouseNo(?string $houseNo): self
    {
        $this->houseNo = $houseNo;

        return $this;
    }

    public function getFlatNo(): ?string
    {
        return $this->flatNo;
    }

    public function setFlatNo(?string $flatNo): self
    {
        $this->flatNo = $flatNo;

        return $this;
    }

    public function getFirstContactDate(): ?\DateTimeInterface
    {
        return $this->firstContactDate;
    }

    public function setFirstContactDate(\DateTimeInterface $firstContactDate): self
    {
        $this->firstContactDate = $firstContactDate;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}
