<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
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
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $logo;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $fullpagepsd1;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $fullpagepsd2;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $createurs;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $imageDesktop;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $imageTablet;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", cascade={"persist"})
     * @Serializer\Expose
     */
    private $categories;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @ORM\ManyToMany(targetEntity="App\Entity\Technology", cascade={"persist"})
     * @Serializer\Expose
     */
    private $technologies;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @ORM\ManyToMany(targetEntity="App\Entity\Creator", cascade={"persist"})
     * @Serializer\Expose
     */
    private $creators;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $imageSmartphone;

    /**
     * @return string
     */
    public function getSousTitle(): string
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

    /**
     * @return string
     */
    public function getLink(): string
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

    /**
     * @return int
     */
    public function getId(): int
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

    /**
     * @return string
     */
    public function getTitle(): string
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

    /**
     * @return string
     */
    public function getContent(): string
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
    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getFullpagepsd1(): string
    {
        return $this->fullpagepsd1;
    }

    /**
     * @param string $fullpagepsd1
     */
    public function setFullpagepsd1(string $fullpagepsd1): void
    {
        $this->fullpagepsd1 = $fullpagepsd1;
    }

    /**
     * @return string
     */
    public function getFullpagepsd2(): string
    {
        return $this->fullpagepsd2;
    }

    /**
     * @param string $fullpagepsd2
     */
    public function setFullpagepsd2(string $fullpagepsd2): void
    {
        $this->fullpagepsd2 = $fullpagepsd2;
    }

    /**
     * @return string
     */
    public function getCreateurs(): string
    {
        return $this->createurs;
    }

    /**
     * @param string $createurs
     */
    public function setCreateurs(string $createurs): void
    {
        $this->createurs = $createurs;
    }

    /**
     * @return string
     */
    public function getImageDesktop(): string
    {
        return $this->imageDesktop;
    }

    /**
     * @param string $imageDesktop
     */
    public function setImageDesktop(string $imageDesktop): void
    {
        $this->imageDesktop = $imageDesktop;
    }

    /**
     * @return string
     */
    public function getImageTablet(): string
    {
        return $this->imageTablet;
    }

    /**
     * @param string $imageTablet
     */
    public function setImageTablet(string $imageTablet): void
    {
        $this->imageTablet = $imageTablet;
    }

    /**
     * @return string
     */
    public function getImageSmartphone(): string
    {
        return $this->imageSmartphone;
    }

    /**
     * @param string $imageSmartphone
     */
    public function setImageSmartphone(string $imageSmartphone): void
    {
        $this->imageSmartphone = $imageSmartphone;
    }


    public function __construct()
    {
        $this->date = new \Datetime();
        $this->categories = new ArrayCollection();
        $this->technologies = new ArrayCollection();
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
}