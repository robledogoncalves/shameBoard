<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/14/14
 * Time: 1:53 PM
 */

namespace ConradCaine\ShameBoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use ConradCaine\ShameBoardBundle\Form\ShameRuleType;
use ConradCaine\ShameBoardBundle\Entity\ShameRule;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\FormView;

/**
 * Class ShameRuleController
 * @Route("/rule")
 * @package ConradCaine\ShameBoardBundle\Controller
 */
class ShameRuleController extends Controller
{

    /**
     * @Route("", name="index_rule", defaults={"type" = null})
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $shameRepository = $this->getDoctrine()->getRepository('ConradCaineShameBoardBundle:ShameRule');
        $allShameRules = $shameRepository->findAll();

        $shameRuleForm = $this->newAction();

        return array(
            'shameRuleForm' => $shameRuleForm->createView(),
            'shameRules' => $allShameRules,
        );
    }

    /**
     * @Route("/new", name="new_rule")
     */
    private function newAction()
    {
        $shameRule = new ShameRule();

        $shameRuleForm = $this->createForm(new ShameRuleType(), $shameRule);
        return $shameRuleForm;
    }

    /**
     * @Route("/create", name="create_rule")
     * @Method("POST")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ShameRuleType(), new ShameRule());
        $form->handleRequest($request);

        if ($form->isValid()) {

            $formData = $form->getData();

            $em->persist($formData);
            $em->flush();

            return $this->redirect($this->generateUrl('index_rule'));
        }
    }
} 