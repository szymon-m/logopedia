<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Spotkanie
 *
 * @ORM\Table(name="spotkanie", indexes={@ORM\Index(name="fk_Spotkanie_Pacjent_idx", columns={"id_pacjenta"}), @ORM\Index(name="fk_Spotkanie_Obrazki1_idx", columns={"id_obrazki"})})
 * @ORM\Entity
 */
class Spotkanie
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
     * @var boolean
     *
     * @ORM\Column(name="done", type="boolean", nullable=false)
     */
    private $done;

    /**
     * @var boolean
     *
     * @ORM\Column(name="first", type="boolean", nullable=false)
     */
    private $first;

    /**
     * @var string
     *
     * @ORM\Column(name="uwagi", type="string", length=255, nullable=true)
     */
    private $uwagi;

    /**
     * @var \Obrazki
     *
     * @ORM\ManyToOne(targetEntity="Obrazki")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obrazki", referencedColumnName="id")
     * })
     */
    private $idObrazki;

    /**
     * @var \Pacjent
     *
     * @ORM\ManyToOne(targetEntity="Pacjent", inversedBy="spotkania")
     * @ORM\JoinColumn(name="id_pacjenta", referencedColumnName="id")
     *
     */
    private $pacjent;



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
     * Set start
     *
     * @param \DateTime $start
     * @return Spotkanie
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Spotkanie
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set allday
     *
     * @param boolean $allday
     * @return Spotkanie
     */
    public function setAllday($allday)
    {
        $this->allday = $allday;

        return $this;
    }

    /**
     * Get allday
     *
     * @return boolean 
     */
    public function getAllday()
    {
        return $this->allday;
    }

    /**
     * Set done
     *
     * @param boolean $done
     * @return Spotkanie
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean 
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set first
     *
     * @param boolean $first
     * @return Spotkanie
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get first
     *
     * @return boolean 
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set uwagi
     *
     * @param string $uwagi
     * @return Spotkanie
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;

        return $this;
    }

    /**
     * Get uwagi
     *
     * @return string 
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }

    /**
     * Set idObrazki
     *
     * @param \WsbProject\LogopediaBundle\Entity\Obrazki $idObrazki
     * @return Spotkanie
     */
    public function setIdObrazki(\WsbProject\LogopediaBundle\Entity\Obrazki $idObrazki = null)
    {
        $this->idObrazki = $idObrazki;

        return $this;
    }

    /**
     * Get idObrazki
     *
     * @return \WsbProject\LogopediaBundle\Entity\Obrazki 
     */
    public function getIdObrazki()
    {
        return $this->idObrazki;
    }

    /**
     * Set idPacjenta
     *
     * @param \WsbProject\LogopediaBundle\Entity\Pacjent $idPacjenta
     * @return Spotkanie
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
