<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/19/14
 * Time: 3:55 PM
 */

namespace ConradCaine\ShameBoardBundle\Controller;

use ConradCaine\ShameBoardBundle\Entity\ShameVote;
use ConradCaine\ShameBoardBundle\Form\ShameVoteType;
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
     * @Route("/create", name="create_vote")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $shameVote = new ShameVote();

        // pre sets
        $currentDate = new \DateTime('now');
        $shameVote->setDate($currentDate);
        $shameVote->setUserId($this->getUser()->getId());
        $shameVote->setVote(1);
        // end pre sets

        $form = $this->createForm(new ShameVoteType(), $shameVote);
        $form->handleRequest($request);

//        if ($form->isValid()) {

            $formData = $form->getData();

            var_dump($formData);die;

            die;
            $em->persist($formData);
//            $em->flush();

            return $this->redirect($this->generateUrl('index_shame'));
//        }
    }
}