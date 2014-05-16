<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/16/14
 * Time: 1:17 PM
 */

namespace ConradCaine\ShameBoardBundle\Service;

use Symfony\Bridge\Swiftmailer;

class Mailer
{
    private $transport;

    public function send($messageData)
    {
        $message = \Swift_Message::newInstance();

        $message->setTo( array($messageData['to'] ));

        $message->setSubject($messageData['content']['subject']);
        $message->setBody($messageData['content']['body']);
        $message->setFrom($messageData['from']['email'], $messageData['from']['name']);

        $mailer = \Swift_Mailer::newInstance($this->transport);
        $mailer->send($message);
    }

    public function setup($customTransport = null)
    {
        if ($customTransport === null) {
            $this->defaultSettings();
            return;
        }

        $this->transport = \Swift_SmtpTransport::newInstance(
            $customTransport['host'],
            $customTransport['port'],
            $customTransport['ssl']
        );

        $this->transport->setUsername($customTransport['user']);
        $this->transport->setPassword($customTransport['pass']);
    }

    private function defaultSettings()
    {
        $defaultTransport = array(
            'host'  => 'smtp.gmail.com',
            'port'  => '465',
            'ssl'   => 'ssl',
            'user'  => 'gilvanritter@gmail.com',
            'pass'  => 'ujrxljcoxrgadlnk',
        );

        $this->transport = \Swift_SmtpTransport::newInstance(
            $defaultTransport['host'],
            $defaultTransport['port'],
            $defaultTransport['ssl']
        );

        $this->transport->setUsername($defaultTransport['user']);
        $this->transport->setPassword($defaultTransport['pass']);
    }
}