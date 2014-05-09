<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ConradCaine\ShameBoardBundle\Entity\Shame;

class ShameController extends Controller
{
    /**
     * @Route("/", name="new_shame", defaults={"type" = null})
     * @Template()
     */
    public function indexAction()
    {	
    	die("vai inserir");
    }
}
