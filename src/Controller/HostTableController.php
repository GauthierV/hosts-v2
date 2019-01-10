<?php

namespace App\Controller;

use App\Entity\HostTable;
use App\Form\HostTableType;
use App\Repository\HostTableRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
     * @Route("/admin", name="host_table_find", methods={"GET"})
     */
    /*public function findLalest(HostTableRepository $TableShow)
    {
        $tables = $TableShow->findLatest();

        return $this->render( 'baseadmin.html.twig', [
            'tables'=>$tables,
        ]);
    }*/

        //return $this->render('article/index.html.twig', [

    /**
     * @Route("/new", name="host_table_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $hostTable = new HostTable();
        $form = $this->createForm(HostTableType::class, $hostTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hostTable = $this->uploadImage($hostTable);

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
     *
     */
    public function show(HostTable $hostTable): Response
    {
        return $this->render('host_table/show.html.twig', [
            'host_table' => $hostTable,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="host_table_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, HostTable $hostTable): Response
    {
        if (!is_null($hostTable->getImage())){
            $img =new File($this->getParameter('images_table_directory') . '/'. $hostTable->getImage());
            $hostTable->setImage($img);
        }


        $form = $this->createForm(HostTableType::class, $hostTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!is_null($hostTable->getImage())){
                $hostTable = $this->uploadImage($hostTable);
            }

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
     * @IsGranted("ROLE_ADMIN")
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
    
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }


    private function uploadImage(HostTable $host)
    {
        $image = $host->getImage();

        $imageName = $this->generateUniqueFileName().'.'.$image->guessExtension();

        // Move the file to the directory where brochures are stored
        try {
            $image->move(
                $this->getParameter('images_table_directory'),
                $imageName
            );
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        $host->setImage($imageName);

        return $host;
    }
}
