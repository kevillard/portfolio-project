<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ApiKeyForm;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Controller\ProjectController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
  /**
   * @Route("/admin", name="admin")
   */
  public function DashboardHome(Request $request, AuthorizationCheckerInterface $authChecker, SessionInterface $session)
  {
    if(false === $authChecker->isGranted('ROLE_ADMIN')){
      return $this->redirectToRoute('/');
    }
    $form = $this->createForm(ApiKeyForm::class);

    $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

          $apikey = $form->get('apikey')->getData();

          $response = $this->forward('App\Controller\ProjectController::authApi', array(
              'request' => $apikey
          ));

          if($response)
          {
              $session->set('apikey', $apikey);
          }

      }
      return $this->render('security/dashboard.html.twig', array(
          'form' => $form->createView()
      ));


  }
}
