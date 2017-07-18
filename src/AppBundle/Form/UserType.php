<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array (
                'label' => 'Nom d\'utilisateur : '
            ))
            ->add('password', RepeatedType::class, array(
                'type'           => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe :'),
                'second_options' => array('label' => 'Répéter votre mot de passe :'),
                'invalid_message'=> 'Les mots de passe ne correspondent pas',
            ))
            ->add('firstname', TextType::class, array (
                'label' => 'Nom : '
            ))
            ->add('lastname', TextType::class, array (
                'label' => 'Prénom : '
            ))
            ->add('birthday', DateType::class, array(
                'label'  => 'Date d\'anniversaire : ',
                'widget' => 'single_text',
                'attr'   => ['class' => 'js-datepicker']
            ))
            ->add('typ', EntityType::class, array(
                'class'        => 'AppBundle:Type',
                'label'        => 'Votre classe : ',
                'choice_label' => 'name'
            ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}