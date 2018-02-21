<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GeneratorApikey;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, UserPasswordEncoderInterface $encoder, AuthenticationUtils $authUtils)
    {

      $error = $authUtils->getLastAuthenticationError();
      $lastUsername = $authUtils->getLastUsername();

      return $this->render('security/login.html.twig', array(
        'last_username' => $lastUsername,
        'error' => $error,
      ));
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
    // /**
    //  * @Route("/register", name="user_registration")
    //  */
    // public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    // {
    //     $user = new User();
    //     $apikey_utils = new GeneratorApikey();
    //
    //         $password = $passwordEncoder->encodePassword($user,"");
    //         $user->setPassword($password);
    //         $user->setEmail("");
    //         $user->setApikey($apikey_utils->generate());
    //         $user->setUsername("");
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($user);
    //         $em->flush();
    //
    //
    //         dump($user);
    //         die();
    // }
}
