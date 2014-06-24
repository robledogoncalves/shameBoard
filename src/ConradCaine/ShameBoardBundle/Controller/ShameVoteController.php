<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use ConradCaine\ShameBoardBundle\Entity\ShameVote;
use ConradCaine\ShameBoardBundle\Form\ShameVoteType;

/**
 * Class ShameVoteController
 * @package ConradCaine\ShameBoardBundle\Controller
 * @Route("/votes")
 */
class ShameVoteController extends Controller
{
    /**
     * @Route("/add", name="add_vote")
     * @Method("POST")
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new ShameVoteType(), new ShameVote());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $formData = $form->getData();
            $em->persist($formData);
            $em->flush();
        }

        //TODO return json response
    }
}