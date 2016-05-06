<?php

namespace Ath\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditProfileAssocType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'nom', 'attr' => array('placeholder' => 'nom')))

            ->add('dateDeCreation','date',array(
                'label' => 'registration.dateDeCreation',
                'empty_value' => array('year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'),
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy',
                'years' => range(Date('Y'), 1920),
                'required' => false,
            ))
            ->add('rue', 'text', array('label' => 'label.rue', 'attr' => array('placeholder' => 'placeholder.rue')))
            ->add('ville', 'text', array('label' => 'label.ville', 'attr' => array('placeholder' => 'placeholder.ville')))
            ->add('cp', 'text', array('label' => 'label.cp', 'attr' => array('placeholder' => 'placeholder.cp')))

            ->add('description', 'textarea', array('label' => 'label.description','required' => false, 'attr' => array('placeholder' => 'placeholder.description')))
            
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Ath\UserBundle\Entity\User',
            'translation_domain' => 'fosuser',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ath_edit_profile_assoc';
    }
}