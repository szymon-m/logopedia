<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class SpotkanieController extends Controller
{

    /**
     * @Route("/dzisiaj", name="dzisiaj", options={"expose"=true})
     * @Template("LogopediaBundle:Spotkanie:dzisiaj.html.twig")
     */
    public function dzisiajAction() {

        $time_zone = new \DateTimeZone('UTC');
        $time_zone->getName();

        // definiujemy dzisiejszy dzień

        $poczatek = new \DateTime();
        $poczatek->setTime(00,00,00);

        $koniec = new \DateTime();
        $koniec->setTime(23,59,59);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT s, p
                 FROM LogopediaBundle:Spotkanie s
                  JOIN s.idPacjenta p
                  WHERE s.start >= :poczatek
                  AND s.end <= :koniec
                  ORDER BY s.start ASC')
            ->setParameters(array('poczatek'=> $poczatek,'koniec'=> $koniec));

        $dzisiaj = $query->getResult();

        return array('dzisiaj' => $dzisiaj);
    }
    /**
     * @Route("/spotkanie/{id}/{id_pacjenta}", name="spotkanie", options={"expose"=true})
     * @Template("LogopediaBundle:Spotkanie:spotkanie.html.twig")
     */
    public function spotkanieAction($id, $id_pacjenta) {

        return array('dzisiaj' => $dzisiaj);

    }





    public function poprzednieAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function zapisz_spotkanieAction($name) {

        return $this->render('', array('name' => $name));
    }
}
