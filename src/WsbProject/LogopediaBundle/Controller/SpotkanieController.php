<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WsbProject\LogopediaBundle\Entity\Artykulacja;


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
                  JOIN s.pacjent p
                  WHERE s.start >= :poczatek
                  AND s.end <= :koniec
                  ORDER BY s.start ASC')
            ->setParameters(array('poczatek'=> $poczatek,'koniec'=> $koniec));

        $dzisiaj = $query->getResult();
        //exit(\Doctrine\Common\Util\Debug::dump($dzisiaj));
        return array('dzisiaj' => $dzisiaj);

    }
    /**
     * @Route("/sptk/{id_spotkania}", name="sptk", options={"expose"=true})
     *
     */
    public function sptkAction($id_spotkania) {

        $spotkanie = $this->getDoctrine()->getRepository('LogopediaBundle:Spotkanie')
            ->find($id_spotkania);

        $id_pacjenta = $spotkanie->getPacjent()->getId();

        return $this->redirectToRoute('spotkanie', array('id'=> $id_spotkania, 'id_pacjenta'=> $id_pacjenta));

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
        // ============================= też działa

        $query = $em->createQuery(
            'SELECT o, s, p
                 FROM LogopediaBundle:Obrazki o
                 JOIN o.spotkanie s
                 JOIN s.pacjent p
                WHERE p.id = :id_pacjenta
                AND s.id = :id_spotkania')
            ->setParameters(array('id_pacjenta'=> $id_pacjenta, 'id_spotkania' => $id));

        $obrazki = $query->getResult();

        //exit(\Doctrine\Common\Util\Debug::dump($obrazki));


        //=================== działajace
        $query = $em->createQuery(
            'SELECT s, p, o
                 FROM LogopediaBundle:Spotkanie s
                 JOIN s.pacjent p
                 JOIN s.obrazki o
                WHERE p.id = :id_pacjenta
                AND s.id = :id_spotkania')
            ->setParameters(array('id_pacjenta'=> $id_pacjenta, 'id_spotkania' => $id));

        $spotkanie = $query->getResult();

        //exit(\Doctrine\Common\Util\Debug::dump($obrazki));
        return array('spotkanie' => $spotkanie, 'obrazki'=> $obrazki);


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

    /**
     * @Route("/zapisz_artykulacje", name="zapisz_artykulacje", options={"expose"=true})
     *
     */
    public function zapisz_artykulacjeAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $id_spotkania = $dane['0'];


        $spotkanie = $this->getDoctrine()
            ->getRepository('LogopediaBundle:Spotkanie')
            ->find($id_spotkania);


        $artykulacja = new Artykulacja();

        foreach($dane as $key => $value) {

            if($key == '0') {
                continue;
            }

            if($key != '0') {

                $artykulacja->setValue('a',$key, $value);

            }

        }
        /* --- do oodczytania wartośći
        for($i = 1; $i <= 24; ++$i) {

            $temp = $artykulacja->getValue('a',$i);
            for($j = 0; $j <= 4; ++$j) {

                $text = str_split($temp);

                if($text[$j]=='1') { $tablica[$i*($j+1)] = true; }

                else {
                    $tablica[$i*($j+1)] = false;
                }



            }

        }*/

        $artykulacja->setSpotkanie($spotkanie);


        $em = $this->getDoctrine()->getManager();

        $em->persist($artykulacja);
        $em->flush();

        $dane = json_encode($dane);

        return new Response($dane, 200, array('Content-Type' => 'application/json'));


    }

    /**
     * @Route("/pobierz_ostatnia_artykulacje", name="pobierz_ostatnia_artykulacje", options={"expose"=true})
     *
     */

    public function pobierz_ostatnia_artykulacjeAction(Request $request) {

        $id_pacjenta = $request->request->get('id_pacjenta');
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $time_zone = new \DateTimeZone('UTC');
        $time_zone->getName();

        // definiujemy dzisiejszy dzień

        $poczatek = new \DateTime();
        //$poczatek->setTime(00,00,00);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT a, s, p
                 FROM LogopediaBundle:Artykulacja a
                  JOIN a.spotkanie s
                  JOIN s.pacjent p
                  WHERE p.id = :id_pacjenta
                  AND s.start < :poczatek
                  ORDER BY s.id DESC')
            ->setParameters(array('id_pacjenta'=> $id_pacjenta,'poczatek'=> $poczatek));




        $artykulacja = $query->setMaxResults(1)->getOneOrNullResult();

        //exit(\Doctrine\Common\Util\Debug::dump($artykulacja));
        if($artykulacja) {

            $position = 1;

            for($i = 1; $i <= 24; ++$i) {

                $temp = $artykulacja->getValue('a',$i);



                for($j = 0; $j <= 4; ++$j) {

                    $text = str_split($temp);
                    if($text[$j]=='1') {
                        $tablica[$position] = 1;
                        $position += 1;
                    }

                    else {
                        $tablica[$position] = 0;
                        $position += 1;
                    }
                }
            }
            //exit(\Doctrine\Common\Util\Debug::dump($tablica));
            $tablica = json_encode($tablica);
            return new Response($tablica, 200, array('Content-Type' => 'aplication/json'));

        }
        return array('spotkanie'=> $spotkanie);

    }

    /**
     * @Route("/usun_spotkanie/{id_spotkania}", name="usun_spotkanie", options={"expose"=true})
     */

    public function usun_spotkanieAction($id_spotkania) {


        $em = $this->getDoctrine()->getManager();
        $artykulacja = $em->getRepository('LogopediaBundle:Artykulacja')
            ->find($id_spotkania);

        if($artykulacja) {

            $em->remove($artykulacja);
            $em->flush();

        }

        $em = $this->getDoctrine()->getManager();
        $spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')->find($id_spotkania);


        $em->remove($spotkanie);
        $em->flush();

        $status = [];
        $status[0] = 'done';

        $status = json_encode($status);

        return new Response($status, 200, array('Content-Type' => 'aplication/json'));


    }
}

