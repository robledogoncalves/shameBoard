<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/19/14
 * Time: 3:55 PM
 */

namespace ConradCaine\ShameBoardBundle\Controller;

use ConradCaine\ShameBoardBundle\Entity\ShameVote;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ShameVoteController
 * @package ConradCaine\ShameBoardBundle\Controller
 * @Route("/vote")
 */
class ShameVoteController extends Controller
{
    /**
     * @Route("/crate", name="create_vote")
     * @Method("POST")
     * @param Request $request
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $shameVote = new ShameVote();



    }
}