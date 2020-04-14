<?php

namespace App\Form;

use App\Entity\Plant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlantIconType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('alternative_name')
            ->add('latin_name')
            ->add('genus')
            ->add('care_level')
            ->add('watering_amount')
            ->add('icon', FileType::class, [
                'label' => 'Image (png,jpg)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the image file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new Assert\Image([
                        'minWidth' => 200,
                        'maxWidth' => 400,
                        'minHeight' => 200,
                        'maxHeight' => 400,
                        'mimeTypesMessage' => 'Please upload a valid image document',
                    ])
                ],
            ])
            ->add('location_icon')
            ->add('temperature_icon')
            ->add('fertiliser_icon')
            ->add('substrate_icon')
            ->add('heyday_icon')
            ->add('height_icon')
            ->add('special_feature_icon')
            ->add('short_description')
            ->add('special_features_addinfo')
            ->add('location_addinfo')
            ->add('temperature_addinfo')
            ->add('pot')
            ->add('watering_amount_addinfo')
            ->add('substrate_addinfo')
            ->add('fertiliser_addinfo')
            ->add('flower_color')
            ->add('heyday_addinfo')
            ->add('care_tips')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plant::class,
        ]);
    }
}
