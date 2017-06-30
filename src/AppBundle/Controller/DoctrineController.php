<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineController extends Controller
{
    /**
     * @Route("/doctrine", name="doctrine.index")
     */
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        $query = $em->createQuery('SELECT COUNT(u) FROM AppBundle\Entity\User u');
        $count = $query->getSingleScalarResult();
        return $this->render('doctrine/index.html.twig', [
            'count' => $count,
        ]);
    }

    /**
     * @Route("/doctrine/create-user", name="doctrine.create-user")
     */
    public function createUserAction(Request $request)
    {
        $em = $this->get('doctrine')->getManager();
        $user = new \AppBundle\Entity\User();
        $user->name = $request->request->get('name');
        $em->persist($user);
        $em->flush();
        return new Response('User created');
    }
}
