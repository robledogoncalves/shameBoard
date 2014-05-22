<?php
/**
 * Created by PhpStorm.
 * User: gritt
 * Date: 5/19/14
 * Time: 4:04 PM
 */

namespace ConradCaine\ShameBoardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShameVoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('shameId', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        // $resolver->setDefaults(array(
        // ));
    }

    public function getName()
    {
        return 'vote';
    }

} 