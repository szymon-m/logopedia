<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ajax
 */
class Ajax
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $a1;

    /**
     * @var string
     */
    private $a2;

    /**
     * @var string
     */
    private $a3;

    /**
     * @var string
     */
    private $a4;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setValue($name, $key, $value) {

        $property = $name.$key;

        $this->$property = $value;

    }
    public function getValue($name, $key) {

        $property = $name.$key;

        return $this->$property;
    }



    /**
     * Set a1
     *
     * @param string $a1
     * @return Ajax
     */
    public function setA1($a1)
    {
        $this->a1 = $a1;

        return $this;
    }

    /**
     * Get a1
     *
     * @return string 
     */
    public function getA1()
    {
        return $this->a1;
    }

    /**
     * Set a2
     *
     * @param string $a2
     * @return Ajax
     */
    public function setA2($a2)
    {
        $this->a2 = $a2;

        return $this;
    }

    /**
     * Get a2
     *
     * @return string 
     */
    public function getA2()
    {
        return $this->a2;
    }

    /**
     * Set a3
     *
     * @param string $a3
     * @return Ajax
     */
    public function setA3($a3)
    {
        $this->a3 = $a3;

        return $this;
    }

    /**
     * Get a3
     *
     * @return string 
     */
    public function getA3()
    {
        return $this->a3;
    }

    /**
     * Set a4
     *
     * @param string $a4
     * @return Ajax
     */
    public function setA4($a4)
    {
        $this->a4 = $a4;

        return $this;
    }

    /**
     * Get a4
     *
     * @return string 
     */
    public function getA4()
    {
        return $this->a4;
    }
}
