<?php

namespace App\Form;

use App\Entity\ParaPharmacie;
use App\Entity\Zone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParaPharmacieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPara')
            ->add('email')
            ->add('nbrPharmaciens')
            ->add('numtel')
            ->add('etatPara')
            ->add('ville', EntityType::class, [
                'class' => Zone::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParaPharmacie::class,
        ]);
    }
}
