<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gloski
 */
class Gloski
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $nie;

    /**
     * @var boolean
     */
    private $naglos;

    /**
     * @var boolean
     */
    private $srodglos;

    /**
     * @var boolean
     */
    private $wyglos;

    /**
     * @var boolean
     */
    private $grupaSpolgloskowa;


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
     * Set nie
     *
     * @param boolean $nie
     * @return Gloski
     */
    public function setNie($nie)
    {
        $this->nie = $nie;

        return $this;
    }

    /**
     * Get nie
     *
     * @return boolean 
     */
    public function getNie()
    {
        return $this->nie;
    }

    /**
     * Set naglos
     *
     * @param boolean $naglos
     * @return Gloski
     */
    public function setNaglos($naglos)
    {
        $this->naglos = $naglos;

        return $this;
    }

    /**
     * Get naglos
     *
     * @return boolean 
     */
    public function getNaglos()
    {
        return $this->naglos;
    }

    /**
     * Set srodglos
     *
     * @param boolean $srodglos
     * @return Gloski
     */
    public function setSrodglos($srodglos)
    {
        $this->srodglos = $srodglos;

        return $this;
    }

    /**
     * Get srodglos
     *
     * @return boolean 
     */
    public function getSrodglos()
    {
        return $this->srodglos;
    }

    /**
     * Set wyglos
     *
     * @param boolean $wyglos
     * @return Gloski
     */
    public function setWyglos($wyglos)
    {
        $this->wyglos = $wyglos;

        return $this;
    }

    /**
     * Get wyglos
     *
     * @return boolean 
     */
    public function getWyglos()
    {
        return $this->wyglos;
    }

    /**
     * Set grupaSpolgloskowa
     *
     * @param boolean $grupaSpolgloskowa
     * @return Gloski
     */
    public function setGrupaSpolgloskowa($grupaSpolgloskowa)
    {
        $this->grupaSpolgloskowa = $grupaSpolgloskowa;

        return $this;
    }

    /**
     * Get grupaSpolgloskowa
     *
     * @return boolean 
     */
    public function getGrupaSpolgloskowa()
    {
        return $this->grupaSpolgloskowa;
    }
}
