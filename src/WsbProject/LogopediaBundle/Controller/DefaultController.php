<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @Route("/artykulacja", name="artykulacja")
     * @Template("LogopediaBundle:Default:artykulacja.html.twig")
     */
    public function artykulacjaAction()
    {
        $text = "To jest formularz artykulacji";

        return array('text'=> $text);


    }
    /**
     * @Route("/pobierz_pacjenta", name="pobierz_pacjenta", options={"expose"=true})
     * @Template("LogopediaBundle:Default:pobierz_pacjenta.html.twig")
     *
     */
    public function pobierzpacjentaAction() {

        $request = Request::createFromGlobals();
        $q  = $request->query->get('term');
        //exit(\Doctrine\Common\Util\Debug::dump($q));

        //$em = $this->getDoctrine()->getManager()
        //    ->getRepository("LogopediaBundle:Pacjent");


        $em = $this->getDoctrine()->getManager(); // DQL



        if($q) {
            $query = $em->createQuery(
                "SELECT p
                 FROM LogopediaBundle:Pacjent p
                 WHERE p.imie LIKE :imie")
                 //WHERE p.imie LIKE '%:imie%'  nie działa
                 //WHERE p.imie LIKE :imie OR p.nazwisko LIKE :imie") nie działa
                    ->setParameter('imie', $q);

            $pacjenci = $query->getResult();




            /* $pacjenci = $em->createQueryBuilder('p')
                 ->where("p.imie LIKE '%:imie%'")
                 ->setParameter('imie', $q)
                 ->getQuery()
                 ->getResult(); */
        } else { $pacjenci = $em->findAll(); }

                //$query = $em->createQuery(
                //    'SELECT p
                //      FROM LogopediaBundle:Pacjent p
                //      WHERE p.imie LIKE :q_imie')
                //->setParameter('q_imie', $q);

        //$dane = $query->getResult();

        $list = array();

        //$label = $dane->getImie();
        //$value = $dane->getId();

                    //$list['label']= "Szymon";//$label;
                    //$list['value'] = "1";//$value;

        foreach($pacjenci as $pacjent) {

            array_push($list,array("value" => $pacjent->getImie().' '.$pacjent->getNazwisko(), "label"=> $pacjent->getImie().' '.$pacjent->getNazwisko(), "id" => $pacjent->getId()) );

            //$list['label'] = $pacjent->getImie().' '.$pacjent->getNazwisko();
            //$list['value'] = $pacjent->getId();

        }

        $list = json_encode($list);
        return new Response($list, 200, array('Content-Type' => 'application/json'));
    }

}
