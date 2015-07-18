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

        /*$repository = $this->getDoctrine()->getRepository('LogopediaBundle:Spotkanie');

        $query = $repository->createQueryBuilder('s')
            ->where('s.start >= :poczatek')
            ->andWhere('s.end <= :koniec')
            ->setParameter('poczatek', $poczatek)
            ->setParameter('koniec', $koniec)
            ->orderBy('s.start', 'ASC')
            ->getQuery();

        $spotkania = $query->getResult();

        //$pacjenci = $spotkania->getPacjent(); */

        //exit(\Doctrine\Common\Util\Debug::dump($spotkania));

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p, s
                 FROM LogopediaBundle:Pacjent p
                  JOIN p.spotkania s
                  WHERE s.start >= :poczatek
                  AND s.end <= :koniec
                  ORDER BY s.start ASC')
            ->setParameters(array('poczatek'=> $poczatek,'koniec'=> $koniec));

        $dzisiaj = $query->getResult();
        exit(\Doctrine\Common\Util\Debug::dump($dzisiaj));
        return array('dzisiaj' => $dzisiaj);

    }
    /**
     * @Route("/spotkanie/{id}/{id_pacjenta}", name="spotkanie", options={"expose"=true})
     * @Template("LogopediaBundle:Spotkanie:spotkanie.html.twig")
     */
    public function spotkanieAction($id, $id_pacjenta) {




        $em = $this->getDoctrine()->getManager();
        /*
        $query = $em->createQuery(
            'SELECT a, s
                 FROM LogopediaBundle:Artykulacja a
                 JOIN a.idSpotkania s
                 WHERE a.idSpotkania = :id_spotkania')
            ->setParameter('id_spotkania', $id);

        $artykulacja = $query->getResult();

        $query = $em->createQuery(
            'SELECT z, s, p
                 FROM LogopediaBundle:Zalecenia z
                 JOIN z.idSpotkania s
                 JOIN s.idPacjenta p
                WHERE s.idPacjenta = :id_pacjenta')
                ->setParameter('id_pacjenta', $id_pacjenta);

        $zalecenia = $query->getResult();
        */

        $query = $em->createQuery(
            'SELECT s, p
                 FROM LogopediaBundle:Spotkanie s
                 JOIN s.pacjent p
                WHERE p.id = :id_pacjenta')
            ->setParameter('id_pacjenta', $id_pacjenta);

        $spotkanie = $query->getResult();

        //exit(\Doctrine\Common\Util\Debug::dump($pacjent));

        return array('spotkanie' => $spotkanie);

        /*return array('spotkanie'=>$spotkanie);

        /*$em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT s, o
                 FROM LogopediaBundle:Spotkanie s
                 JOIN s.idObrazki o
                 WHERE s.id = :id_spotkania')
            ->setParameter('id_spotkania', $id);

        $spotkanie = $query->getResult();

        $spotkanie = $this->getDoctrine()->getRepository('LogopediaBundle:Spotkanie')
            ->find($id);

        exit(\Doctrine\Common\Util\Debug::dump($spotkanie));

        if($spotkanie) {


            $obrazki = $this->getDoctrine()->getRepository('LogopediaBundle:Obrazki')
                ->findOneBy(array('idSpotkania' => $id));


            $artykulacja = $this->getDoctrine()->getRepository('LogopediaBundle:Artykulacja')
                ->findOneBy(array('idSpotkania' => $id));

            $zalecenia = $this->getDoctrine()->getRepository('LogopediaBundle:Zalecenia')
                ->findOneBy(array('idSpotkania' => $id));

            return array('spotkanie' => $spotkanie);

            } else {

                $this->addFlash('notice', 'Nie znaleziono pacjenta');
                return $this->redirectToRoute('przegladaj_pacjentow');

            }
        } */

    }





    public function poprzednieAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function zapisz_spotkanieAction($name) {

        return $this->render('', array('name' => $name));
    }
}
