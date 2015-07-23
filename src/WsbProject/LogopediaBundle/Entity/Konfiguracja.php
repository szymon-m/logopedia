<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Konfiguracja
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Konfiguracja
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
     * @ORM\Column(name="godzinka", type="string", length=255)
     */
    private $godzinka;

    /**
     * @var string
     *
     * @ORM\Column(name="czasOd", type="string", length=255)
     */
    private $czasOd;

    /**
     * @var string
     *
     * @ORM\Column(name="czasDo", type="string", length=255)
     */
    private $czasDo;

    /**
     * @var string
     *
     * @ORM\Column(name="czasTrwania", type="string", length=255)
     */
    private $czasTrwania;


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
     * Set godzinka
     *
     * @param string $godzinka
     * @return Konfiguracja
     */
    public function setGodzinka($godzinka)
    {
        $this->godzinka = $godzinka;

        return $this;
    }

    /**
     * Get godzinka
     *
     * @return string 
     */
    public function getGodzinka()
    {
        return $this->godzinka;
    }

    /**
     * Set czasOd
     *
     * @param string $czasOd
     * @return Konfiguracja
     */
    public function setCzasOd($czasOd)
    {
        $this->czasOd = $czasOd;

        return $this;
    }

    /**
     * Get czasOd
     *
     * @return string 
     */
    public function getCzasOd()
    {
        return $this->czasOd;
    }

    /**
     * Set czasDo
     *
     * @param string $czasDo
     * @return Konfiguracja
     */
    public function setCzasDo($czasDo)
    {
        $this->czasDo = $czasDo;

        return $this;
    }

    /**
     * Get czasDo
     *
     * @return string 
     */
    public function getCzasDo()
    {
        return $this->czasDo;
    }

    /**
     * Set czasTrwania
     *
     * @param string $czasTrwania
     * @return Konfiguracja
     */
    public function setCzasTrwania($czasTrwania)
    {
        $this->czasTrwania = $czasTrwania;

        return $this;
    }

    /**
     * Get czasTrwania
     *
     * @return string 
     */
    public function getCzasTrwania()
    {
        return $this->czasTrwania;
    }
}
