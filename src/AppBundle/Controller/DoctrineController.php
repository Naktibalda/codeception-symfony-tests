<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DoctrineController extends Controller
{
    /**
     * @Route("/doctrine", name="doctrine.index")
     */
    public function indexAction()
    {
        return new Response('users in the table');
    }
}
