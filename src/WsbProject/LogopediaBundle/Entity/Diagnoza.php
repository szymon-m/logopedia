<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnoza
 *
 * @ORM\Table(name="diagnoza", indexes={@ORM\Index(name="fk_Diagnoza_Pacjent1_idx", columns={"id_pacjenta"})})
 * @ORM\Entity
 */
class Diagnoza
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
     * @ORM\Column(name="tresc", type="string", length=255, nullable=true)
     */
    private $tresc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=true)
     */
    private $data;

    /**
     * @var \Pacjent
     *
     * @ORM\ManyToOne(targetEntity="Pacjent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pacjenta", referencedColumnName="id")
     * })
     */
    private $idPacjenta;

    public function __construct()
    {
        $this->idPacjenta = new ArrayCollection();
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
     * Set tresc
     *
     * @param string $tresc
     * @return Diagnoza
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;

        return $this;
    }

    /**
     * Get tresc
     *
     * @return string 
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Diagnoza
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set idPacjenta
     *
     * @param \WsbProject\LogopediaBundle\Entity\Pacjent $idPacjenta
     * @return Diagnoza
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
