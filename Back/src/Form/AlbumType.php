<?php

namespace App\Form;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Style;
use App\Entity\Support;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Vich\UploaderBundle\Form\Type\VichFileType;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Nom de l'album :",
                "attr" => ["placeholder" => "Nevermind, fantom..."]
            ])

            ->add('edition', TextType::class, [
                "label" => "Edition :",
                "attr" => ["placeholder" => "Warner, Polydor, Sony..."]
            ])

            ->add('releaseDate', DateType::class, [
                "label" => "Date de création :",
                "widget" => "single_text",
                "input" => "datetime"
                
            ])

            ->add('imageFile', VichFileType::class, [
            'required' => false,
            'mapped' => true,
            ])
    


            ->add('style', EntityType::class, [
                'constraints' => array(
                    new Count(array(
                        'min' => 1,
                        'minMessage' => "Ces champs ne peuvent pas être vide"
                    ))
                 ),
                "label" => "Style :",
                "multiple" => true,
                "expanded" => true, 
                "class" => Style::class,
                'choice_label' => 'name',
                "query_builder" => function(EntityRepository $entityrepository){
                    return $entityrepository->createQueryBuilder('style')
                        ->orderBy('style.name', 'ASC');
                    }
            ])

            ->add('support', EntityType::class, [
                'constraints' => array(
                    new Count(array(
                        'min' => 1,
                        'minMessage' => "Ces champs ne peuvent pas être vide"
                    ))
                 ),
                "label" => "Support :",
                "multiple" => true,
                "expanded" => true, 
                "class" => Support::class,
                'choice_label' => 'name',
                "query_builder" => function(EntityRepository $entityrepository){
                    return $entityrepository->createQueryBuilder('support')
                        ->orderBy('support.name', 'ASC');
                    }
            ])

            ->add('artist', EntityType::class, [
                "label" => "Artiste :",
                "multiple" => false,
                "expanded" => false, 
                "class" => Artist::class,
                'choice_label' => 'fullname',
                "query_builder" => function(EntityRepository $entityrepository){
                    return $entityrepository->createQueryBuilder('artist')
                        ->orderBy('artist.fullname', 'ASC');
                    }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
