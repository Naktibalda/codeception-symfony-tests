<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PostController
{
    /**
     * @Route("/posts-create", name="posts.create")
     */
    public function createAction()
    {
        return new Response('Create Post');
    }

    /**
     * @Route("/posts/{id}", name="posts.show")
     */
    public function showAction(Request $request)
    {
        $id = $request->get('id');
        return new Response('Show Post #' . $id);
    }
}
