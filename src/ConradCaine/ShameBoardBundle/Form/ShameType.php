<?php

namespace ConradCaine\ShameBoardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');
        $builder->add('extraPoints');

        $builder->add('date', 'datetime');
        $builder->add('status');

        $builder->add('shameRule');
        $builder->add('indicted');
        $builder->add('reporter');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        // $resolver->setDefaults(array(
        // ));
    }

    public function getName()
    {
        return 'shame';
    }
}