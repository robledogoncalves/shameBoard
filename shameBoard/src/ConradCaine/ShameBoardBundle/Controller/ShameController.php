<?php

namespace ConradCaine\ShameBoardBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

use ConradCaine\ShameBoardBundle\Entity\Shame;
use ConradCaine\ShameBoardBundle\Form\ShameType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy;
use Symfony\Component\Validator\Constraints\DateTime;


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

//        var_dump($allShames);
    }


    public function newAction()
    {
        $shame = new Shame();
        $shameForm = $this->createForm(new ShameType(), $shame);

        $this->renderView('ConradCaineShameBoardBundle:Default:index.html.twig', array('shameForm' => $shameForm));
    }

    /**
     * @Route("/create", name="create_shame")
     * @Method("POST")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $shame = new Shame();

        // pre sets
        $currentDate = new \DateTime('now');
        $shame->setDate($currentDate);

            //TODO:If the logged in user add for himself set status to 1

        $shame->setStatus(0);
        // end pre sets

        $form = $this->createForm(new ShameType(), $shame);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {

                $formData = $form->getData();
                $em->persist($formData);

                $this->sendEmail($formData);
                $em->flush();

                return $this->redirect($this->generateUrl('index_default'));

            } catch (Exception $e) {
                var_dump($e->getMessage());
                var_dump($e->getTrace());
                die;
            }
        }
    }

    private function sendEmail($formData)
    {
        $mailData = $this->getEmailDetails($formData);

        $mailerService = $this->get('conrad.mailerService');

        $mailerService->setup();
        //TODO - FIX SWIFT MAILER
        $mailerService->send($mailData);
    }

    private function getEmailDetails($formData)
    {
        $loggedInUserEmail = $this->getUser()->getEmail();
        $loggedInUsername = $this->getUser()->getUsername();

        $shameUsername = $formData->getUser()->getUsername();

        $usersToSend = $this->getUsersToSend();
        $emailContent = $this->getEmailContent($loggedInUsername, $shameUsername);

        $messageData = array(

            'from' => array(
                'email' => $loggedInUserEmail,
                'name'  => $loggedInUsername
            ),

            'to'        => $usersToSend,
            'content'   => $emailContent,
        );

        return $messageData;
    }

    private function getUsersToSend()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('ConradCaineShameBoardBundle:User')->findAll();

        if (!is_array($users) and count($users) < 1) {
            //TODO Return exception
        }

        foreach ($users as $user) {
            $emailList[$user->getEmail()] = $user->getUsername();
        }

        return $emailList;
    }

    private function getEmailContent($loggedInUsername, $shameUsername)
    {
        $subject    = "Yah! Got you $shameUsername";

        $emailText  = "Hi, $loggedInUsername has reported that $shameUsername
                       should be shamed of something. Do you agree?
                       Go to the app and check out! ";

        $emailContent = array(
            'subject'   => $subject,
            'body'      => $emailText,
        );

        return $emailContent;
    }
}
