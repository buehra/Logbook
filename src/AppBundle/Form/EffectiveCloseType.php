<?php
/**
 * Created by PhpStorm.
 * User: CoderCAE
 * Date: 09.03.2017
 * Time: 19:41
 */
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EffectiveCloseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('effective_date_to', DateTimeType::class, array(
                'label' => 'Ende:',
                'widget' => 'single_text',
                'html5' => false,
                'attr'=> array('class'=>'form-control')))
            ->add('driving_hour', NumberType::class, array(
                'label' => 'Fahrstunden:',
                'attr'=> array('class'=>'form-control')))
            ->add('description', TextType::class, array(
                'required' => false,
                'label' => 'Kommentar:',
                'attr'=> array('class'=>'form-control')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\driving_effective'
        ));
    }
}