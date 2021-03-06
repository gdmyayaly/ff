<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\LangueRepository;
use App\Repository\QuestionsRepository;
use App\Repository\ThematiqueRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
     * @Route("/player", name="player")
     */
class PlayerController extends AbstractController
{

/**
     * @Route("/langue", methods={"GET"})
     */
    public function getLangue(LangueRepository $langueRepository,SerializerInterface $serializer){
        $langue= $langueRepository->findAll();
        $data = $serializer->serialize($langue, 'json', [
            'groups' => ['user']
        ]);
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
    /**
     * @Route("/saveplayer", methods={"GET"})
     */
    public function saveplayer(Request $request,EntityManagerInterface $entityManagerInterface,UserPasswordEncoderInterface $encoder,JWTEncoderInterface $JWTEncoder,LangueRepository $langueRepository,UserRepository $userRepository){
        $isUser=$userRepository->findOneBy(['username'=>$request->query->get('username')]);
        if ($isUser) {
            $token = $JWTEncoder->encode([
                'username' => $isUser->getUsername(),
                'roles' => $isUser->getRoles(),
                'Prenom' => $isUser->getPrenom(),
                'exp' => time() + 6000 // 1 hour expiration
            ]);
            return new JsonResponse(['token' => $token]);
        }
        else{
            $user=new User();
            $user->setPrenom($request->query->get('prenom'));
            $user->setNom($request->query->get('nom'));
             $pass=$encoder->encodePassword($user,"welcome");
            $user->setPassword($pass);
            $user->setUsername($request->query->get('username'));
            $user->setStatut(true);
            $user->setRoles(["ROLE_USER"]);
            $langue=$langueRepository->findOneBy(['nom'=>$request->query->get('username')]);
            $user->setLangue($langue);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            $token = $JWTEncoder->encode([
                'username' => $user->getUsername(),
                'roles' => $user->getRoles(),
                'Prenom' => $user->getPrenom(),
                'exp' => time() + 6000 // 1 hour expiration
            ]);
            return new JsonResponse(['token' => $token]);
        }

    }


    /**
     * @Route("/saveplayer", methods={"POST"})
     */
    public function saveplayerpost(Request $request,EntityManagerInterface $entityManagerInterface,UserPasswordEncoderInterface $encoder,JWTEncoderInterface $JWTEncoder,LangueRepository $langueRepository,UserRepository $userRepository){
        $data = json_decode($request->getContent(),true);
        if(!$data){
            $data=$request->request->all();
        }
        dd($data);
        $isUser=$userRepository->findOneBy(['username'=>$data['username']]);
        if ($isUser) {
            $token = $JWTEncoder->encode([
                'username' => $isUser->getUsername(),
                'roles' => $isUser->getRoles(),
                'Prenom' => $isUser->getPrenom(),
                'exp' => time() + 6000 // 1 hour expiration
            ]);
            return new JsonResponse(['token' => $token]);
        }
        $user=new User();
        $user->setPrenom($data['prenom']);
        $user->setNom($data['nom']);
        $pass=$encoder->encodePassword($user,"welcome");
        $user->setPassword($pass);
        $user->setUsername($data['username']);
        $user->setStatut(true);
        $user->setRoles(["ROLE_USER"]);
        $langue=$langueRepository->findOneBy(['nom'=>$data['username']]);
        $user->setLangue($langue);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        $token = $JWTEncoder->encode([
            'username' => $user->getUsername(),
            'roles' => $user->getRoles(),
            'Prenom' => $user->getPrenom(),
            'exp' => time() + 6000 // 1 hour expiration
        ]);
        return new JsonResponse(['token' => $token]);
    }
    /**
     * @Route("/gettuto", methods={"GET"})
     */
    public function gettuto(QuestionsRepository $questionsRepository, SerializerInterface $serializer): Response
    {
        $tuto=$questionsRepository->findBy(['thematique'=>null]);
        $data = $serializer->serialize($tuto, 'json', [
            'groups' => ['user']
        ]);
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
    /**
     * @Route("/theme", methods={"GET"})
     */
    public function getTheme(ThematiqueRepository $thematiqueRepository, SerializerInterface $serializer){
        $tuto=$thematiqueRepository->findAll();
        $data = $serializer->serialize($tuto, 'json', [
            'groups' => ['user']
        ]);
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
    /**
     * @Route("/question", methods={"GET"})
     */
    public function getQuestion(Request $request,QuestionsRepository $questionsRepository,SerializerInterface $serializer){
        $idQuestion=$request->query->get('id');
        $tuto=$questionsRepository->findBy(['thematique'=>$idQuestion]);
        $data = $serializer->serialize($tuto, 'json', [
            'groups' => ['user']
        ]);
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}
