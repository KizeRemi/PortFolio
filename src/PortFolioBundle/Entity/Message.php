<?php
namespace PortFolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PortFolioBundle\Validator\Constraints as PortFolioAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="PortFolioBundle\Repository\MessageRepository")
 * @ORM\Table(name="message")
 */

class Message {

	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     * @Assert\NotBlank(
     *    message = "Tu veux me contacter mais tu n'as rien à dire? :(" 
     * )
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le contenu doit comporter {{ limit }} caractères au minimum",
     *      maxMessage = "Le contenu doit comporter {{ limit }} caractères au maximum"
     * )
     */
    private $content;

    /**
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     * @Assert\NotBlank(
     *    message = "De quoi veux-tu me parler? :)"
     * )
     * @Assert\Length(
     *      min = 5,
     *      max = 30,
     *      minMessage = "Ton titre doit comporter {{ limit }} caractères au minimum.",
     *      maxMessage = "Ton titre doit comporter {{ limit }} caractères au maximum."
     * )  
     */
    private $title;

    /**
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Assert\NotBlank
     * @PortFolioAssert\Email
     */
    private $email;

    /**
     * @ORM\Column(name="has_seen", type="boolean", nullable=true)
     */
    private $hasSeen;

    public function __construct(){
        $this->hasSeen = false;
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
     * Set content
     *
     * @param string $content
     *
     * @return Project
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Message
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set hasSeen
     *
     * @param boolean $hasSeen
     *
     * @return Message
     */
    public function setHasSeen($hasSeen)
    {
        $this->hasSeen = $hasSeen;

        return $this;
    }

    /**
     * Get hasSeen
     *
     * @return boolean
     */
    public function getHasSeen()
    {
        return $this->hasSeen;
    }
}
