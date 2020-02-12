<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\CategoryFeature;
use App\Entity\Feature;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryFeatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'title'
          ])
          ->add('feature', EntityType::class, [
            'class' => Feature::class,
            'choice_label' => 'title'
          ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
          'data_class' => CategoryFeature::class,
        ]);
    }
}
