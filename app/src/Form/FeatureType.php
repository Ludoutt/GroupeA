<?php

namespace App\Form;

use App\Entity\Feature;
use App\Entity\category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FeatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('title')
          ->add('jobValue')
          ->add('description')
          ->add('acceptationValidation')
          ->add('sortBy')
          ->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'title',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
          'data_class' => Feature::class,
        ]);
    }
}
