<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private readonly int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private int $professionalism;

    /**
     * @ORM\Column(type="integer")
     */
    private int $brutality;

    /**
     * @ORM\Column(type="integer")
     */
    private int $robustness;

    /**
     * @ORM\Column(type="integer")
     */
    private int $offensive;

    /**
     * @ORM\Column(type="integer")
     */
    private int $defensive;

    /**
     * @ORM\Column(type="integer")
     */
    private int $tactics;

    /**
     * @ORM\Column(type="integer")
     */
    private int $spirit;

    private $power;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProfessionalism(): int
    {
        return $this->professionalism;
    }

    public function setProfessionalism(int $professionalism): self
    {
        $this->professionalism = $professionalism;

        return $this;
    }

    public function getBrutality(): int
    {
        return $this->brutality;
    }

    public function setBrutality(int $brutality): self
    {
        $this->brutality = $brutality;

        return $this;
    }

    public function getRobustness(): int
    {
        return $this->robustness;
    }

    public function setRobustness(int $robustness): self
    {
        $this->robustness = $robustness;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffensive(): int
    {
        return $this->offensive;
    }

    /**
     * @param int $offensive
     */
    public function setOffensive( int $offensive): void
    {
        $this->offensive = $offensive;
    }

    /**
     * @return int
     */
    public function getDefensive(): int
    {
        return $this->defensive;
    }

    /**
     * @param int $defensive
     */
    public function setDefensive(int $defensive): void
    {
        $this->defensive = $defensive;
    }

    /**
     * @return int
     */
    public function getTactics()
    {
        return $this->tactics;
    }

    /**
     * @param mixed $tactics
     */
    public function setTactics($tactics): void
    {
        $this->tactics = $tactics;
    }

    /**
     * @return int
     */
    public function getSpirit()
    {
        return $this->spirit;
    }

    /**
     * @param int $spirit
     */
    public function setSpirit( int $spirit): void
    {
        $this->spirit = $spirit;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    public function getPower(): int
    {
        return $this->getBrutality()+$this->getProfessionalism()+$this->getRobustness()+$this->getDefensive()+$this->getOffensive()+$this->getSpirit()+$this->getTactics();
    }




}
