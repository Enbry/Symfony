<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class AdvertRepository extends EntityRepository
{
  public function getAdverts($page, $nbPerPage)
  {
    $query = $this->createQueryBuilder('a')

      ->leftJoin('a.categories', 'c')
      ->addSelect('c')
      ->orderBy('a.date', 'DESC')
      ->getQuery()
    ;

    $query

      ->setFirstResult(($page-1) * $nbPerPage)
      ->setMaxResults($nbPerPage)
    ;


    return new Paginator($query, true);
  }

  public function getAdCategories($category)
  {
    $query = $this->createQueryBuilder('a')

      ->leftJoin('a.categories', 'c')
      ->setParameter('category', $category)
      ->where('c', category)

      ->addSelect('c')
      ->orderBy('a.date', 'DESC')
      ->getQuery()
    ;

    $query
      ->setFirstResult(($page-1) * $nbPerPage)
      ->setMaxResults($nbPerPage)
    ;

    return $query;
  }

  public function getPublishedQueryBuilder()
  {
    return $this
      ->createQueryBuilder('a')
      ->where('a.published = :published')
      ->setParameter('published', true)
    ;
  }
}
