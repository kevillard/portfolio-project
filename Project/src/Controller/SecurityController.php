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
    public function login(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $data = $request->getContent();

        $user_info = $this->get('jms_serializer')->deserialize($data, 'App\Entity\User', 'json');

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('App\Entity\User')->findOneBy(['username' => $user_info->getUsername()]);

        $match = $encoder->isPasswordValid($user, $user_info->getPassword());
        if($match)
        {
          dump($user->getApiKey());
          die();
        }
    }
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $apikey_utils = new GeneratorApikey();

            $password = $passwordEncoder->encodePassword($user,"");
            $user->setPassword($password);
            $user->setEmail("");
            $user->setApikey($apikey_utils->generate());
            $user->setUsername("");
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            dump($user);
            die();
    }
}
