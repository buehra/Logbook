<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 07.03.2017
 * Time: 19:48
 */
namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RefuelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Boat', EntityType::class, array(
                'class' => 'AppBundle:Boat',
                'choice_label' => 'fullname',
                'attr'=> array('class'=>'form-control')))
            ->add('refuel_date', DateType::class, array(
                'required' => false,
                'label' => 'Datum:',
                'widget' => 'single_text',
                'attr'=> array('class'=>'form-control')))
            ->add('refuel_place', TextType::class, array(
                'label' => 'Tankstelle:',
                'attr'=> array('class'=>'form-control')))
            ->add('refuel_liter', NumberType::class, array(
                'label' => 'Liter:',
                'attr'=> array('class'=>'form-control')))
            ->add('refuel_cost', NumberType::class, array(
                'label' => 'Kosten:',
                'attr'=> array('class'=>'form-control')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\refuel'
        ));
    }
}