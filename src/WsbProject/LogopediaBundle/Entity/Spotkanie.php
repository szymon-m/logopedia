<?php

namespace WsbProject\LogopediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Spotkanie
 *
 * @ORM\Table("Spotkanie")
 * @ORM\Entity
 */
class Spotkanie
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
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allday", type="boolean")
     */
    private $allday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="first", type="boolean")
     */
    private $first;

    /**
     * @var boolean
     *
     * @ORM\Column(name="done", type="boolean")
     */
    private $done;

    /**
     * @return boolean
     */
    public function isDone()
    {
        return $this->done;
    }

    /**
     * @param boolean $done
     */
    public function setDone($done)
    {
        $this->done = $done;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="uwagi", type="string", length=255)
     */
    private $uwagi;

    /**
     * @var string
     *
     * @ORM\Column(name="zalecenia", type="string", length=255, nullable=true)
     */
    private $zalecenia;

    /**
     * @return string
     */
    public function getZalecenia()
    {
        return $this->zalecenia;
    }

    /**
     * @param string $zalecenia
     */
    public function setZalecenia($zalecenia)
    {
        $this->zalecenia = $zalecenia;
    }


    /**
     * @ORM\ManyToOne(targetEntity="Pacjent", inversedBy="spotkania")
     *
     */

    protected $pacjent;

    /**
     * @return \WsbProject\LogopediaBundle\Entity\Pacjent
     */
    public function getPacjent()
    {
        return $this->pacjent;
    }

    /**
     * @param \WsbProject\LogopediaBundle\Entity\Pacjent $pacjent
     * return Spotkanie
     */
    public function setPacjent($pacjent)
    {
        //$pacjent->setSpotkania($this);
        $this->pacjent = $pacjent;
    }

    /**
     * @ORM\OneToMany(targetEntity="Artykulacja", mappedBy="spotkanie")
     * @var Artykulacje[]
     */

    protected $artykulacje = null;

    /**
     * @ORM\OneToMany(targetEntity="Obrazki", mappedBy="spotkanie")
     * @var Obrazki[]
     */

    protected $obrazki = null;

    /**
     * @return Obrazki[]
     */
    public function getObrazki()
    {
        return $this->obrazki;
    }

    /**
     * @param Obrazki[] $obrazki
     */
    public function setObrazki($obrazki)
    {
        $this->obrazki[] = $obrazki;
    }



    public function __construct()
    {
        $this->artykulacje = new ArrayCollection();
        $this->obrazki = new ArrayCollection();
    }


    /**
     * @return Artykulacja[]
     */
    public function getArtykulacje()
    {
        return $this->artykulacje;
    }

    /**
     * @param Artykulacja[] $artykulacje
     */
    public function setArtykulacje($artykulacje)
    {
        $this->artykulacje[] = $artykulacje;
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
}
