<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wywiad
 *
 * @ORM\Table("Wywiad")
 * @ORM\Entity
 */
class Wywiad
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
     * @ORM\ManyToOne(targetEntity="Pacjent", inversedBy="wywiady")
     */

    protected $pacjent;

    /**
     * @return mixed
     */
    public function getPacjent()
    {
        return $this->pacjent;
    }

    /**
     * @param mixed $pacjent
     */
    public function setPacjent($pacjent)
    {
        $this->pacjent = $pacjent;
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
     * @var integer
     *
     * @ORM\Column(name="b1", type="integer")
     */
    private $b1;

    /**
     * @var integer
     *
     * @ORM\Column(name="b2", type="integer")
     */
    private $b2;

    /**
     * @var integer
     *
     * @ORM\Column(name="b3", type="integer")
     */
    private $b3;

    /**
     * @var integer
     *
     * @ORM\Column(name="b4", type="integer")
     */
    private $b4;

    /**
     * @var integer
     *
     * @ORM\Column(name="b5", type="integer")
     */
    private $b5;

    /**
     * @var integer
     *
     * @ORM\Column(name="b6", type="integer")
     */
    private $b6;

    /**
     * @var integer
     *
     * @ORM\Column(name="b7", type="integer")
     */
    private $b7;

    /**
     * @var integer
     *
     * @ORM\Column(name="b8", type="integer")
     */
    private $b8;

    /**
     * @var integer
     *
     * @ORM\Column(name="b9", type="integer")
     */
    private $b9;

    /**
     * @var integer
     *
     * @ORM\Column(name="b10", type="integer")
     */
    private $b10;

    /**
     * @var integer
     *
     * @ORM\Column(name="b11", type="integer")
     */
    private $b11;

    /**
     * @var integer
     *
     * @ORM\Column(name="b12", type="integer")
     */
    private $b12;

    /**
     * @var integer
     *
     * @ORM\Column(name="b13", type="integer")
     */
    private $b13;

    /**
     * @var integer
     *
     * @ORM\Column(name="b14", type="integer")
     */
    private $b14;

    /**
     * @var integer
     *
     * @ORM\Column(name="b15", type="integer")
     */
    private $b15;

    /**
     * @var integer
     *
     * @ORM\Column(name="b16", type="integer")
     */
    private $b16;

    /**
     * @var integer
     *
     * @ORM\Column(name="b17", type="integer")
     */
    private $b17;

    /**
     * @var string
     *
     * @ORM\Column(name="b18", type="string", length=255, nullable=true)
     */
    private $b18;

    /**
     * @var string
     *
     * @ORM\Column(name="b19", type="string", length=255, nullable=true)
     */
    private $b19;

    /**
     * @var string
     *
     * @ORM\Column(name="b20", type="string", length=255, nullable=true)
     */
    private $b20;

    /**
     * @var string
     *
     * @ORM\Column(name="b21", type="string", length=255, nullable=true)
     */
    private $b21;


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
     * Set b1
     *
     * @param integer $b1
     * @return Wywiad
     */
    public function setB1($b1)
    {
        $this->b1 = $b1;

        return $this;
    }

    /**
     * Get b1
     *
     * @return integer 
     */
    public function getB1()
    {
        return $this->b1;
    }

    /**
     * Set b2
     *
     * @param integer $b2
     * @return Wywiad
     */
    public function setB2($b2)
    {
        $this->b2 = $b2;

        return $this;
    }

    /**
     * Get b2
     *
     * @return integer 
     */
    public function getB2()
    {
        return $this->b2;
    }

    /**
     * Set b3
     *
     * @param integer $b3
     * @return Wywiad
     */
    public function setB3($b3)
    {
        $this->b3 = $b3;

        return $this;
    }

    /**
     * Get b3
     *
     * @return integer 
     */
    public function getB3()
    {
        return $this->b3;
    }

    /**
     * Set b4
     *
     * @param integer $b4
     * @return Wywiad
     */
    public function setB4($b4)
    {
        $this->b4 = $b4;

        return $this;
    }

    /**
     * Get b4
     *
     * @return integer 
     */
    public function getB4()
    {
        return $this->b4;
    }

    /**
     * Set b5
     *
     * @param integer $b5
     * @return Wywiad
     */
    public function setB5($b5)
    {
        $this->b5 = $b5;

        return $this;
    }

    /**
     * Get b5
     *
     * @return integer 
     */
    public function getB5()
    {
        return $this->b5;
    }

    /**
     * Set b6
     *
     * @param integer $b6
     * @return Wywiad
     */
    public function setB6($b6)
    {
        $this->b6 = $b6;

        return $this;
    }

    /**
     * Get b6
     *
     * @return integer 
     */
    public function getB6()
    {
        return $this->b6;
    }

    /**
     * Set b7
     *
     * @param integer $b7
     * @return Wywiad
     */
    public function setB7($b7)
    {
        $this->b7 = $b7;

        return $this;
    }

    /**
     * Get b7
     *
     * @return integer 
     */
    public function getB7()
    {
        return $this->b7;
    }

    /**
     * Set b8
     *
     * @param integer $b8
     * @return Wywiad
     */
    public function setB8($b8)
    {
        $this->b8 = $b8;

        return $this;
    }

    /**
     * Get b8
     *
     * @return integer 
     */
    public function getB8()
    {
        return $this->b8;
    }

    /**
     * Set b9
     *
     * @param integer $b9
     * @return Wywiad
     */
    public function setB9($b9)
    {
        $this->b9 = $b9;

        return $this;
    }

    /**
     * Get b9
     *
     * @return integer 
     */
    public function getB9()
    {
        return $this->b9;
    }

    /**
     * Set b10
     *
     * @param integer $b10
     * @return Wywiad
     */
    public function setB10($b10)
    {
        $this->b10 = $b10;

        return $this;
    }

    /**
     * Get b10
     *
     * @return integer 
     */
    public function getB10()
    {
        return $this->b10;
    }

    /**
     * Set b11
     *
     * @param integer $b11
     * @return Wywiad
     */
    public function setB11($b11)
    {
        $this->b11 = $b11;

        return $this;
    }

    /**
     * Get b11
     *
     * @return integer 
     */
    public function getB11()
    {
        return $this->b11;
    }

    /**
     * Set b12
     *
     * @param integer $b12
     * @return Wywiad
     */
    public function setB12($b12)
    {
        $this->b12 = $b12;

        return $this;
    }

    /**
     * Get b12
     *
     * @return integer 
     */
    public function getB12()
    {
        return $this->b12;
    }

    /**
     * Set b13
     *
     * @param integer $b13
     * @return Wywiad
     */
    public function setB13($b13)
    {
        $this->b13 = $b13;

        return $this;
    }

    /**
     * Get b13
     *
     * @return integer 
     */
    public function getB13()
    {
        return $this->b13;
    }

    /**
     * Set b14
     *
     * @param integer $b14
     * @return Wywiad
     */
    public function setB14($b14)
    {
        $this->b14 = $b14;

        return $this;
    }

    /**
     * Get b14
     *
     * @return integer 
     */
    public function getB14()
    {
        return $this->b14;
    }

    /**
     * Set b15
     *
     * @param integer $b15
     * @return Wywiad
     */
    public function setB15($b15)
    {
        $this->b15 = $b15;

        return $this;
    }

    /**
     * Get b15
     *
     * @return integer 
     */
    public function getB15()
    {
        return $this->b15;
    }

    /**
     * Set b16
     *
     * @param integer $b16
     * @return Wywiad
     */
    public function setB16($b16)
    {
        $this->b16 = $b16;

        return $this;
    }

    /**
     * Get b16
     *
     * @return integer 
     */
    public function getB16()
    {
        return $this->b16;
    }

    /**
     * Set b17
     *
     * @param integer $b17
     * @return Wywiad
     */
    public function setB17($b17)
    {
        $this->b17 = $b17;

        return $this;
    }

    /**
     * Get b17
     *
     * @return integer 
     */
    public function getB17()
    {
        return $this->b17;
    }

    /**
     * Set b18
     *
     * @param string $b18
     * @return Wywiad
     */
    public function setB18($b18)
    {
        $this->b18 = $b18;

        return $this;
    }

    /**
     * Get b18
     *
     * @return string 
     */
    public function getB18()
    {
        return $this->b18;
    }

    /**
     * Set b19
     *
     * @param string $b19
     * @return Wywiad
     */
    public function setB19($b19)
    {
        $this->b19 = $b19;

        return $this;
    }

    /**
     * Get b19
     *
     * @return string 
     */
    public function getB19()
    {
        return $this->b19;
    }

    /**
     * Set b20
     *
     * @param string $b20
     * @return Wywiad
     */
    public function setB20($b20)
    {
        $this->b20 = $b20;

        return $this;
    }

    /**
     * Get b20
     *
     * @return string 
     */
    public function getB20()
    {
        return $this->b20;
    }

    /**
     * Set b21
     *
     * @param string $b21
     * @return Wywiad
     */
    public function setB21($b21)
    {
        $this->b21 = $b21;

        return $this;
    }

    /**
     * Get b21
     *
     * @return string 
     */
    public function getB21()
    {
        return $this->b21;
    }
}
