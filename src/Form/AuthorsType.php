<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Authors;


class AuthorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'label' => "Nom, prénom",
            'required' => false,
        ])

       ->add('nationality', TextareaType::class,[
           'label' => "Nationalité",
           'required' => false,
       ])
       ->add('birthday', DateType::class, [
       'years' => range(1950, date('Y')),
       'label' => "Date de naissance",
       'required' => false,
        ])
       ->add('biography', TextType::class,[
           'label' => "biographie",
           'required' => false,
       ])
       ->add('photo', TextType::class, [
           'label' => "photo",
           'required' => false,
       ])
       ->add('link', TextType::class, [
           'label' => "Lien Allociné",
           'required' => false,
       ])

        ->add('save', SubmitType::class,[
            'label' => "Valider",
        ]);

    }
}
