<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

use ConradCaine\ShameBoardBundle\Form\ShameType;
use ConradCaine\ShameBoardBundle\Entity\Shame;

/**
 * Class DefaultController
 * @Route("/")
 * @package ConradCaine\ShameBoardBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("", name="all_defaults")
     * @Method("GET")
     */
    public function allAction()
    {	
        //TODO return json response
    }

    /**
     * @Route("/get/{id}", name="get_default")
     * @Method("GET")
     */
    public function getAction($id)
    {
        //TODO return json response
    }
}
