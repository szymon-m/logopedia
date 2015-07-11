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
     * @ORM\Column(name="imie", type="string", length=45, nullable=true)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=45, nullable=true)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=45, nullable=true)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=45, nullable=true)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="miejscowosc", type="string", length=45, nullable=true)
     */
    private $miejscowosc;


}
