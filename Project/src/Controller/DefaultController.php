<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
    * @Route("/", name="homepage")
    * @Method({"GET"})
    * @Route("/#/{route}", name="vue_sub_pages", requirements={"route"="projects|aboutme"})
    */
    public function default()
    {
        return $this->render('home.html.twig');
    }

}
