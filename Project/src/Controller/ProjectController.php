<?php

namespace App\Controller;


use App\Entity\Project;
use App\Entity\Technology;
use App\Entity\Creator;
use App\Entity\Category;
use App\Entity\Image;
use App\Form\ProjectForm;
use App\Form\SimpleForm;
use App\Form\ImageForm;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
     * @Route("/admin/projets", name="projects_manage")
     */
    public function manageProjects(Request $request, SessionInterface $session)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        if($authAPI) {

          $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();

          return $this->render('/security/list/projects.html.twig', array(
            'projets' => $projects,
          ));
        } else {
          return $responseError;
        }
    }
    /**
     * @Route("/admin/editproject/{id}", name="edit_project")
     */
    public function editProject(Request $request, SessionInterface $session, $id)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $project = new Project();
        
        $form = $this->createForm(ProjectForm::class, $project);

        if($authAPI) {
        
            $form->handleRequest($request);
            
                if ($form->isSubmitted() && $form->isValid()) {
            
                    $logo = $project->getLogo();
                    $psd1 = $project->getFullpagepsd1();
                    $psd2 = $project->getFullpagepsd2();
                    $desktopImg = $project->getImageDesktop();
                    $tabletImg = $project->getImageTablet();
                    $smartImg = $project->getImageSmartphone();
            
                    $logoName = $this->uploadFile($logo);
                    $psd1Name = $this->uploadFile($psd1);
                    $psd2Name = $this->uploadFile($psd2);
                    $desktopName = $this->uploadFile($desktopImg);
                    $tabletName = $this->uploadFile($tabletImg);
                    $smartName = $this->uploadFile($smartImg);
            
                    $project->setLogo($logoName);
                    $project->setFullpagepsd1($psd1Name);
                    $project->setFullpagepsd2($psd2Name);
                    $project->setImageDesktop($desktopName);
                    $project->setImageTablet($tabletName);
                    $project->setImageSmartphone($smartName);
            
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($project);
                    $em->flush();
            
                }

          $project = $this->getDoctrine()->getRepository(Project::class)->findById($id);

          return $this->render('/security/edit/project.html.twig', array(
            'projet' => $project,
            'form' => $form
          ));
        } else {
          return $responseError;
        }
    }
    /**
     * @Route("/admin/addproject", name="project_create")
     */
    public function createProject(Request $request, SessionInterface $session)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $project = new Project();

        $form = $this->createForm(ProjectForm::class, $project);

        if($authAPI) {

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

               $logo = $project->getLogo();
               $psd1 = $project->getFullpagepsd1();
               $psd2 = $project->getFullpagepsd2();
               $desktopImg = $project->getImageDesktop();
               $tabletImg = $project->getImageTablet();
               $smartImg = $project->getImageSmartphone();

               $logoName = $this->uploadFile($logo);
               $psd1Name = $this->uploadFile($psd1);
               $psd2Name = $this->uploadFile($psd2);
               $desktopName = $this->uploadFile($desktopImg);
               $tabletName = $this->uploadFile($tabletImg);
               $smartName = $this->uploadFile($smartImg);

               $project->setLogo($logoName);
               $project->setFullpagepsd1($psd1Name);
               $project->setFullpagepsd2($psd2Name);
               $project->setImageDesktop($desktopName);
               $project->setImageTablet($tabletName);
               $project->setImageSmartphone($smartName);

               $em = $this->getDoctrine()->getManager();
               $em->persist($project);
               $em->flush();

                return $this->redirectToRoute('/api/projects', array(
                    'id' => $project->getId()
                ));
            }
        } else {
            return $responseError;
        }
        return $this->render('security/add/addingProject.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/addtech", name="technologie_create")
     */
    public function addTechnologie(Request $request, SessionInterface $session)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $tech = new Technology();

        $form = $this->createForm(SimpleForm::class, $tech);

        if($authAPI) {

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

               $em = $this->getDoctrine()->getManager();
               $em->persist($tech);
               $em->flush();

                return $this->redirectToRoute('admin');
            }
        } else {
            return $responseError;
        }
        return $this->render('security/add/addingSimple.html.twig', array(
            'form' => $form->createView(),
            'slug' => 'technologie'
        ));
    }

    /**
     * @Route("/admin/addcreator", name="creator_create")
     */
    public function addCreator(Request $request, SessionInterface $session)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $crea = new Creator();

        $form = $this->createForm(SimpleForm::class, $crea);

        if($authAPI) {

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

               $em = $this->getDoctrine()->getManager();
               $em->persist($crea);
               $em->flush();

                return $this->redirectToRoute('admin');
            }
        } else {
            return $responseError;
        }
        return $this->render('security/add/addingSimple.html.twig', array(
            'form' => $form->createView(),
            'slug' => 'createur'
        ));
    }

    /**
     * @Route("/admin/addcat", name="category_create")
     */
    public function addCategory(Request $request, SessionInterface $session)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $category = new Category();

        $form = $this->createForm(SimpleForm::class, $category);

        if($authAPI) {

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

               $em = $this->getDoctrine()->getManager();
               $em->persist($category);
               $em->flush();

                return $this->redirectToRoute('admin');
            }
        } else {
            return $responseError;
        }
        return $this->render('security/add/addingSimple.html.twig', array(
            'form' => $form->createView(),
            'slug' => 'categorie'
        ));
    }

    /**
     * @Route("/admin/addimage", name="image_create")
     */
    public function addImage(Request $request, SessionInterface $session)
    {
        $authAPI = $this->authAPI($session->get('apikey'));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $image = new Image();

        $form = $this->createForm(ImageForm::class, $image);

        if($authAPI) {

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

               $img = $image->getFile();
               $imgName = $this->uploadFile($img);
               $image->setFile($imgName);

               $em = $this->getDoctrine()->getManager();
               $em->persist($image);
               $em->flush();

                return $this->redirectToRoute('admin');
            }
        } else {
            return $responseError;
        }
        return $this->render('security/add/addingImage.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function uploadFile($file)
    {
      $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

      $file->move(
          $this->getParameter('images_directory'),
          $fileName
      );

      return $fileName;
    }
    public function authAPI($request){

      $apiKey = $request->headers->get('Authorization') == null ? $request : $request->headers->get('Authorization');

      if($apiKey != "" && $apiKey != null && $apiKey != "public") {
          $em = $this->getDoctrine()->getManager();
        $userKey = $em->getRepository('App\Entity\User')->findOneBy(['apikey' => $apiKey]);
        if(($userKey != "" && $userKey != null) && ($userKey->getApiKey() != "" && $userKey->getApiKey() != null && $userKey->getApiKey() == $apiKey)) {
          return true;
        }
          return false;
        }
        elseif($apiKey == "public")
        {
          return "public";
        }
        return false;
    }
    /**
   * @return string
   */
  private function generateUniqueFileName()
  {
      return md5(uniqid());
  }
}
