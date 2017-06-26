<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ExampleDomainController
{
    /**
     * @Route("/", name="example.domain.index", host="example.com")
     */
    public function indexAction()
    {
        return new Response('example index page');
    }

    /**
     * @Route("/", name="example.subdomain.index", host="{subdomain}.example.com")
     */
    public function subdomainAction(Request $request)
    {
        return new Response('subdomain: ' . $request->get('subdomain'));
    }
}
