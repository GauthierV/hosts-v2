<?php

namespace App\Controller;

use App\Repository\HostTableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(HostTableRepository $hostTableRepository)
    {
        $listTable = $hostTableRepository->findLimit();

        $table = $hostTableRepository->getRandomTable();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Best table',
            'listTable' => $listTable,
            'table' => $table,
        ]);
    }
}
