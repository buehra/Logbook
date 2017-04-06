<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 09.03.2017
 * Time: 17:59
 */
namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DamageType extends AbstractType
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
            ->add('damage_date', DateType::class, array(
                'label' => 'Datum:',
                'widget' => 'single_text',
                'attr'=> array('class'=>'form-control')))
            ->add('place', TextType::class, array(
                'required' => false,
                'label' => 'Ort:',
                'attr'=> array('class'=>'form-control')))
            ->add('description', TextareaType::class, array(
                'required' => false,
                'label' => 'Beschreibung:',
                'attr'=> array('class'=>'form-control')))
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\damage'
        ));
    }
}