<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pacjent
 *
 * @ORM\Table("Pacjent")
 * @ORM\Entity
 */
class Pacjent
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
     * @ORM\Column(name="imie", type="string", length=255)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=255)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=255)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="miejscowosc", type="string", length=255)
     */
    private $miejscowosc;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=255)
     */
    private $telefon;

    /**
     * @ORM\OneToMany(targetEntity="Spotkanie", mappedBy="pacjent")
     * @var Spotkanie[]
     */

    protected $spotkania = null;

    /**
     * @ORM\OneToMany(targetEntity="Wywiad", mappedBy="pacjent")
     * @var Wywiady[]
     */

    protected $wywiady = null;

    /**
     * @ORM\OneToMany(targetEntity="Diagnoza", mappedBy="pacjent")
     * @var Diagnozy[]
     */

    protected $diagnozy = null;



    public function __construct()
    {
        $this->spotkania = new ArrayCollection();
        $this->wywiady = new ArrayCollection();
        $this->diagnozy = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSpotkania()
    {
        return $this->spotkania;
    }

    /**
     * @param mixed $spotkania
     */
    public function setSpotkania($spotkania)
    {
        $this->spotkania[] = $spotkania;
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
     * Set imie
     *
     * @param string $imie
     * @return Pacjent
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Pacjent
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set adres
     *
     * @param string $adres
     * @return Pacjent
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string 
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set miejscowosc
     *
     * @param string $miejscowosc
     * @return Pacjent
     */
    public function setMiejscowosc($miejscowosc)
    {
        $this->miejscowosc = $miejscowosc;

        return $this;
    }

    /**
     * Get miejscowosc
     *
     * @return string 
     */
    public function getMiejscowosc()
    {
        return $this->miejscowosc;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return Pacjent
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }
}
