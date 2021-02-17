<?php

namespace App\Controller;

use App\Entity\UserReponseQuestion;
use App\Repository\LangueRepository;
use App\Repository\QuestionsRepository;
use App\Repository\ReponseQuestionsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
    /**
     * @Route("/save", name="save_data_quizz")
     */
class SaveDataQuizzController extends AbstractController
{
    /**
     * @Route("/reponse", methods={"GET"})
     */
    public function saveData(Request $request,UserRepository $userRepository,QuestionsRepository $questionsRepository,ReponseQuestionsRepository $reponseQuestionsRepository,LangueRepository $langueRepository,EntityManagerInterface $entityManagerInterface)
    {
        $user=$this->getUser();
        $question=$questionsRepository->find($request->query->get('question'));
        if ($request->query->get('reponse')=='0') {
            $rep=$reponseQuestionsRepository->findOneBy(['question'=>$question->getId(),'libeller'=>'Pas de reponse']);
        }else{
            $rep=$reponseQuestionsRepository->find($request->query->get('reponse'));
        }
        
        $lang=$langueRepository->findOneBy(['nom'=>$request->query->get('langue')]);
        $duree=$request->query->get('duree');
        $userReponse= new UserReponseQuestion();
        $userReponse->setUser($user);
        $userReponse->setQuestion($question);
        $userReponse->setReponse($rep);
        $userReponse->setLangue($lang);
        $userReponse->setDuree($duree);
        $entityManagerInterface->persist($userReponse);
        $entityManagerInterface->flush();
        return $this->json(['Message'=>'Bravo']);
    }
}
