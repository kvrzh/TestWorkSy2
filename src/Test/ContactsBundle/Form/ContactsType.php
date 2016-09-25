<?php

namespace Test\ContactsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Имя',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Введите имя'
                )))

            ->add('district',null,array('label'=>'Район',
                'attr' => array(
                    'class' => 'form-control',
                    'empty_value' => 'Выберите район'
                )))
            ->add('street',null,array('label'=>'Улица',
                'attr' => array(
                    'class' => 'form-control',
                    'empty_value' => 'Выберите улицу'

                )))



        ;


    }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'role' => 'form',
                'class' => 'form-horizontal'

            ),
        ));
    }





    public function getName()
    {
        return 'Contacts';
    }
}