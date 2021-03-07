<?php

namespace App\Controller;

use App\Repository\QuestionsRepository;
use App\Repository\ThematiqueRepository;
use App\Repository\UserReponseQuestionRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiAdministrationController extends AbstractController
{
    /**
     * @Route("/getuserinscris", methods={"GET"})
     */
    public function getUserInscris(UserRepository $userRepository,SerializerInterface $serializer){
        $user= $userRepository->findAll();
        $data = $serializer->serialize($user, 'json', [
            'groups' => ['user']
        ]);
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
    /**
     * @Route("/oneuserstat", methods={"GET"})
     */
    public function oneuserstat(Request $request,ThematiqueRepository $thematiqueRepository,QuestionsRepository $questionsRepository,UserReponseQuestionRepository $userReponseQuestionRepository){
        $iduser=$request->query->get('iduser');
        $allthematique=$thematiqueRepository->findAll();
        $myscusumresponse=array();
       $userRes=$userReponseQuestionRepository->findBy(['user'=>$iduser]);
        for ($i=0; $i < count($allthematique); $i++) { 
            $temp=["nom"=>$allthematique[$i]->getNom(),"reponse"=>array(),"good"=>0,"bad"=>0,"moyennegood"=>0,"moyennebad"=>0];
            array_push($myscusumresponse,$temp);
        }
        for ($i=0; $i < count($userRes); $i++) { 
            $temp=["libeller"=>$userRes[$i]->getQuestion()->getLibeller(),"reponse"=>$userRes[$i]->getReponse()->getLibeller(),"statut"=>$userRes[$i]->getReponse()->getGoodReponse(),"duree"=>$userRes[$i]->getDuree()];
            $them=$userRes[$i]->getQuestion()->getThematique()->getNom();
            $key = array_search($them, array_column($myscusumresponse, 'nom'));
            array_push($myscusumresponse[$key]['reponse'],$temp);
            if ($userRes[$i]->getReponse()->getGoodReponse()==true) {
                $myscusumresponse[$key]['good']++;
                $myscusumresponse[$key]['moyennegood']=$myscusumresponse[$key]['moyennegood']+$userRes[$i]->getDuree();
            }else{
                $myscusumresponse[$key]['bad']++;
                $myscusumresponse[$key]['moyennebad']=$myscusumresponse[$key]['moyennebad']+$userRes[$i]->getDuree();
            }
        }
        for ($i=0; $i < count($allthematique); $i++) { 
            $them=$allthematique[$i]->getNom();
            $key = array_search($them, array_column($myscusumresponse, 'nom'));
            $myscusumresponse[$key]['moyennegood']=$myscusumresponse[$key]['moyennegood']/$myscusumresponse[$key]['good'];
            $myscusumresponse[$key]['moyennebad']=$myscusumresponse[$key]['moyennebad']/$myscusumresponse[$key]['bad'];

        }
        return $this->render('administration/apprenant.html.twig', [
            'alldata' => 'myscusumresponse',
        ]);
    }
    /**
     * @Route("/onethemestat")
     */
    public function onethemestat(Request $request){

    }
}
