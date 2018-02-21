<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
  /**
   * @Route("/admin", name="admin")
   */
  public function DashboardHome(Request $request, AuthorizationCheckerInterface $authChecker)
  {
    if(false === $authChecker->isGranted('ROLE_ADMIN')){
      return $this->redirectToRoute('/');
    }
      return $this->render('security/dashboard.html.twig');


  }
}
