<?php

namespace App\Form;

use App\Entity\Voiture;
use Doctrine\DBAL\Types\ObjectType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modele')
            ->add('nbVoitures')
            ->add('caracteristiques')
            ->add('photo')
            ->add('price')
            ->add('etatLocation', ChoiceType::class, array('choices'=> array('available'=>'available', 'unavailable'=>'unavailable')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
