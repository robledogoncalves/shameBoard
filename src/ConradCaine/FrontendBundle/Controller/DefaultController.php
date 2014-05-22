<?php

namespace ConradCaine\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index_default")
     * @Template()
     */
    public function indexAction()
    {
        return array('name');
    }

    /**
     * @Route("/", name="index_rule")
     * @Template()
     */
    public function indexRule()
    {
        return array('name');
    }
}
