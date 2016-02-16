<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\AdvertRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Advert
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="date", type="datetime")
   */
  private $date;

  /**
   * @ORM\Column(name="title", type="string", length=255, unique=true)
   */
  private $title;

  /**
   * @ORM\Column(name="author", type="string", length=255)
   */
  private $author;

  /**
   * @ORM\Column(name="content", type="text")
   */
  private $content;

  /**
   * @ORM\Column(name="published", type="boolean")
   */
  private $published = true;


  /**
   * @ORM\ManyToMany(targetEntity="BlogBundle\Entity\Category", cascade={"persist"})
   */
  private $categories;

  /**
   * @ORM\ManyToMany(targetEntity="BlogBundle\Entity\Tag", cascade={"persist"})
   */
  private $tags;


  /**
   * @ORM\Column(name="updated_at", type="datetime", nullable=true)
   */
  private $updatedAt;


  public function __construct()
  {
    $this->date         = new \Datetime();
    $this->categories   = new ArrayCollection();
    $this->tags = new ArrayCollection();
  }

  /**
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param \DateTime $date
   * @return Advert
   */
  public function setDate($date)
  {
    $this->date = $date;
    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * @param string $title
   * @return Advert
   */
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * @param string $author
   * @return Advert
   */
  public function setAuthor($author)
  {
    $this->author = $author;
    return $this;
  }

  /**
   * @return string
   */
  public function getAuthor()
  {
    return $this->author;
  }

  /**
   * @param string $content
   * @return Advert
   */
  public function setContent($content)
  {
    $this->content = $content;
    return $this;
  }

  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * @param boolean $published
   * @return Advert
   */
  public function setPublished($published)
  {
    $this->published = $published;
    return $this;
  }

  /**
   * @return boolean
   */
  public function getPublished()
  {
    return $this->published;
  }

  public function addCategory(Category $category)
  {
    $this->categories[] = $category;
    return $this;
  }

  public function removeCategory(Category $category)
  {
    $this->categories->removeElement($category);
  }

  public function getCategories()
  {
    return $this->categories;
  }

  public function addTag(Tag $tag)
  {
    $this->tags[] = $tag;
    return $this;
  }

  public function removeTag(Tag $tag)
  {
    $this->tags->removeElement($tag);
  }

  public function getTags()
  {
    return $this->tags;
  }


  /**
   * @ORM\PreUpdate
   */
  public function updateDate()
  {
    $this->setUpdatedAt(new \Datetime());
  }

  public function setUpdatedAt(\Datetime $updatedAt)
  {
    $this->updatedAt = $updatedAt;
    return $this;
  }

  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }



}
