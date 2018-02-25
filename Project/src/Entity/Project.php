<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
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
    private $imageDesktop;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
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
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $imageSmartphone;

    public function __construct()
    {
        $this->date = new \Datetime();
        $this->categories = new ArrayCollection();
        $this->technologies = new ArrayCollection();
        $this->creators = new ArrayCollection();
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
