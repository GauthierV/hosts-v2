<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\MealRepository;
use App\Repository\UserRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/hostSpace")
 */
class HostController extends AbstractController
{
    /**
     * @Route("/", name="host_space", methods={"GET"})
     * @isGranted("ROLE_HOST")
     */
   /* public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'listResa' => $mealRepository->findUserMeal(),
        ]);
    }*/
}