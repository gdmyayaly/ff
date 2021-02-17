<?php

namespace App\Controller;

use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/", name="home_administration")
     */
    public function home(): Response
    {
        return $this->render('administration/home.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }

    /**
     * @Route("/apprenant", name="allapprenant")
     */
    public function allApprenant(): Response
    {
        return $this->render('administration/apprenant.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }
}
