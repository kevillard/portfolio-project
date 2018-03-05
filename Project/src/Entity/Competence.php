<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Competence
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table()
 * @Serializer\ExclusionPolicy("ALL")
 */
 class Competence
 {
   /**
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   private $id;

   /**
    * @ORM\Column(name="name", type="string", length=255)
    * @Serializer\Expose
    */
   private $name;

   /**
    * @ORM\Column(type="string", length=100)
    * @Assert\File(mimeTypes={ "image/jpeg", "image/png" })
    * @Serializer\Expose
    */
   private $image;

   /**
    * @return mixed
    */
   public function getId()
   {
       return $this->id;
   }

   /**
    * @param mixed $id
    */
   public function setId($id): void
   {
       $this->id = $id;
   }

   /**
    * @return mixed
    */
   public function getName()
   {
       return $this->name;
   }

   /**
    * @param mixed $name
    */
   public function setName($name): void
   {
       $this->name = $name;
   }

   /**
    * @return mixed
    */
   public function getImage()
   {
       return $this->image;
   }

   /**
    * @param mixed $name
    */
   public function setImage($image): void
   {
       $this->image = $image;
   }
 }
