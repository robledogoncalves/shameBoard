<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/14/14
 * Time: 1:53 PM
 */

namespace ConradCaine\ShameBoardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShameRuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('description');
        $builder->add('value');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        // $resolver->setDefaults(array(

        // ));
    }

    public function getName()
    {
        return 'shameRule';
    }

} 