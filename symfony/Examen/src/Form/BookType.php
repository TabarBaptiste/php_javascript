<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('auteur')
            ->add('datePublication', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
                ))
            ->add('summary')
            ->add('reference')
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Roman' => 'Roman',
                    'Policier' => 'Policier',
                    'Documentaire' => 'Documentaire',
                    'Historique' => 'Historique', 
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
