<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wywiad
 *
 * @ORM\Table(name="wywiad", indexes={@ORM\Index(name="fk_Wywiad_Spotkanie1_idx", columns={"spotkanie"})})
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
     * @var \Spotkanie
     *
     * @ORM\ManyToOne(targetEntity="Spotkanie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spotkanie", referencedColumnName="id")
     * })
     */
    private $spotkanie;


}
