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
     * @ORM\Column(name="treść", type="string", length=255, nullable=true)
     */
    private $treść;

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
     * Set treść
     *
     * @param string $treść
     * @return Diagnoza
     */
    public function setTreść($treść)
    {
        $this->treść = $treść;

        return $this;
    }

    /**
     * Get treść
     *
     * @return string 
     */
    public function getTreść()
    {
        return $this->treść;
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
