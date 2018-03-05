<?php

namespace App\Controller;


use App\Entity\Me;
use App\Entity\Competence;
use App\Form\SimpleForm;
use App\Form\CompetenceForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

        $authAPI = $this->forward('App\Controller\ProjectController::authApi', array(
            'request' => $request
        ));
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
     * @Route("/admin/addcompetence", name="competence_create")
     */
    public function addCompetence(Request $request, SessionInterface $session)
    {
        $authAPI = $this->forward('App\Controller\ProjectController::authApi', array(
            'request' => $session->get('apikey')
        ));
        $responseError = new Response();
        $responseError->setStatusCode(500);

        $comp = new Competence();

        $form = $this->createForm(CompetenceForm::class, $comp);

        if($authAPI) {

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

             $image = $comp->getImage();

             $imageName = $this->forward('App\Controller\ProjectController::uploadFile', array(
               'file' => $image
             ));

             $comp->setImage($imageName);

             $em = $this->getDoctrine()->getManager();
             $em->persist($comp);
             $em->flush();

            return $this->redirectToRoute('admin');
          }
        } else {
            return $responseError;
        }

        return $this->render('security/add/addingCompetence.html.twig', array(
            'form' => $form->createView(),
            'slug' => 'compétence'
        ));
    }
}
