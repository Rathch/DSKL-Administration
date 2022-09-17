<?php

namespace App\Service;

use App\Entity\Encounter;
use App\Entity\PlayDay;
use App\Entity\Team;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;

class GenerateEncounterForPlayDayService
{
    protected TeamRepository $teamReposetory;
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->teamReposetory = $entityManager->getRepository(Team::class);
    }
    public function generate(PlayDay $playDay)
    {
        //todo: generate Team List

        $teams = $this->teamReposetory->findAll();

        $matches = [];
        foreach ($teams as $team) {
            $encounter = new Encounter();
            $encounter->setTeam1($team);
            $encounter->setTeam2($this->checkForMatch($team,$teams));
            $this->entityManager->persist($encounter);
        }
        $this->entityManager->flush();

        //todo: map Teams Uniqe
        //todo: generate new entcounter per match
        //todo: add encounter to playday
    }

    private function checkForMatch($team,$teams2) {
       foreach ($teams2 as $team2) {
           if ($team->getId() != $team2->getId()){
               return $team2;
           }
       }
    }
}