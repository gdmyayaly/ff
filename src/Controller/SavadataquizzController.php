<?php

namespace App\Controller;

use App\Entity\UserReponseQuestion;
use App\Repository\LangueRepository;
use App\Repository\QuestionnairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
    /**
     * @Route("/save", name="savadataquizz")
     */
class SavadataquizzController extends AbstractController
{
 /**
     * @Route("/reponse", methods={"GET"})
     */
    public function savereponse(Request $request,QuestionnairesRepository $questionnairesRepository,LangueRepository $langueRepository,EntityManagerInterface $entityManagerInterface){
        $question=$questionnairesRepository->find($request->query->get('idquestion'));
        $langue=$langueRepository->findOneBy(['nom'=>$request->query->get('langue')]);
        $user=$this->getUser();
        $userreponse= new UserReponseQuestion();
        $userreponse->setQuestion($question);
        $userreponse->setLangue($langue);
        $userreponse->setUser($user);
        $userreponse->setDuree($request->query->get('duree'));
        $userreponse->setReponse($request->query->get('reponse'));
        // $userreponse->setDatedebut(new DateTime($request->query->get('debut')));
        // $userreponse->setDatefin(new DateTime($request->query->get('fin')));
        $entityManagerInterface->persist($userreponse);
        $entityManagerInterface->flush();
        return $this->json([
            "message"=>"Bravo"
        ]);
    }

}
