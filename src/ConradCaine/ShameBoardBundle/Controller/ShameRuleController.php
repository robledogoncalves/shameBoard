<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use ConradCaine\ShameBoardBundle\Form\ShameRuleType;
use ConradCaine\ShameBoardBundle\Entity\ShameRule;

/**
 * Class ShameRuleController
 * @Route("/rules")
 * @package ConradCaine\ShameBoardBundle\Controller
 */
class ShameRuleController extends Controller
{
    /**
     * @Route("/", name="all_rules")
     * @Method("GET")
     */
    public function allAction()
    {
        $shameRepository = $this->getDoctrine()->getRepository('ConradCaineShameBoardBundle:ShameRule');
        $allShameRules = $shameRepository->findAll();

        //TODO return json response
    }

    /**
     * @Route("/add", name="add_rule")
     * @Method("POST")
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new ShameRuleType(), new ShameRule());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $formData = $form->getData();
            $em->persist($formData);
            $em->flush();
        }

        //TODO return json response
    }
} 