<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Project
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table()
 * @Serializer\ExclusionPolicy("ALL")
 */

class Me
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

    private $name;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */

    private $citation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competence", cascade={"persist"})
     * @ORM\JoinTable(name="competence_me", joinColumns={@JoinColumn(name="me_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="competence_id", referencedColumnName="id")}
     *      )
     * @Serializer\Expose
     */
    private $competences;

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
    private $facebook;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $twitter;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $github;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $linkedin;

    /**
     * @var string
     * @JMS\Serializer\Annotation\Type("string")
     * @ORM\Column(type="string", length=100)
     * @Serializer\Expose
     */
    private $discord;

    public function __construct()
    {
        $this->date = new \Datetime();
        $this->competences = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->sous_title;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCitation(): string
    {
        return $this->citation;
    }

    /**
     * @param string $citation
     */
    public function setCitation(string $citation): void
    {
        $this->citation = $citation;
    }

    public function addCompetence(Competence $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }
    public function removeCompetence(Competence $competence)
    {
        $this->competences->removeElement($competence);
    }

    public function getCompetences()
    {
        return $this->competences;
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
    public function getFacebook(): string
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
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
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getGithub(): string
    {
        return $this->github;
    }

    /**
     * @param string $github
     */
    public function setGithub(string $github): void
    {
        $this->github = $github;
    }

    /**
     * @return string
     */
    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    /**
     * @param string $linkedin
     */
    public function setLinkedin(string $linkedin): void
    {
        $this->linkedin = $linkedin;
    }

    /**
     * @return string
     */
    public function getDiscord(): string
    {
        return $this->discord;
    }

    /**
     * @param string $discord
     */
    public function setDiscord(string $discord): void
    {
        $this->discord = $discord;
    }
}
