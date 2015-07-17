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

    /**
     * Set a1
     *
     * @param string $a1
     * @return Artykulacja
     */
    public function setA1($a1)
    {
        $this->a1 = $a1;

        return $this;
    }

    /**
     * Get a1
     *
     * @return string 
     */
    public function getA1()
    {
        return $this->a1;
    }

    /**
     * Set a2
     *
     * @param string $a2
     * @return Artykulacja
     */
    public function setA2($a2)
    {
        $this->a2 = $a2;

        return $this;
    }

    /**
     * Get a2
     *
     * @return string 
     */
    public function getA2()
    {
        return $this->a2;
    }

    /**
     * Set a3
     *
     * @param string $a3
     * @return Artykulacja
     */
    public function setA3($a3)
    {
        $this->a3 = $a3;

        return $this;
    }

    /**
     * Get a3
     *
     * @return string 
     */
    public function getA3()
    {
        return $this->a3;
    }

    /**
     * Set a4
     *
     * @param string $a4
     * @return Artykulacja
     */
    public function setA4($a4)
    {
        $this->a4 = $a4;

        return $this;
    }

    /**
     * Get a4
     *
     * @return string 
     */
    public function getA4()
    {
        return $this->a4;
    }

    /**
     * Set a5
     *
     * @param string $a5
     * @return Artykulacja
     */
    public function setA5($a5)
    {
        $this->a5 = $a5;

        return $this;
    }

    /**
     * Get a5
     *
     * @return string 
     */
    public function getA5()
    {
        return $this->a5;
    }

    /**
     * Set a6
     *
     * @param string $a6
     * @return Artykulacja
     */
    public function setA6($a6)
    {
        $this->a6 = $a6;

        return $this;
    }

    /**
     * Get a6
     *
     * @return string 
     */
    public function getA6()
    {
        return $this->a6;
    }

    /**
     * Set a7
     *
     * @param string $a7
     * @return Artykulacja
     */
    public function setA7($a7)
    {
        $this->a7 = $a7;

        return $this;
    }

    /**
     * Get a7
     *
     * @return string 
     */
    public function getA7()
    {
        return $this->a7;
    }

    /**
     * Set a8
     *
     * @param string $a8
     * @return Artykulacja
     */
    public function setA8($a8)
    {
        $this->a8 = $a8;

        return $this;
    }

    /**
     * Get a8
     *
     * @return string 
     */
    public function getA8()
    {
        return $this->a8;
    }

    /**
     * Set a9
     *
     * @param string $a9
     * @return Artykulacja
     */
    public function setA9($a9)
    {
        $this->a9 = $a9;

        return $this;
    }

    /**
     * Get a9
     *
     * @return string 
     */
    public function getA9()
    {
        return $this->a9;
    }

    /**
     * Set a10
     *
     * @param string $a10
     * @return Artykulacja
     */
    public function setA10($a10)
    {
        $this->a10 = $a10;

        return $this;
    }

    /**
     * Get a10
     *
     * @return string 
     */
    public function getA10()
    {
        return $this->a10;
    }

    /**
     * Set a11
     *
     * @param string $a11
     * @return Artykulacja
     */
    public function setA11($a11)
    {
        $this->a11 = $a11;

        return $this;
    }

    /**
     * Get a11
     *
     * @return string 
     */
    public function getA11()
    {
        return $this->a11;
    }

    /**
     * Set a12
     *
     * @param string $a12
     * @return Artykulacja
     */
    public function setA12($a12)
    {
        $this->a12 = $a12;

        return $this;
    }

    /**
     * Get a12
     *
     * @return string 
     */
    public function getA12()
    {
        return $this->a12;
    }

    /**
     * Set a13
     *
     * @param string $a13
     * @return Artykulacja
     */
    public function setA13($a13)
    {
        $this->a13 = $a13;

        return $this;
    }

    /**
     * Get a13
     *
     * @return string 
     */
    public function getA13()
    {
        return $this->a13;
    }

    /**
     * Set a14
     *
     * @param string $a14
     * @return Artykulacja
     */
    public function setA14($a14)
    {
        $this->a14 = $a14;

        return $this;
    }

    /**
     * Get a14
     *
     * @return string 
     */
    public function getA14()
    {
        return $this->a14;
    }

    /**
     * Set a15
     *
     * @param string $a15
     * @return Artykulacja
     */
    public function setA15($a15)
    {
        $this->a15 = $a15;

        return $this;
    }

    /**
     * Get a15
     *
     * @return string 
     */
    public function getA15()
    {
        return $this->a15;
    }

    /**
     * Set a16
     *
     * @param string $a16
     * @return Artykulacja
     */
    public function setA16($a16)
    {
        $this->a16 = $a16;

        return $this;
    }

    /**
     * Get a16
     *
     * @return string 
     */
    public function getA16()
    {
        return $this->a16;
    }

    /**
     * Set a17
     *
     * @param string $a17
     * @return Artykulacja
     */
    public function setA17($a17)
    {
        $this->a17 = $a17;

        return $this;
    }

    /**
     * Get a17
     *
     * @return string 
     */
    public function getA17()
    {
        return $this->a17;
    }

    /**
     * Set a18
     *
     * @param string $a18
     * @return Artykulacja
     */
    public function setA18($a18)
    {
        $this->a18 = $a18;

        return $this;
    }

    /**
     * Get a18
     *
     * @return string 
     */
    public function getA18()
    {
        return $this->a18;
    }

    /**
     * Set a19
     *
     * @param string $a19
     * @return Artykulacja
     */
    public function setA19($a19)
    {
        $this->a19 = $a19;

        return $this;
    }

    /**
     * Get a19
     *
     * @return string 
     */
    public function getA19()
    {
        return $this->a19;
    }

    /**
     * Set a20
     *
     * @param string $a20
     * @return Artykulacja
     */
    public function setA20($a20)
    {
        $this->a20 = $a20;

        return $this;
    }

    /**
     * Get a20
     *
     * @return string 
     */
    public function getA20()
    {
        return $this->a20;
    }

    /**
     * Set a21
     *
     * @param string $a21
     * @return Artykulacja
     */
    public function setA21($a21)
    {
        $this->a21 = $a21;

        return $this;
    }

    /**
     * Get a21
     *
     * @return string 
     */
    public function getA21()
    {
        return $this->a21;
    }

    /**
     * Set a22
     *
     * @param string $a22
     * @return Artykulacja
     */
    public function setA22($a22)
    {
        $this->a22 = $a22;

        return $this;
    }

    /**
     * Get a22
     *
     * @return string 
     */
    public function getA22()
    {
        return $this->a22;
    }

    /**
     * Set a23
     *
     * @param string $a23
     * @return Artykulacja
     */
    public function setA23($a23)
    {
        $this->a23 = $a23;

        return $this;
    }

    /**
     * Get a23
     *
     * @return string 
     */
    public function getA23()
    {
        return $this->a23;
    }

    /**
     * Set a24
     *
     * @param string $a24
     * @return Artykulacja
     */
    public function setA24($a24)
    {
        $this->a24 = $a24;

        return $this;
    }

    /**
     * Get a24
     *
     * @return string 
     */
    public function getA24()
    {
        return $this->a24;
    }
}
