<?php

namespace CoordinateBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CoordinateBundle\Form\CountryType;
use CoordinateBundle\Form\StateType;
use CoordinateBundle\Form\CityType;

class AddressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('streetNumber')
            ->add('street')
            ->add('zipCode')
            ->add('city', new CityType())
            ->add('state', new StateType())
            ->add('country', new CountryType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoordinateBundle\Entity\Address'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'coordinatebundle_address';
    }
}
