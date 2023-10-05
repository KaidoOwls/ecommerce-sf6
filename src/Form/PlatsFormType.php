<?php

namespace App\Form;

use App\Entity\Plat;
use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PlatsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', options:[
                'label' => 'Nom'
            ])
            ->add('description')
            ->add('prix')
            ->add('active', options:[
                'label' => 'Stock'
            ])
            ->add('categorie', EntityType::class,[
                'class' => Categories::class,
                'choice_label' => 'libelle',
                'label' => 'Catégorie',
                'group_by' => 'parent.libelle',
                'query_builder' => function(CategoriesRepository $cr)
                {
                    return $cr->createQueryBuilder('c')
                        ->where('c.parent IS NOT NULL')
                        ->orderBy('c.libelle', 'ASC');
                }
            ])

            ->add('image', FileType::class, [
                'label' => false,
                'multiple' => true, 
                'mapped' => false, // Ne mappez pas directement à l'entité
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}
