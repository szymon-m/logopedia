<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pacjent
 *
 * @ORM\Table(name="pacjent")
 * @ORM\Entity
 */
class Pacjent
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
     * @ORM\Column(name="imie", type="string", length=45, nullable=false)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=45, nullable=false)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=45, nullable=false)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="miejscowosc", type="string", length=45, nullable=false)
     */
    private $miejscowosc;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=45, nullable=false)
     */
    private $telefon;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_wywiadu", type="integer", nullable=false)
     */
    private $idWywiadu;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_diagnozy", type="integer", nullable=false)
     */
    private $idDiagnozy;



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

    /**
     * Set idWywiadu
     *
     * @param integer $idWywiadu
     * @return Pacjent
     */
    public function setIdWywiadu($idWywiadu)
    {
        $this->idWywiadu = $idWywiadu;

        return $this;
    }

    /**
     * Get idWywiadu
     *
     * @return integer 
     */
    public function getIdWywiadu()
    {
        return $this->idWywiadu;
    }

    /**
     * Set idDiagnozy
     *
     * @param integer $idDiagnozy
     * @return Pacjent
     */
    public function setIdDiagnozy($idDiagnozy)
    {
        $this->idDiagnozy = $idDiagnozy;

        return $this;
    }

    /**
     * Get idDiagnozy
     *
     * @return integer 
     */
    public function getIdDiagnozy()
    {
        return $this->idDiagnozy;
    }
}
