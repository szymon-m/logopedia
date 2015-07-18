<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artykulacja
 *
 * @ORM\Table("Artykulacja")
 * @ORM\Entity
 */
class Artykulacja
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="a1", type="string", length=5)
     */
    private $a1;

    /**
     * @ORM\ManyToOne(targetEntity="Spotkanie", inversedBy="artykulacje")
     */

    protected $spotkanie;

    /**
     * @return \WsbProject\LogopediaBundle\Entity\Spotkanie
     */
    public function getSpotkanie()
    {
        return $this->spotkanie;
    }

    /**
     * @param \WsbProject\LogopediaBundle\Entity\Spotkanie $spotkanie
     * return Artykulacja
     */
    public function setSpotkanie($spotkanie)
    {
        $spotkanie->setArtykulacje($this);
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

    /**
     * @var string
     *
     * @ORM\Column(name="a2", type="string", length=5)
     */
    private $a2;

    /**
     * @var string
     *
     * @ORM\Column(name="a3", type="string", length=5)
     */
    private $a3;

    /**
     * @var string
     *
     * @ORM\Column(name="a4", type="string", length=5)
     */
    private $a4;

    /**
     * @var string
     *
     * @ORM\Column(name="a5", type="string", length=5)
     */
    private $a5;

    /**
     * @var string
     *
     * @ORM\Column(name="a6", type="string", length=5)
     */
    private $a6;

    /**
     * @var string
     *
     * @ORM\Column(name="a7", type="string", length=5)
     */
    private $a7;

    /**
     * @var string
     *
     * @ORM\Column(name="a8", type="string", length=5)
     */
    private $a8;

    /**
     * @var string
     *
     * @ORM\Column(name="a9", type="string", length=5)
     */
    private $a9;

    /**
     * @var string
     *
     * @ORM\Column(name="a10", type="string", length=5)
     */
    private $a10;

    /**
     * @var string
     *
     * @ORM\Column(name="a11", type="string", length=5)
     */
    private $a11;

    /**
     * @var string
     *
     * @ORM\Column(name="a12", type="string", length=5)
     */
    private $a12;

    /**
     * @var string
     *
     * @ORM\Column(name="a13", type="string", length=5)
     */
    private $a13;

    /**
     * @var string
     *
     * @ORM\Column(name="a14", type="string", length=5)
     */
    private $a14;

    /**
     * @var string
     *
     * @ORM\Column(name="a15", type="string", length=5)
     */
    private $a15;

    /**
     * @var string
     *
     * @ORM\Column(name="a16", type="string", length=5)
     */
    private $a16;

    /**
     * @var string
     *
     * @ORM\Column(name="a17", type="string", length=5)
     */
    private $a17;

    /**
     * @var string
     *
     * @ORM\Column(name="a18", type="string", length=5)
     */
    private $a18;

    /**
     * @var string
     *
     * @ORM\Column(name="a19", type="string", length=5)
     */
    private $a19;

    /**
     * @var string
     *
     * @ORM\Column(name="a20", type="string", length=5)
     */
    private $a20;

    /**
     * @var string
     *
     * @ORM\Column(name="a21", type="string", length=5)
     */
    private $a21;

    /**
     * @var string
     *
     * @ORM\Column(name="a22", type="string", length=5)
     */
    private $a22;

    /**
     * @var string
     *
     * @ORM\Column(name="a23", type="string", length=5)
     */
    private $a23;

    /**
     * @var string
     *
     * @ORM\Column(name="a24", type="string", length=5)
     */
    private $a24;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


}
