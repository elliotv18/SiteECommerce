<?php

namespace App\Controller;

use App\Entity\BoutiqueECommerce;
use App\Form\BoutiqueECommerceType;
use App\Repository\BoutiqueECommerceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/boutique/e/commerce")
 */
class AdminBoutiqueECommerceController extends AbstractController
{
    /**
     * @Route("/", name="admin_boutique_e_commerce_index", methods={"GET"})
     */
    public function index(BoutiqueECommerceRepository $boutiqueECommerceRepository): Response
    {
        return $this->render('admin_boutique_e_commerce/index.html.twig', [
            'boutique_e_commerces' => $boutiqueECommerceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_boutique_e_commerce_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $boutiqueECommerce = new BoutiqueECommerce();
        $form = $this->createForm(BoutiqueECommerceType::class, $boutiqueECommerce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($boutiqueECommerce);
            $entityManager->flush();

            return $this->redirectToRoute('admin_boutique_e_commerce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boutique_e_commerce/new.html.twig', [
            'boutique_e_commerce' => $boutiqueECommerce,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_boutique_e_commerce_show", methods={"GET"})
     */
    public function show(BoutiqueECommerce $boutiqueECommerce): Response
    {
        return $this->render('admin_boutique_e_commerce/show.html.twig', [
            'boutique_e_commerce' => $boutiqueECommerce,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_boutique_e_commerce_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BoutiqueECommerce $boutiqueECommerce): Response
    {
        $form = $this->createForm(BoutiqueECommerceType::class, $boutiqueECommerce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_boutique_e_commerce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boutique_e_commerce/edit.html.twig', [
            'boutique_e_commerce' => $boutiqueECommerce,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_boutique_e_commerce_delete", methods={"POST"})
     */
    public function delete(Request $request, BoutiqueECommerce $boutiqueECommerce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boutiqueECommerce->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($boutiqueECommerce);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_boutique_e_commerce_index', [], Response::HTTP_SEE_OTHER);
    }
}
