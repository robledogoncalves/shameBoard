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
     * @return JsonResponse
     */
    public function allAction()
    {
        $shameRepository= $this->getDoctrine()->getRepository('ConradCaineShameBoardBundle:Shame');
        $allShames = $shameRepository->findAll();

        foreach ($allShames as $shame) {
            $shamesArray[] = array(
                'id'            => $shame->getId(),
                'description'   => $shame->getDescription(),
                'extraPoints'   => $shame->getExtraPoints(),
                'shameDesc' => $shame->getShameRule()->getDescription(),
                'user'          => array(
                    'username'      => $shame->getUser()->getUsername(),
                    'email'         => $shame->getUser()->getEmail(),
                    'userId'        => $shame->getUser()->getId(),
                    'gravatarPhoto' => "http://www.gravatar.com/avatar/".md5($shame->getUser()->getEmail())."?s=40&r=g&d=http%3A%2F%2Fimageshack.com%2Fa%2Fimg835%2F4017%2Fndp4.png"
                ),
                'date'          => array(
                    'date'          => $shame->getDate()->format(\ DateTime::ISO8601),
                    'timezone'      => $shame->getDate()->getTimezone(),
                ),
            );
        }

        $shamesData = array('shames' => $shamesArray);

        return new JsonResponse($shamesArray, 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("/get/{id}", name="get_shame")
     * @Method("GET")
     * @param $id
     * @return JsonResponse
     */
    public function getAction($id)
    {
        $shameRepository = $this->getDoctrine()->getRepository('ConradCaineShameBoardBundle:Shame');
        $shame = $shameRepository->findOneBy(array('id' => $id));

        $shameArray = array(
            'id'            => $shame->getId(),
            'description'   => $shame->getDescription(),
            'extraPoints'   => $shame->getExtraPoints(),
            'user'        => array(
                'username'      => $shame->getUser()->getUsername(),
                'email'         => $shame->getUser()->getEmail(),
                'userId'        => $shame->getUser()->getId(),
            ),
            'date'          => $shame->getDate(),
        );

        $shameData = array('user' => $shameArray);

        return new JsonResponse($shameData, 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("/add", name="create_shame")
     * @Method("POST")
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        var_dump($request->get('description'));

        $em = $this->getDoctrine()->getManager();
        $shame = new Shame();

        $form = $this->createForm(new ShameType(), $shame);
        $form->handleRequest($request);

        var_dump($form->getData());die;

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
