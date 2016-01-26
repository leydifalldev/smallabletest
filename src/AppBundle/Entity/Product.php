<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Image;

/**
* Product
*
* @ORM\Table(name="product")
* @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
*/
class Product
{
  /**
  * @var int
  *
  * @ORM\Column(name="id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
  * @var string
  *
  * @ORM\Column(name="name", type="string", length=255)
  */
  private $name;

  /**
  * @var string
  *
  * @ORM\Column(name="description", type="text")
  */
  private $description;

  /**
  * @var string
  *
  * @ORM\Column(name="price", type="string", length=255)
  */
  private $price;

  /**
  * @ORM\OneToMany(targetEntity="Image", mappedBy="products", cascade={"persist"})
  * @ORM\JoinColumn(nullable=false)
  */
  private $images;

  public function __construct()
  {
    $this->images = new ArrayCollection();
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
  * @return Product
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
  * Set description
  *
  * @param string $description
  * @return Product
  */
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
  * Get description
  *
  * @return string
  */
  public function getDescription()
  {
    return $this->description;
  }

  /**
  * Set price
  *
  * @param string $price
  * @return Product
  */
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  /**
  * Get price
  *
  * @return string
  */
  public function getPrice()
  {
    return $this->price;
  }

  public function addImage(Image $image)
  {
    $this->images[] = $image;

    return $this;
  }

  public function removeImage(Image $image)
  {
    $this->images->removeElement($image);
  }

  public function getImages()
  {
    return $this->images;
  }
}
