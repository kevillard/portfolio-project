<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Project
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table()
 * @Serializer\ExclusionPolicy("ALL")
 */

class Project
{
    /**
     * @var integer
     * @JMS\Serializer\Annotation\Type("integer")
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */

    private $title;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */

    private $sous_title;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="text")
     * @Serializer\Expose
     */
    private $content;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     * @Assert\File(mimeTypes={ "image/png" })
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $fullpagepsd1;

    /**
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $fullpagepsd2;

    /**
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $imageDesktop;

    /**
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $imageTablet;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", cascade={"persist"})
     * @ORM\JoinTable(name="category_projects", joinColumns={@JoinColumn(name="project_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     * @Serializer\Expose
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technology", cascade={"persist"})
     * @ORM\JoinTable(name="technology_projects", joinColumns={@JoinColumn(name="project_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="technology_id", referencedColumnName="id")}
     *      )
     * @Serializer\Expose
     */
    private $technologies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Creator", cascade={"persist"})
     * @ORM\JoinTable(name="creator_projects", joinColumns={@JoinColumn(name="project_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="creator_id", referencedColumnName="id")})
     * @Serializer\Expose
     */
    private $creators;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image", cascade={"persist"})
     * @ORM\JoinTable(name="image_projects", joinColumns={@JoinColumn(name="project_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="image_id", referencedColumnName="id")})
     * @Serializer\Expose
     */
    private $images;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $imageSmartphone;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $preview;

    public function __construct()
    {
        $this->date = new \Datetime();
        $this->categories = new ArrayCollection();
        $this->technologies = new ArrayCollection();
        $this->creators = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getSousTitle()
    {
        return $this->sous_title;
    }

    /**
     * @param string $sous_title
     */
    public function setSousTitle(string $sous_title): void
    {
        $this->sous_title = $sous_title;
    }

    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getLogo()
    {
        return $this->logo;
    }


    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function getFullpagepsd1()
    {
        return $this->fullpagepsd1;
    }

    public function setFullpagepsd1($fullpagepsd1)
    {
        $this->fullpagepsd1 = $fullpagepsd1;

        return $this;
    }

    public function getFullpagepsd2()
    {
        return $this->fullpagepsd2;
    }


    public function setFullpagepsd2($fullpagepsd2)
    {
        $this->fullpagepsd2 = $fullpagepsd2;

        return $this;
    }

    public function getImageDesktop()
    {
        return $this->imageDesktop;
    }

    public function setImageDesktop($imageDesktop)
    {
        $this->imageDesktop = $imageDesktop;

        return $this;
    }

    public function getImageTablet()
    {
        return $this->imageTablet;
    }

    public function setImageTablet($imageTablet)
    {
        $this->imageTablet = $imageTablet;

        return $this;
    }

    public function getImageSmartphone()
    {
        return $this->imageSmartphone;
    }

    public function setImageSmartphone($imageSmartphone)
    {
        $this->imageSmartphone = $imageSmartphone;

        return $this;
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

    public function addTechnology(Technology $technology)
    {
        $this->technologies[] = $technology;

        return $this;
    }
    public function removeTechnology(Technology $technology)
    {
        $this->technologies->removeElement($technology);
    }

    public function getTechnologies()
    {
        return $this->technologies;
    }

    public function addCreator(Creator $creator)
    {
        $this->creators[] = $creator;

        return $this;
    }
    public function removeCreator(Creator $creator)
    {
        $this->creators->removeElement($creator);
    }
    public function getCreators()
    {
        return $this->creators;
    }

    /**
     * Get the value of preview
     *
     * @return  string
     */ 
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Set the value of preview
     *
     * @param  string  $preview
     *
     * @return  self
     */ 
    public function setPreview(string $preview)
    {
        $this->preview = $preview;

        return $this;
    }
    public function addImages(Image $image)
    {
        $this->images[] = $image;

        return $this;
    }
    public function removeImages(Image $image)
    {
        $this->images->removeElement($image);
    }

    public function getImages()
    {
        return $this->images;
    }
}
