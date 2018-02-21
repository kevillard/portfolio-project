<?php

namespace App\Controller;


use App\Entity\Project;
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
// Methode a deplacer au AdminController
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

            $project = $this->get('jms_serializer')->deserialize($data, 'App\Entity\Project', 'json');


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
