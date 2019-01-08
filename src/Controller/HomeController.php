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
<<<<<<< HEAD
    public function index(HostTableRepository $repository)
    {
        $table = $repository->getRandomTable();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Best table',
            'table' => $table,
=======
    public function index(HostTableRepository $hostTableRepository)
    {
        $listTable = $hostTableRepository->findLimit();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Best table',
            'listTable' => $listTable
>>>>>>> a4bd4e3bc4eb3d65b4cbfa08207d72a010cb9f66
        ]);
    }
}
