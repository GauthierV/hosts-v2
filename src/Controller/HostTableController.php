<?php

namespace App\Controller;

use App\Entity\HostTable;
use App\Form\HostTableType;
use App\Repository\HostTableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/host/table")
 */
class HostTableController extends AbstractController
{
    /**
     * @Route("/", name="host_table_index", methods={"GET"})
     */
    public function index(HostTableRepository $hostTableRepository): Response
    {
        return $this->render('host_table/index.html.twig', [
            'host_tables' => $hostTableRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="host_table_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hostTable = new HostTable();
        $form = $this->createForm(HostTableType::class, $hostTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hostTable);
            $entityManager->flush();

            return $this->redirectToRoute('host_table_index');
        }

        return $this->render('host_table/new.html.twig', [
            'host_table' => $hostTable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_table_show", methods={"GET"})
     */
    public function show(HostTable $hostTable): Response
    {
        return $this->render('host_table/show.html.twig', [
            'host_table' => $hostTable,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="host_table_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HostTable $hostTable): Response
    {
        $form = $this->createForm(HostTableType::class, $hostTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('host_table_index', [
                'id' => $hostTable->getId(),
            ]);
        }

        return $this->render('host_table/edit.html.twig', [
            'host_table' => $hostTable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_table_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HostTable $hostTable): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hostTable->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hostTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('host_table_index');
    }
}
