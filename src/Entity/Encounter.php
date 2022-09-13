<?php

namespace App\Entity;

use App\Doctrine\Enum\Injury;
use App\Repository\EncounterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=EncounterRepository::class)
 */
class Encounter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $chance_t1;
    /**
     * @ORM\Column(type="integer")
     */
    private int $chance_t2;

    /**
     * @ORM\Column(type="integer")
     */
    private int $points_t1;
    /**
     * @ORM\Column(type="integer")
     */
    private int $points_t2;




    /**
     * @ORM\OneToOne(targetEntity=Team::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Team $team_1;

    /**
     * @ORM\OneToOne(targetEntity=Team::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Team $team_2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $report;

    /**
     * @ORM\OneToMany(targetEntity=Injury::class, mappedBy="encounter")
     */
    private $injuries_t1;

    public function __construct()
    {
        $this->injuries_t1 = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getChanceT1()
    {
        return $this->chance_t1;
    }

    /**
     * @param mixed $chance_t1
     */
    public function setChanceT1($chance_t1): void
    {
        $this->chance_t1 = $chance_t1;
    }

    /**
     * @return mixed
     */
    public function getChanceT2()
    {
        return $this->chance_t2;
    }

    /**
     * @param mixed $chance_t2
     */
    public function setChanceT2($chance_t2): void
    {
        $this->chance_t2 = $chance_t2;
    }

    /**
     * @return int
     */
    public function getPointsT1(): int
    {
        return $this->points_t1;
    }

    /**
     * @param int $points_t1
     */
    public function setPointsT1(int $points_t1): void
    {
        $this->points_t1 = $points_t1;
    }

    /**
     * @return int
     */
    public function getPointsT2(): int
    {
        return $this->points_t2;
    }

    /**
     * @param int $points_t2
     */
    public function setPointsT2(int $points_t2): void
    {
        $this->points_t2 = $points_t2;
    }


    /**
     * @return Team
     */
    public function getTeam1()
    {
        return $this->team_1;
    }

    /**
     * @param Team $team_1
     */
    public function setTeam1(Team $team_1): void
    {
        $this->team_1 = $team_1;
    }

    /**
     * @return Team
     */
    public function getTeam2()
    {
        return $this->team_2;
    }

    /**
     * @param Team $team_2
     */
    public function setTeam2(Team $team_2): void
    {
        $this->team_2 = $team_2;
    }

    public function getReport(): ?string
    {
        return $this->report;
    }

    public function setReport(?string $report): self
    {
        $this->report = $report;

        return $this;
    }

    /**
     * @return Collection<int, Injury>
     */
    public function getInjuriesT1(): Collection
    {
        return $this->injuries_t1;
    }

    public function addInjuriesT1(Injury $injuriesT1): self
    {
        if (!$this->injuries_t1->contains($injuriesT1)) {
            $this->injuries_t1[] = $injuriesT1;
            $injuriesT1->setEncounter($this);
        }

        return $this;
    }

    public function removeInjuriesT1(Injury $injuriesT1): self
    {
        if ($this->injuries_t1->removeElement($injuriesT1)) {
            // set the owning side to null (unless already changed)
            if ($injuriesT1->getEncounter() === $this) {
                $injuriesT1->setEncounter(null);
            }
        }

        return $this;
    }


}
