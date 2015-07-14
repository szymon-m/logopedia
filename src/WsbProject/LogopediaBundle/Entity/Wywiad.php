<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wywiad
 *
 * @ORM\Table(name="wywiad", indexes={@ORM\Index(name="fk_Wywiad_Pacjent1_idx", columns={"id_pacjenta"})})
 * @ORM\Entity
 */
class Wywiad
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
     * @ORM\Column(name="b1", type="string", length=3, nullable=true)
     */
    private $b1;

    /**
     * @var string
     *
     * @ORM\Column(name="b2", type="string", length=3, nullable=true)
     */
    private $b2;

    /**
     * @var string
     *
     * @ORM\Column(name="b3", type="string", length=3, nullable=true)
     */
    private $b3;

    /**
     * @var string
     *
     * @ORM\Column(name="b4", type="string", length=3, nullable=true)
     */
    private $b4;

    /**
     * @var string
     *
     * @ORM\Column(name="b5", type="string", length=3, nullable=true)
     */
    private $b5;

    /**
     * @var string
     *
     * @ORM\Column(name="b6", type="string", length=6, nullable=true)
     */
    private $b6;

    /**
     * @var string
     *
     * @ORM\Column(name="b7", type="string", length=7, nullable=true)
     */
    private $b7;

    /**
     * @var string
     *
     * @ORM\Column(name="b8", type="string", length=2, nullable=true)
     */
    private $b8;

    /**
     * @var string
     *
     * @ORM\Column(name="b9", type="string", length=2, nullable=true)
     */
    private $b9;

    /**
     * @var string
     *
     * @ORM\Column(name="b10", type="string", length=45, nullable=true)
     */
    private $b10;

    /**
     * @var string
     *
     * @ORM\Column(name="b11", type="string", length=4, nullable=true)
     */
    private $b11;

    /**
     * @var string
     *
     * @ORM\Column(name="b12", type="string", length=4, nullable=true)
     */
    private $b12;

    /**
     * @var string
     *
     * @ORM\Column(name="b13", type="string", length=2, nullable=true)
     */
    private $b13;

    /**
     * @var string
     *
     * @ORM\Column(name="b14", type="string", length=45, nullable=true)
     */
    private $b14;

    /**
     * @var string
     *
     * @ORM\Column(name="b15", type="string", length=3, nullable=true)
     */
    private $b15;

    /**
     * @var string
     *
     * @ORM\Column(name="b16", type="string", length=2, nullable=true)
     */
    private $b16;

    /**
     * @var string
     *
     * @ORM\Column(name="b17", type="string", length=2, nullable=true)
     */
    private $b17;

    /**
     * @var string
     *
     * @ORM\Column(name="b18", type="string", length=2, nullable=true)
     */
    private $b18;

    /**
     * @var string
     *
     * @ORM\Column(name="b19", type="string", length=2, nullable=true)
     */
    private $b19;

    /**
     * @var string
     *
     * @ORM\Column(name="b20", type="string", length=2, nullable=true)
     */
    private $b20;

    /**
     * @var string
     *
     * @ORM\Column(name="b21", type="string", length=45, nullable=true)
     */
    private $b21;

    /**
     * @var \Pacjent
     *
     * @ORM\ManyToOne(targetEntity="Pacjent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pacjenta", referencedColumnName="id")
     * })
     */
    private $idPacjenta;



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
     * @param string $b1
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
     * @return string 
     */
    public function getB1()
    {
        return $this->b1;
    }

    /**
     * Set b2
     *
     * @param string $b2
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
     * @return string 
     */
    public function getB2()
    {
        return $this->b2;
    }

    /**
     * Set b3
     *
     * @param string $b3
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
     * @return string 
     */
    public function getB3()
    {
        return $this->b3;
    }

    /**
     * Set b4
     *
     * @param string $b4
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
     * @return string 
     */
    public function getB4()
    {
        return $this->b4;
    }

    /**
     * Set b5
     *
     * @param string $b5
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
     * @return string 
     */
    public function getB5()
    {
        return $this->b5;
    }

    /**
     * Set b6
     *
     * @param string $b6
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
     * @return string 
     */
    public function getB6()
    {
        return $this->b6;
    }

    /**
     * Set b7
     *
     * @param string $b7
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
     * @return string 
     */
    public function getB7()
    {
        return $this->b7;
    }

    /**
     * Set b8
     *
     * @param string $b8
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
     * @return string 
     */
    public function getB8()
    {
        return $this->b8;
    }

    /**
     * Set b9
     *
     * @param string $b9
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
     * @return string 
     */
    public function getB9()
    {
        return $this->b9;
    }

    /**
     * Set b10
     *
     * @param string $b10
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
     * @return string 
     */
    public function getB10()
    {
        return $this->b10;
    }

    /**
     * Set b11
     *
     * @param string $b11
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
     * @return string 
     */
    public function getB11()
    {
        return $this->b11;
    }

    /**
     * Set b12
     *
     * @param string $b12
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
     * @return string 
     */
    public function getB12()
    {
        return $this->b12;
    }

    /**
     * Set b13
     *
     * @param string $b13
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
     * @return string 
     */
    public function getB13()
    {
        return $this->b13;
    }

    /**
     * Set b14
     *
     * @param string $b14
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
     * @return string 
     */
    public function getB14()
    {
        return $this->b14;
    }

    /**
     * Set b15
     *
     * @param string $b15
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
     * @return string 
     */
    public function getB15()
    {
        return $this->b15;
    }

    /**
     * Set b16
     *
     * @param string $b16
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
     * @return string 
     */
    public function getB16()
    {
        return $this->b16;
    }

    /**
     * Set b17
     *
     * @param string $b17
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
     * @return string 
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

    /**
     * Set idPacjenta
     *
     * @param \WsbProject\LogopediaBundle\Entity\Pacjent $idPacjenta
     * @return Wywiad
     */
    public function setIdPacjenta(\WsbProject\LogopediaBundle\Entity\Pacjent $idPacjenta = null)
    {
        $this->idPacjenta = $idPacjenta;

        return $this;
    }

    /**
     * Get idPacjenta
     *
     * @return \WsbProject\LogopediaBundle\Entity\Pacjent 
     */
    public function getIdPacjenta()
    {
        return $this->idPacjenta;
    }
}
