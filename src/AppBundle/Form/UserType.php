<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 07.03.2017
 * Time: 18:09
 */
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array(
                'label' => 'Benutzernamen:',
                'attr'=> array('class'=>'form-control')))
            ->add('password', TextType::class, array(
                'mapped'=>false,
                'required' => false,
                'label' => 'Passwort:',
                'attr'=> array('class'=>'form-control')))
            ->add('email', EmailType::class, array(
                'required' => false,
                'label' => 'E-Mail:',
                'attr'=> array('class'=>'form-control')))
            ->add('firstname', TextType::class, array(
                'label' => 'Vorname:',
                'attr'=> array('class'=>'form-control')))
            ->add('name', TextType::class, array(
                'label' => 'Nachname:',
                'attr'=> array('class'=>'form-control')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\driver'
        ));
    }
}