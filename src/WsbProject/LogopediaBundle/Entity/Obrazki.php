<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * Obrazki
 *
 * @ORM\Table("Obrazki")
 * @ORM\Entity
 */
class Obrazki
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
     * @ORM\Column(name="nazwa", type="string", length=255)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="string", length=255)
     */
    private $opis;

    /**
     * @ORM\ManyToMany(targetEntity="Spotkanie", mappedBy="obrazki")
     *
     */

    protected $spotkanie;

    /**
     * @return \WsbProject\LogopediaBundle\Entity\Spotkanie
     */
    public function getSpotkanie()
    {
        return $this->spotkanie;
    }

    /**
     * @param \WsbProject\LogopediaBundle\Entity\Spotkanie $spotkanie
     * return Obrazki
     */
    public function setSpotkanie($spotkanie)
    {
        //$spotkanie->setObrazki($this);
        $this->spotkanie = $spotkanie;
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
     * Set nazwa
     *
     * @param string $nazwa
     * @return Obrazki
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set opis
     *
     * @param string $opis
     * @return Obrazki
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string 
     */
    public function getOpis()
    {
        return $this->opis;
    }
}
