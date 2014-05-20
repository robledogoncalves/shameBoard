<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use ConradCaine\ShameBoardBundle\Entity\Shame;
use ConradCaine\ShameBoardBundle\Form\ShameType;


/**
 * Class ShameController
 * @Route("/shame")
 * @package ConradCaine\ShameBoardBundle\Controller
 */

class ShameController extends Controller
{
    /**
     * @Route("", name="all_shames")
     * @Method("GET")
     */
    public function allAction()
    {
        $shameRepository= $this->getDoctrine()->getRepository('ConradCaineShameBoardBundle:Shame');
        $allShames = $shameRepository->findAll();

        var_dump($allShames);die;

        $jsonResponse = new JsonResponse($allShames, 200, array('Content-Type' => 'application/json'));

        return $jsonResponse;
    }

    /**
     * @Route("/get/{id}", name="get_shame")
     * @Method("GET")
     * @param $id
     */
    public function getAction($id)
    {

    }

    /**
     * @Route("/add", name="add_shame")
     * @Method("POST")
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $shame = new Shame();

        $form = $this->createForm(new ShameType(), $shame);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {

                $formData = $form->getData();
                $em->persist($formData);

                $this->sendEmail($formData);
                $em->flush();

            } catch (\Swift_SwiftException $se) {
                var_dump($se->getMessage());
                var_dump($se->getTrace());
                die;

            } catch (Exception $e) {
                var_dump($e->getMessage());
                var_dump($e->getTrace());
                die;
            }
        }
    }
}
