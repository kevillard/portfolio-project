<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompetenceForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('name', TextType::class, array('label' => 'Nom de la compétence'))
            ->add('image', FileType::class, array('label' => 'Image de la compétence'))
            ->add('save', SubmitType::class, array('label' => 'Ajouter'))
            ->getForm();
  }
}
