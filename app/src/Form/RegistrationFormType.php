<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('email', TextType::class)
          ->add('pseudo', TextType::class)
          ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'required' => true,
            'constraints' => array(
              new NotBlank(),
              new Length(array('min' => 6)),
            ),
            'first_options' => array('label' => 'label.password'),
            'second_options' => array('label' => 'label.passwordConfirmation'),
          ))
        ->add('agreeTerms', CheckboxType::class, [
          'mapped' => false,
          'constraints' => [
            new IsTrue([
              'message' => 'You should agree to our terms.',
            ]),
          ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
          'data_class' => User::class,
        ]);
    }
}
