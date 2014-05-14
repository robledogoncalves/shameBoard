<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ConradCaine\ShameBoardBundle\Form\ShameType;
use ConradCaine\ShameBoardBundle\Entity\Shame;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\FormView;

/**
 * Class DefaultController
 * @Route("/")
 * @package ConradCaine\ShameBoardBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("", name="index_default")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {	
    	$shame = new Shame();
    	$shameForm = $this->createForm(new ShameType(), $shame);

        return array(
            'shameForm' =>$shameForm->createView()
        );
    }
}
