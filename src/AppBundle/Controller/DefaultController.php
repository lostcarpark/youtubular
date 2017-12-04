<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('youtubular/index.html.twig', array(
            'number' => $number,
        ));       // replace this example code with whatever you need
    }
}

