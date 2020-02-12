<?php

namespace App\Controller;

use App\Entity\CategoryFeature;
use App\Form\CategoryFeatureType;
use App\Repository\CategoryFeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categoryFeature")
 */
class CategoryFeatureController extends AbstractController
{
    /**
     * @Route("/", name="category_feature_index", methods={"GET"})
     */
    public function index(CategoryFeatureRepository $categoryFeatureRepository): Response
    {
        return $this->render('category_feature/index.html.twig', [
            'category_features' => $categoryFeatureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_feature_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryFeature = new CategoryFeature();
        $form = $this->createForm(CategoryFeatureType::class, $categoryFeature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $categoryFeature->setCreatedAt(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryFeature);
            $entityManager->flush();

            return $this->redirectToRoute('category_feature_index');
        }

        return $this->render('category_feature/new.html.twig', [
            'category_feature' => $categoryFeature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_feature_show", methods={"GET"})
     */
    public function show(CategoryFeature $categoryFeature): Response
    {
        return $this->render('category_feature/show.html.twig', [
            'category_feature' => $categoryFeature,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_feature_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryFeature $categoryFeature): Response
    {
        $form = $this->createForm(CategoryFeatureType::class, $categoryFeature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $categoryFeature->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_feature_index');
        }

        return $this->render('category_feature/edit.html.twig', [
            'category_feature' => $categoryFeature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_feature_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryFeature $categoryFeature): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryFeature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryFeature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_feature_index');
    }
}
