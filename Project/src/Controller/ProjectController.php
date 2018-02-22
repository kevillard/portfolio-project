<?php

namespace App\Controller;


use App\Entity\Creator;
use App\Entity\Category;
use App\Entity\Technology;
use App\Entity\Project;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ProjectController extends Controller
{

    /**
     * @Route("/api/project/{id}", name="project_show")
     * @Method({"POST"})
     */
    public function showProject(Request $request, Project $project)
    {
            $authAPI = $this->authAPI($request);
            $responseError = new Response();
            $responseError->setStatusCode(500);

            if($authAPI){

              $data = $this->get('jms_serializer')->serialize($project, 'json');

              $response = new Response($data);

              $response->headers->set('Content-Type', 'application/json');

              return $response;
            } elseif($authAPI == "public") {

              $data = $this->get('jms_serializer')->serialize($project, 'json');

              $response = new Response($data);

              $response->headers->set('Content-Type', 'application/json');

              return $response;
            } else {
              return $responseError;
            }
      }

    /**
     * @Route("/api/projects", name="projects_list")
     * @Method({"POST"})
     */
    public function showProjects(Request $request)
    {

        $authAPI = $this->authAPI($request);
        $responseError = new Response();
        $responseError->setStatusCode(500);

        if($authAPI) {

            $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

            $data = $this->get('jms_serializer')->serialize($projects, 'json');


            $response = new Response($data);

            $response->headers->set('Content-Type', 'application/json');

            return $response;
        } elseif($authAPI == "public") {

          $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

          $data = $this->get('jms_serializer')->serialize($projects, 'json');


          $response = new Response($data);

          $response->headers->set('Content-Type', 'application/json');

          return $response;
        } else {
            return $responseError;
        }
    }
    /**
     * @Route("/admin/addproject", name="project_create")
     * @Method({"POST"})
     */
    public function createProject(Request $request)
    {
        $authAPI = $this->authAPI($request);
        $responseError = new Response();
        $responseError->setStatusCode(500);

        if($authAPI) {

            $data = $request->getContent();

            $project = new Project();
            $category = new Category();
            $technology = new Technology();
            $creator = new Creator();


            $formProject = $this->createFormBuilder($project)
                ->add('title', TextType::class, array('label' => 'Titre'))
                ->add('sous_title', TextType::class, array('label' => 'Sous titre'))
                ->add('content', TextareaType::class, array('label' => 'Petit résumé'))
                ->add('link', TextType::class, array('label' => 'Lien vers le projet'))
                ->add('logo', FileType::class, array('label' => 'Logo du projet', 'required' => 'false'))
                ->add('fullpagepsd1', FileType::class, array('label' => 'Le premier PSD (en .jpeg)', 'required' => 'false'))
                ->add('fullpagepsd2', FileType::class, array('label' => 'Le second PSD (en .jpeg)', 'required' => 'false'))
                ->add('imageDesktop', FileType::class, array('label' => 'Screenshot du site en version desktop'))
                ->add('imageTablet', FileType::class, array('label' => 'Screenshot du site en version tablette'))
                ->add('imageSmartphone', FileType::class, array('label' => 'Screenshot du site en version mobile'))
                ->add('save', SubmitType::class, array('label' => 'Créer le projet'))
                ->getForm();

            $formCreator = $this->createFormBuilder($creator)
                ->add('creator', EntityType::class, array(
                  'class' => 'App\Entity\Creator',
                  'choice_label' => 'name',
                  'expanded' => false,
                  'multiple' => true));
            $formCategory = $this->createFormBuilder($category)
                ->add('category', EntityType::class, array(
                  'class' => 'App\Entity\Category',
                  'choice_label' => 'name',
                  'expanded' => false,
                  'multiple' => true));
            $formTechnology = $this->createFormBuilder($technology)
                ->add('technology', EntityType::class, array(
                  'class' => 'App\Entity\Technology',
                  'choice_label' => 'name',
                  'expanded' => false,
                  'multiple' => true));

            $em = $this->getDoctrine()->getManager();

            $em->persist($project);

            $em->flush();


            return new Response('', Response::HTTP_CREATED);
        } else {
            return $responseError;
        }
    }
    public function authAPI($request){

      $apiKey = $request->headers->get('Authorization');

      if($apiKey != "" && $apiKey != null && $apiKey != "publickey") {
          $em = $this->getDoctrine()->getManager();
        $userKey = $em->getRepository('App\Entity\User')->findOneBy(['apikey' => $apiKey]);
        if(($userKey != "" && $userKey != null) && ($userKey->getApiKey() != "" && $userKey->getApiKey() != null && $userKey->getApiKey() == $apiKey)) {
          return true;
        }
          return false;
        }
        elseif($apiKey == "publickey")
        {
          return "public";
        }
        return false;
    }
}
