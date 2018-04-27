<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjectForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Titre'))
            ->add('sous_title', TextType::class, array('label' => 'Sous titre'))
            ->add('creators', EntityType::class, array(
                'class' => 'App\Entity\Creator',
                'choice_label' => 'name',
                'label' => 'Contributeurs',
                'expanded' => false,
                'multiple' => true))
            ->add('categories', EntityType::class, array(
                'class' => 'App\Entity\Category',
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => true))
            ->add('technologies', EntityType::class, array(
                'class' => 'App\Entity\Technology',
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => true))
            ->add('preview', FileType::class, array('label' => 'Image de fond', 'required' => 'true'))
            ->add('images', EntityType::class, array(
                'class' => 'App\Entity\Image',
                'choice_label' => 'file',
                'expanded' => false,
                'multiple' => true))
            ->add('content', TextareaType::class, array('label' => 'Petit résumé'))
            ->add('link', TextType::class, array('label' => 'Lien vers le projet'))
            ->add('logo', FileType::class, array('label' => 'Logo du projet (en .png)', 'required' => 'false'))
            ->add('fullpagepsd1', FileType::class, array('label' => 'Le premier PSD (en .jpeg)', 'required' => 'false'))
            ->add('fullpagepsd2', FileType::class, array('label' => 'Le second PSD (en .jpeg)', 'required' => 'false'))
            ->add('imageDesktop', FileType::class, array('label' => 'Screenshot du site en version desktop'))
            ->add('imageTablet', FileType::class, array('label' => 'Screenshot du site en version tablette'))
            ->add('imageSmartphone', FileType::class, array('label' => 'Screenshot du site en version mobile'))
            ->add('save', SubmitType::class, array('label' => 'Créer le projet'))
            ->getForm();

    }

}
