<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/20/14
 * Time: 2:30 PM
 */

namespace ConradCaine\ShameBoardBundle\Service;


class MailHandler
{
//    private function sendEmail($formData)
//    {
//        $messageData = $this->getEmailDetails($formData);
//
//        try {
//            $message = \Swift_Message::newInstance()
//                ->setSubject($messageData['content']['subject'])
//                ->setFrom($messageData['from']['email'], $messageData['from']['name'])
//                ->setTo($messageData['to'])
//                ->setBody($messageData['content']['body']);
//
//            $this->get('mailer')->send($message);
//
//        } catch (\Exception $e) {
//            return $e;
//        }
//    }
//
//    private function getEmailDetails($formData)
//    {
//        $loggedInUserEmail = $this->getUser()->getEmail();
//        $loggedInUsername = $this->getUser()->getUsername();
//
//        $shameUsername = $formData->getUser()->getUsername();
//
//        $usersToSend = $this->getUsersToSend();
//        $emailContent = $this->getEmailContent($loggedInUsername, $shameUsername);
//
//        $messageData = array(
//
//            'from' => array(
//                'email' => $loggedInUserEmail,
//                'name'  => $loggedInUsername
//            ),
//
//            'to'        => $usersToSend,
//            'content'   => $emailContent,
//        );
//
//        return $messageData;
//    }
//
//    private function getUsersToSend()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $users = $em->getRepository('ConradCaineShameBoardBundle:User')->findAll();
//
//        if (!is_array($users) and count($users) < 1) {
//            //TODO Return exception
//        }
//
//        foreach ($users as $user) {
//            $emailList[$user->getEmail()] = $user->getUsername();
//        }
//
//        return $emailList;
//    }
//
//    private function getEmailContent($loggedInUsername, $shameUsername)
//    {
//        $subject    = "Yah! Got you $shameUsername";
//
//        $emailText  = "Hi, $loggedInUsername has reported that $shameUsername
//                       should be shamed of something. Do you agree?
//                       Go to the app and check out! ";
//
//        $emailContent = array(
//            'subject'   => $subject,
//            'body'      => $emailText,
//        );
//
//        return $emailContent;
//    }

} 