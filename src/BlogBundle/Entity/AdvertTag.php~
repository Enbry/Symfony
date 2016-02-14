<?php
// src/OC/PlatformBundle/Entity/AdvertSkill.php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\AdvertTagRepository")
 */
class AdvertTag
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Tag")
   * @ORM\JoinColumn(nullable=false)
   */
  private $advert;

  /**
   * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Tag")
   * @ORM\JoinColumn(nullable=false)
   */
  private $tag;

  /**
   * @ORM\Column(name="level", type="string", length=255)
   */
  private $level;

  /**
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param Advert $advert
   * @return AdvertTag
   */
  public function setAdvert(Advert $advert)
  {
    $this->advert = $advert;
    return $this;
  }

  /**
   * @return Advert
   */
  public function getAdvert()
  {
    return $this->advert;
  }

  /**
   * @param Tag $tag
   * @return AdvertTag
   */
  public function setTag(Tag $tag)
  {
    $this->tag = $tag;
    return $this;
  }

  /**
   * @return Tag
   */
  public function getTag()
  {
    return $this->tag;
  }

  /**
   * @param string $level
   * @return AdvertTag
   */
  public function setLevel($level)
  {
    $this->level = $level;
    return $this;
  }

  /**
   * @return string
   */
  public function getLevel()
  {
    return $this->level;
  }
}
