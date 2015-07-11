<?php

namespace WsbProject\LogopediaBundle\Controller;

use ClassesWithParents\G;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use WsbProject\LogopediaBundle\Entity\Ajax;
use WsbProject\LogopediaBundle\Entity\Artykulacja;
use WsbProject\LogopediaBundle\Entity\Gloski;
use WsbProject\LogopediaBundle\Entity\Spotkanie;
use WsbProject\LogopediaBundle\Form\GloskiType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GloskiController extends Controller
{

    /**
     * @Route("/nowe_gloski", name="nowe_gloski")
     * @param $name
     * @return array
     */


    public function nowegloskiAction()
    {
        $gloski = new Gloski();
        //$form = $this->createForm(new GloskiType(), $gloski), array(
        //    'action' => $this->generateUrl('dodaj_gloski'),
        //    'method' => 'POST',
        //));
        $form = $this->createForm(new GloskiType(), $gloski);
        return array('form' => $form->createView());
    }
    /**
     * @Route("/dodaj_gloski", name="dodaj_gloski")
     * @Template("LogopediaBundle:Gloski:dodajgloski.html.twig")
     */


    public function dodajgloskiAction(Request $request)
    {
       /* $request = Request::createFromGlobals();

        $nie = $request->request->get('nie');
        $naglos = $request->request->get('naglos');
        $srodglos = $request->request->get('srodglos');
        $wyglos = $request->request->get('wyglos');
        $grupa = $request->request->get('grupaSpolgloskowa');

        $gloski = new Gloski();
        $gloski->setNie($nie);
        $gloski->setNaglos($naglos);
        $gloski->setSrodglos($srodglos);
        $gloski->setWyglos($wyglos);
        $gloski->setGrupaSpolgloskowa($grupa);

        exit(\Doctrine\Common\Util\Debug::dump($gloski));
        if($form->isValid()) {

            $em = $this->getDoctrine()->getManager('LogopediaBundle:Gloski');
            $gloska = $form->getData();

            $em->persist($gloska);
            $em->flush();


*/

        $gloska = new Gloski();
        $form = $this->createForm(new GloskiType(), $gloska);

        $form->handleRequest($request);
        $form->createView();
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $gloski = $form->getData();
            $em->persist($gloski);
            $em->flush();

            return new Response('Dodano głoske '. $gloski->getId());

        } else {

            $request->getSession()
                ->getFlashBag()
                ->add('failure', 'Nie możesz dodać takiego aktora!');


        }






        return new Response('Dodano głoske '. $gloska->getId());
    }
    /**
     * @Route("/dodaj_gloski_ajax", name="dodaj_gloski_ajax", options={"expose"=true})
     * @Template()
     */
    public function dodajgloskiajaxAction(Request $request)
    {

        $nie = (int)$request->request->get('nie');
        $nag = (int)$request->request->get('nag');
        /*
        if($request->request->has('nie')) {
            $nie = (int)$request->request->get('nie');

        } else { $nie = 0; };

        if($request->request->has("nag")) {
            $nag = (int)$request->request->get('nag');

        } else { $nag = 0; }
        if($request->request->has("sro")) {
            $sro = (int)$request->request->get('sro');

        } else { $sro = 0; };
        if($request->request->has("wyg")) {
            $wyg = (int)$request->request->get('wyg');

        } else { $wyg = 0; };
        if($request->request->has("grp")) {
            $grp = (int)$request->request->get('grp');

        } else { $grp = 0; };
        */
        //$text = $nie . $nag . $sro . $wyg . $grp;
        $dane = $request->getContent();

        $text = $nie . $nag;
        /*foreach($dane as $k) {

            $text .= 'key'.$k . '';
    }*/
        //exit(\Doctrine\Common\Util\Debug::dump($request));
        return new Response($text, 200, array('Content-Type' => 'text/html'));

    }
    /**
     * @Route("/dodaj", name="dodaj", options={"expose"=true})
     * @Template()
     */
    public function dodajAction(Request $request) {

        $dane = $request->request->all();
        $dane_wyjsciowe = \Doctrine\Common\Util\Debug::dump($dane);

        $spotkanie = new Spotkanie();


        $artykulacja = new Artykulacja();

        foreach($dane as $key => $value) {

            $artykulacja->setValue('a',$key,$value);
        }



        $em = $this->getDoctrine()->getManager();

        $em->persist($artykulacja);
        $em->flush();

        $rodzaj_danych = $request->getContentType();
        $zawartosc = $request->getContent();

        $odpowiedz = $rodzaj_danych . "</br>" . $zawartosc;

        $dane = json_encode($dane);



        return new Response($dane, 200, array('Content-Type' => 'application/json'));


    }
    /**
     * @Route("/id_diagnozy"), name="id_diagnozy")
     */
    public function id_diagnozyAction() {

        $id_diagnozy = $this->getDoctrine()
            ->getRepository('LogopediaBundle:Ajax')
            ->findAll();

        $response = '';

        foreach($id_diagnozy as $dane) {

            //$response .="<option value=' ".$dane->getId()." '>".$dane->getId()."</option>";
            $response .='<option value='.$dane->getId().'>'.$dane->getId().'</option>';
        }
        return new Response($response,200, array('Content-Type'=> 'text/html'));
    }
    /**
     * @Route("/poprzedni", name="poprzedni")
     *
     */
     public function pobierz_poprzedniAction(Request $request) {

         $id_ajax = (int)$request->request->get('id_ajax');

         //$obiekt = new Ajax();

         $em = $this->getDoctrine()->getManager();
         $query = $em->createQuery(
             'SELECT f
                  FROM LogopediaBundle:Ajax f
                  WHERE f.id = :id_ajax'
         )
             ->setParameter('id_ajax', $id_ajax);

         $obiekt = $query->getSingleResult();


         /*for ($i = 1; $i <= 4; $i++) {

             $temp = $obiekt->getValue('a',$i);

             $tablica[$i] = str_split($temp);

         }*/

         for($i = 1; $i <= 4; ++$i) {

             $temp = $obiekt->getValue('a',$i);
             for($j = 0; $j <= 4; ++$j) {

                 $text = str_split($temp);

                 if($text[$j]=='1') { $tablica[$i*($j+1)] = true; }

                 else {
                     $tablica[$i*($j+1)] = false;
                 }



             }

         }

         $tablica = json_encode($tablica);
         return new Response($tablica, 200, array('Content-Type' => 'aplication/json'));


     }

};

