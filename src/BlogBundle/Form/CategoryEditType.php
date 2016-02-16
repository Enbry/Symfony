<?php


namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryEditType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->remove('date');
  }

  public function getName()
  {
    return 'blogbundle_category_edit';
  }

  public function getParent()
  {
    return new CategoryType();
  }
}
