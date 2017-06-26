<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RedirectController extends Controller
{
    /**
     * @Route("/redirect", name="redirect.index")
     */
    public function indexAction()
    {
        return $this->redirectToRoute('doctrine.index');
    }

    /**
     * @Route("/redirect2", name="redirect.two")
     */
    public function twoAction()
    {
        return $this->redirectToRoute('redirect.index');
    }
}
