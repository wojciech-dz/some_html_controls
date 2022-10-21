<?php

namespace App\Entity;

use App\Repository\InvoicesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoicesRepository::class)
 */
class Invoices
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $mpk;

    /**
     * @ORM\Column(type="float")
     */
    private $net;

    /**
     * @ORM\Column(type="float")
     */
    private $volume;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $vat;

    /**
     * @ORM\Column(type="float")
     */
    private $gross;

    /**
     * @ORM\Column(type="float")
     */
    private $totalNet;

    /**
     * @ORM\Column(type="float")
     */
    private $totalGross;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMpk(): ?string
    {
        return $this->mpk;
    }

    public function setMpk(?string $mpk): self
    {
        $this->mpk = $mpk;

        return $this;
    }

    public function getNet(): ?float
    {
        return $this->net;
    }

    public function setNet(float $net): self
    {
        $this->net = $net;

        return $this;
    }

    public function getVolume(): ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getVat(): ?string
    {
        return $this->vat;
    }

    public function setVat(string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getGross(): ?float
    {
        return $this->gross;
    }

    public function setGross(float $gross): self
    {
        $this->gross = $gross;

        return $this;
    }

    public function getTotalNet(): ?float
    {
        return $this->totalNet;
    }

    public function setTotalNet(float $totalNet): self
    {
        $this->totalNet = $totalNet;

        return $this;
    }

    public function getTotalGross(): ?float
    {
        return $this->totalGross;
    }

    public function setTotalGross(float $totalGross): self
    {
        $this->totalGross = $totalGross;

        return $this;
    }
}
