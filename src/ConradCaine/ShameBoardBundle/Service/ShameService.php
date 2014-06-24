<?php

namespace ConradCaine\ShameBoardBundle\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ShameService
 * @package ConradCaine\ShameBoardBundle\Service
 */
class ShameService
{
    private $gravatarPrefix = 'http://www.gravatar.com/avatar/';
    private $gravatarSufix = '?s=40&r=g&d=http%3A%2F%2Fimageshack.com%2Fa%2Fimg835%2F4017%2Fndp4.png';


    /**
     * @param $shame
     * @param $request
     */
    public function setShameData($shame, $request)
    {
        $shame->setDescription($request->get('description'));
        $shame->setExtraPoints($request->get('extraPoints'));

        $shame->setShameRule($request->get('shameRule'));
        $shame->setIndicted($request->get('indicted'));
        $shame->setReporter($request->get('reporter'));

        $shameRegistrationStatus = $this->handleShameRegistrationStatus($request);
        $shame->setStatus($shameRegistrationStatus);

        $shameRegistrationDate = $this->handleShameRegistrationDate($request);
        $shame->setDate($shameRegistrationDate);
    }

    /**
     * @param $request
     * @return int
     */
    private function handleShameRegistrationStatus($request)
    {
        if (!$request->get('status')) {
            return 1;
        }
        return 1000;
    }

    /**
     * @param $request
     * @return \DateTime
     */
    private function handleShameRegistrationDate($request)
    {
        if (!$request->get('date')) {
            return new \DateTime('now');
        }
        return $request->get('date');
    }

    /**
     * @return JsonResponse
     */
    public function noDataFoundMessage()
    {
        $messageArray = array(
            'shame' => array(),
            'text'=> 'No shames found'
        );

        $messageData = array('message' => $messageArray);
        return new JsonResponse($messageData, 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @param $shameObject
     * @return array
     */
    public function getShameDataArray($shameObject)
    {
        $shameDataArray = array(
            'id'            => $shameObject->getId(),
            'description'   => $shameObject->getDescription(),
            'extraPoints'   => $shameObject->getExtraPoints(),
            'shameDescription'  => $shameObject->getShameRule()->getDescription(),
            'indicted'          => array(
                'username'      => $shameObject->getIndicted()->getUsername(),
                'email'         => $shameObject->getIndicted()->getEmail(),
                'userId'        => $shameObject->getIndicted()->getId(),
                'gravatar'      => $this->gravatarPrefix.md5($shameObject->getIndicted()->getEmail()).$this->gravatarSufix,
            ),
            'reporter'      => array(
                'username'      => $shameObject->getReporter()->getUsername(),
                'email'         => $shameObject->getReporter()->getEmail(),
                'userId'        => $shameObject->getReporter()->getId(),
                'gravatar'      => $this->gravatarPrefix.md5($shameObject->getReporter()->getEmail()).$this->gravatarSufix,
            ),
            'date'          => array(
                'date'          => $shameObject->getDate()->format(\ DateTime::ISO8601),
                'timezone'      => $shameObject->getDate()->getTimezone(),
            ),
        );

        return $shameDataArray;
    }
} 