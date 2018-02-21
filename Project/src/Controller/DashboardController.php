<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GeneratorApikey;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
