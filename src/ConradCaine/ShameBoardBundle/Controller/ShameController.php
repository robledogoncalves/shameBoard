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
 * @Route("/shames")
 * @package ConradCaine\ShameBoardBundle\Controller
 */
class ShameController extends Controller
{
    /**
     * @Route("/", name="all_shames")
     * @Method("GET")
     * @return JsonResponse
     */
    public function allAction()
    {
        $shameService = $this->get('Conrad.ShameService');
        $allShames = $this->shameRepository()->findAll();

        if (count($allShames) < 1) {
            return $shameService->noDataFoundMessage();
        }

        foreach ($allShames as $shame) {

            var_dump($shame->getReporter());
            var_dump($shame->getIndicted());

            var_dump($shame);die;

            $shameDataArray[] = $shameService->getShameDataArray($shame);
        }

        if (!isset($shameDataArray)) {
            return $shameService->noDataFoundMessage();
        }

        return new JsonResponse(array('shames' => $shameDataArray), 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("/get/{shameId}", name="get_shame")
     * @Method("GET")
     * @param $shameId
     * @return JsonResponse
     */
    public function getAction($shameId)
    {
        $shameService = $this->get('Conrad.ShameService');
        $shame = $this->shameRepository()->findOneBy(array('id' => $shameId));

        if (is_null($shame)) {
            return $shameService->noDataFoundMessage();
        }

        $shameDataArray = $shameService->getShameDataArray($shame);

        return new JsonResponse(array('shames' => $shameDataArray), 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("/add", name="create_shame")
     * @Method("POST")
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        $shameService = $this->get('Conrad.ShameService');

        $shame = new Shame();
        $shameService->setShameData($shame, $request);

        $form = $this->createForm(new ShameType(), $shame);
        $form->handleRequest($request);

        //TODO WHY FORM IS NOT VALID
        var_dump($form->isValid());die;

        if ($form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $formData = $form->getData();
                $em->persist($formData);
                $em->flush();

            } catch (\Swift_SwiftException $mailer) {
                var_dump($mailer->getMessage());
                var_dump($mailer->getTrace());
                die;

            } catch (ORMInvalidArgumentException $orm) {
                var_dump($orm->getMessage());
                var_dump($orm->getTrace());
                die;

            } catch (\Exception $ex) {
                var_dump($ex->getMessage());
                var_dump($ex->getTrace());
                die;
            }
        }
    }

    private function shameRepository()
    {
        $em = $this->getDoctrine();
        $shameRepository = $em->getRepository('ConradCaineShameBoardBundle:Shame');

        return $shameRepository;
    }
}


