<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Category
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;

  /**
   * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Advert", inversedBy="categories")
   */
  private $advert;

  /**
   * @ORM\Column(name="published", type="boolean")
   */
  private $published = true;


  public function __construct()
  {

    $this->adverts = new ArrayCollection();
  }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get Advert
     *
     * @return string
     */

    public function getAdverts()
    {
      return $this->advert;
    }

    /**
     * @param boolean $published
     * @return Category
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
}
