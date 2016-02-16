<?php

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BlogBundle\Entity\Image;

class TagType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', 'text')
    ;
  }
<<<<<<< HEAD:src/BlogBundle/Form/ImageType.php
=======

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'BlogBundle\Entity\Tag'
    ));
  }

  public function getName()
  {
    return 'blogbundle_tag';
  }
>>>>>>> Symfony2:src/BlogBundle/Form/TagType.php
}
