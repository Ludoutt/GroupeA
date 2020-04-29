<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Feature;
use App\Entity\Project;
use App\Form\CategoryType;
use App\Form\FeatureType;
use App\Form\ProjectType;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use App\Repository\FeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project")
 */
class ProjectController extends AbstractController
{

    /**
     * @Route("/", name="project_index", methods={"GET"})
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        $project = new Project();
        $formProject = $this->createForm(ProjectType::class, $project, [
            'action' => $this->generateUrl('project_new'),
            'method' => 'POST',
        ]);
        
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
            'formProject' => $formProject->createView(),
            ]);
    }

    /**
     * @Route("/new", name="project_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $project->setCreatedAt(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/new.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="project_show", methods={"GET"})
     */
    public function show(Project $project): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        $category = new Category();
        $formCategory = $this->createForm(CategoryType::class, $category, [
            'action' => $this->generateUrl('category_new'),
            'method' => 'POST',
        ]);
        $feature = new Feature();
        $formFeature = $this->createForm(FeatureType::class, $feature, [
            'action' => $this->generateUrl('feature_new'),
            'method' => 'POST',
        ]);
        return $this->render('project/show.html.twig', [
            'project' => $project,
            'formCategory' => $formCategory->createView(),
            'formFeature' => $formFeature->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="project_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Project $project): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }

        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $project->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="project_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Project $project): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('root');
        }
        
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($project);
            $entityManager->flush();
        }

        return $this->redirectToRoute('project_index');
    }
}
