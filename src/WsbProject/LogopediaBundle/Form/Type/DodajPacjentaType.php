<?php

namespace WsbProject\LogopediaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DodajPacjentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('imie','text')
            ->add('nazwisko','text')
            ->add('adres','text')
            ->add('miejscowosc','text')
            ->add('telefon','text')
            ->add('Dodaj','submit')
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsbProject\LogopediaBundle\Entity\Pacjent'
        ));
    }

    public function getName()
    {
        return 'dp';
    }
}
