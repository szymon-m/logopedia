<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zalecenia
 *
 * @ORM\Table(name="zalecenia", indexes={@ORM\Index(name="fk_Zalecenia_Spotkanie1_idx", columns={"id_spotkania"})})
 * @ORM\Entity
 */
class Zalecenia
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
     * @var \Spotkanie
     *
     * @ORM\ManyToOne(targetEntity="Spotkanie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_spotkania", referencedColumnName="id")
     * })
     */
    private $idSpotkania;

    public function __construct()
    {
        $this->idSpotkania = new ArrayCollection();
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
     * @return Zalecenia
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
     * Set idSpotkania
     *
     * @param \WsbProject\LogopediaBundle\Entity\Spotkanie $idSpotkania
     * @return Zalecenia
     */
    public function setIdSpotkania(\WsbProject\LogopediaBundle\Entity\Spotkanie $idSpotkania = null)
    {
        $this->idSpotkania = $idSpotkania;

        return $this;
    }

    /**
     * Get idSpotkania
     *
     * @return \WsbProject\LogopediaBundle\Entity\Spotkanie 
     */
    public function getIdSpotkania()
    {
        return $this->idSpotkania;
    }
}
