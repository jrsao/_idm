<?php

namespace ContractBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UnitContractType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client')
            ->add('unit')
            ->add('price')
            ->add('dateEntry')
            ->add('dateLeaving')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContractBundle\Entity\Contract'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contractbundle_unit_contract';
    }
}
