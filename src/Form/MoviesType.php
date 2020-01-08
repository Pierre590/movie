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


class MoviesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
       ->add('name', TextType::class, [
           'label' => "Nom du film",
           'required' => false,
       ])
       ->add('description', TextareaType::class,[
           'required' => false,
       ])
       ->add('date', DateType::class, [
       'years' => range(1950, date('Y')),
       'label' => "Date de sortie",
       'required' => false,
        ])
       ->add('country', TextType::class,[
           'label' => "Pays",
           'required' => false,
       ])
       ->add('cover', TextType::class, [
           'label' => "Affiche",
           'required' => false,
       ])
       ->add('link', TextType::class, [
           'label' => "Lien Allociné",
           'required' => false,
       ])
       ->add('author', EntityType::class, [
        'class' => Authors::class,
        'choice_label' => 'name',
        'label' => "Réalisateur",
        'required' => false,
        'placeholder' => "Sélectionner un réalisateur",
        ])
        ->add('save', SubmitType::class,[
            'label' => "Valider",
        ]);

    }
}
