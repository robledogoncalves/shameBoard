<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use ConradCaine\ShameBoardBundle\Entity\Shame;
use ConradCaine\ShameBoardBundle\Form\ShameType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Class ShameController
 * @Route("/shame")
 * @package ConradCaine\ShameBoardBundle\Controller
 */

class ShameController extends Controller
{
    /**
     * @Route("", name="index_shame", defaults={"type" = null})
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $shameRepository = $this->getDoctrine()->getRepository('ConradCaineShameBoardBundle:Shame');

        $allShames = $shameRepository->findAll();

        var_dump($allShames);die;
    }


    public function newAction()
    {
        $shame = new Shame();
        $shameForm = $this->createForm(new ShameType(), $shame);

        $this->renderView('ConradCaineShameBoardBundle:Default:index.html.twig', array('shameForm' => $shameForm));
    }

    /**
     * @Route("/create", name="create_shame", defaults={"type" = null})
     * @Method("POST")
     * @Template()
     */
    public function createAction()
    {
        $formContent = $this->get('request');

        var_dump($formContent);die;
    }
}
