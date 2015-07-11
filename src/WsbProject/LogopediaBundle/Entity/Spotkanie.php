<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spotkanie
 *
 * @ORM\Table(name="spotkanie", indexes={@ORM\Index(name="fk_Spotkanie_Pacjent_idx", columns={"pacjenci"})})
 * @ORM\Entity
 */
class Spotkanie
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return boolean
     */
    public function isAllday()
    {
        return $this->allday;
    }

    /**
     * @param boolean $allday
     */
    public function setAllday($allday)
    {
        $this->allday = $allday;
    }

    /**
     * @return \Pacjent
     */
    public function getPacjenci()
    {
        return $this->pacjenci;
    }

    /**
     * @param \Pacjent $pacjenci
     */
    public function setPacjenci($pacjenci)
    {
        $this->pacjenci = $pacjenci;
    }
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", nullable=false)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", nullable=false)
     */
    private $end;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allday", type="boolean", nullable=false)
     */
    private $allday;

    /**
     * @var \Pacjent
     *
     * @ORM\ManyToOne(targetEntity="Pacjent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pacjenci", referencedColumnName="id")
     * })
     */
    private $pacjenci;


}
