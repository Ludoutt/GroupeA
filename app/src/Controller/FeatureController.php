<?php

namespace App\Controller;

use App\Entity\Feature;
use App\Form\FeatureType;
use App\Repository\FeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/feature")
 */
class FeatureController extends AbstractController
{
    /**
     * @Route("/", name="feature_index", methods={"GET"})
     */
    public function index(FeatureRepository $featureRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        return $this->render('feature/index.html.twig', [
            'features' => $featureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="feature_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        $feature = new Feature();
        $form = $this->createForm(FeatureType::class, $feature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $feature->setCreatedAt(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($feature);
            $entityManager->flush();

            return $this->redirectToRoute('feature_index');
        }

        return $this->render('feature/new.html.twig', [
            'feature' => $feature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="feature_show", methods={"GET"})
     */
    public function show(Feature $feature): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        return $this->render('feature/show.html.twig', [
            'feature' => $feature,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="feature_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Feature $feature): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        $form = $this->createForm(FeatureType::class, $feature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $feature->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('feature_index');
        }

        return $this->render('feature/edit.html.twig', [
            'feature' => $feature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="feature_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Feature $feature): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }
        
        if ($this->isCsrfTokenValid('delete'.$feature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($feature);
            $entityManager->flush();
        }
        return $this->redirectToRoute('project_show', ['id' => $request->request->get('_project')]);
    }
}
