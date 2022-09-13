<?php

namespace App\Entity;

use App\Repository\InjuryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InjuryRepository::class)
 */
class Injury
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="Injury")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $amound;

    /**
     * @ORM\ManyToOne(targetEntity=Encounter::class, inversedBy="injuries_t1")
     */
    private $encounter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAmound(): ?int
    {
        return $this->amound;
    }

    public function setAmound(int $amound): self
    {
        $this->amound = $amound;

        return $this;
    }

    public function getEncounter(): ?Encounter
    {
        return $this->encounter;
    }

    public function setEncounter(?Encounter $encounter): self
    {
        $this->encounter = $encounter;

        return $this;
    }
}
