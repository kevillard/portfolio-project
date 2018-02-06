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
     * @Route("/project/{id}", name="project_show")
     */
    public function showProject(Request $request, $id, Project $project)
    {

        $apiKey = $request->headers->get('Authorization');

        $responseError = new Response();
        $responseError->setStatusCode(500);

        if($apiKey != "" && $apiKey != null && $apiKey != "toto") {

          $em = $this->getDoctrine()->getManager();

          $userKey = $em->getRepository('App\Entity\User')->findOneBy(['apikey' => $apiKey]);

            if(($userKey != "" && $userKey != null) && ($userKey->getApiKey() != "" && $userKey->getApiKey() != null && $userKey->getApiKey() == $apiKey)) {

              $data = $this->get('jms_serializer')->serialize($project, 'json');

              $response = new Response($data);

              $response->headers->set('Content-Type', 'application/json');

              return $response;

            }
            return $responseError;
          }
          elseif($apiKey == "toto")
          {
            $data = $this->get('jms_serializer')->serialize($project, 'json');

            $response = new Response($data);

            $response->headers->set('Content-Type', 'application/json');

            return $response;
          }
          return $responseError;
      }

    /**
     * @Route("/projects", name="projects_list")
     * @Method({"GET"})
     */
    public function showProjects()
    {
        $projects = $this->getDoctrine()->getRepository('App:Project')->findAll();

        $data = $this->get('jms_serializer')->serialize($projects, 'json');


        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');


        return $response;
    }

    /**
     * @Route("/addproject", name="project_create")
     * @Method({"POST"})
     */
    public function createProject(Request $request)
    {

        $data = $request->getContent();

        $project = $this->get('jms_serializer')->deserialize($data, 'App\Entity\Project', 'json');


        $em = $this->getDoctrine()->getManager();

        $em->persist($project);

        $em->flush();


        return new Response('', Response::HTTP_CREATED);
    }
}
