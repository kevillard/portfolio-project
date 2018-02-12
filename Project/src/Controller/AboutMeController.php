<?php

namespace App\Controller;


use App\Entity\Me;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AboutMeController extends Controller
{
    /**
     * @Route("/api/aboutme", name="about_me")
     * @Method({"POST"})
     */
    public function showMe(Request $request)
    {

        $authAPI = $this->authAPI($request);
        $responseError = new Response();
        $responseError->setStatusCode(500);

        if($authAPI) {

            $about = $this->getDoctrine()->getRepository('App:Me')->findAll();

            $data = $this->get('jms_serializer')->serialize($about, 'json');


            $response = new Response($data);

            $response->headers->set('Content-Type', 'application/json');

            return $response;
        } elseif($authAPI == "public") {

          $about = $this->getDoctrine()->getRepository('App:Me')->findAll();

          $data = $this->get('jms_serializer')->serialize($about, 'json');


          $response = new Response($data);

          $response->headers->set('Content-Type', 'application/json');

          return $response;
        } else {
            return $responseError;
        }
    }
    /**
     * @Route("/admin/addabout", name="about_create")
     * @Method({"POST"})
     */
    public function createMe(Request $request)
    {
        $authAPI = $this->authAPI($request);
        $responseError = new Response();
        $responseError->setStatusCode(500);

        if($authAPI) {
            $data = $request->getContent();

            $project = $this->get('jms_serializer')->deserialize($data, 'App\Entity\Me', 'json');


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
        $userKey = $em->getRepository('App\Entity\User')->findOneBy(['apikey' => $apiKey]);
          $em = $this->getDoctrine()->getManager();
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
