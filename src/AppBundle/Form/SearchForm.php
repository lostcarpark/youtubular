<?php
// src/AppBundle/Form/SearchForm.php
namespace AppBundle\Form;

use AppBundle\Entity\SearchPhrase;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchForm extends AbstractType
{
    // Specify the data type for the form.
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => SearchPhrase::class,
        ));
    }

    // Build the form object with builder.
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('searchTerm')
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Videos, channels and playlists' => 'video,channel,playlist',
                    'Videos only' => 'video',
                    'Channels only' => 'channel',
                    'Playlists only' => 'playlist',
                ],
            ])
            ->add('search', SubmitType::class)
        ;
    }
}