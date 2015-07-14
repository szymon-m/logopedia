<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artykulacja
 *
 * @ORM\Table(name="artykulacja", indexes={@ORM\Index(name="fk_Artykulacja_Spotkanie1_idx", columns={"spotkanie"})})
 * @ORM\Entity
 */
class Artykulacja
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="a1", type="string", length=5, nullable=true)
     */
    private $a1;

    /**
     * @var string
     *
     * @ORM\Column(name="a2", type="string", length=5, nullable=true)
     */
    private $a2;

    /**
     * @var string
     *
     * @ORM\Column(name="a3", type="string", length=5, nullable=true)
     */
    private $a3;

    /**
     * @var string
     *
     * @ORM\Column(name="a4", type="string", length=5, nullable=true)
     */
    private $a4;

    /**
     * @var string
     *
     * @ORM\Column(name="a5", type="string", length=5, nullable=true)
     */
    private $a5;

    /**
     * @var string
     *
     * @ORM\Column(name="a6", type="string", length=5, nullable=true)
     */
    private $a6;

    /**
     * @var string
     *
     * @ORM\Column(name="a7", type="string", length=5, nullable=true)
     */
    private $a7;

    /**
     * @var string
     *
     * @ORM\Column(name="a8", type="string", length=5, nullable=true)
     */
    private $a8;

    /**
     * @var string
     *
     * @ORM\Column(name="a9", type="string", length=5, nullable=true)
     */
    private $a9;

    /**
     * @var string
     *
     * @ORM\Column(name="a10", type="string", length=5, nullable=true)
     */
    private $a10;

    /**
     * @var string
     *
     * @ORM\Column(name="a11", type="string", length=5, nullable=true)
     */
    private $a11;

    /**
     * @var string
     *
     * @ORM\Column(name="a12", type="string", length=5, nullable=true)
     */
    private $a12;

    /**
     * @var string
     *
     * @ORM\Column(name="a13", type="string", length=5, nullable=true)
     */
    private $a13;

    /**
     * @var string
     *
     * @ORM\Column(name="a14", type="string", length=5, nullable=true)
     */
    private $a14;

    /**
     * @var string
     *
     * @ORM\Column(name="a15", type="string", length=5, nullable=true)
     */
    private $a15;

    /**
     * @var string
     *
     * @ORM\Column(name="a16", type="string", length=5, nullable=true)
     */
    private $a16;

    /**
     * @var string
     *
     * @ORM\Column(name="a17", type="string", length=5, nullable=true)
     */
    private $a17;

    /**
     * @var string
     *
     * @ORM\Column(name="a18", type="string", length=5, nullable=true)
     */
    private $a18;

    /**
     * @var string
     *
     * @ORM\Column(name="a19", type="string", length=5, nullable=true)
     */
    private $a19;

    /**
     * @var string
     *
     * @ORM\Column(name="a20", type="string", length=5, nullable=true)
     */
    private $a20;

    /**
     * @var string
     *
     * @ORM\Column(name="a21", type="string", length=5, nullable=true)
     */
    private $a21;

    /**
     * @var string
     *
     * @ORM\Column(name="a22", type="string", length=5, nullable=true)
     */
    private $a22;

    /**
     * @var string
     *
     * @ORM\Column(name="a23", type="string", length=5, nullable=true)
     */
    private $a23;

    /**
     * @var string
     *
     * @ORM\Column(name="a24", type="string", length=5, nullable=true)
     */
    private $a24;

    /**
     * @var \Spotkanie
     *
     * @ORM\ManyToOne(targetEntity="Spotkanie")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="spotkanie", referencedColumnName="id")
     * })
     */
    private $spotkanie;

    public function __construct()
    {
        $this->spotkanie = new ArrayCollection();
    }

    /**
     * @param \Spotkanie $spotkanie
     */
    public function setSpotkanie(\WsbProject\LogopediaBundle\Entity\Spotkanie $spotkanie = null)
    {
        $this->spotkanie = $spotkanie;


    }


    public function setValue($name, $key, $value) {

        $property = $name.$key;

        $this->$property = $value;

    }
    public function getValue($name, $key) {

        $property = $name.$key;

        return $this->$property;
    }

}
