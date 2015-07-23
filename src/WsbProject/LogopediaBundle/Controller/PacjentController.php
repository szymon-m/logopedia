<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use WsbProject\LogopediaBundle\Entity\Diagnoza;
use WsbProject\LogopediaBundle\Entity\Pacjent;
use WsbProject\LogopediaBundle\Entity\Wywiad;
use WsbProject\LogopediaBundle\Form\Type\DodajPacjentaType;

class PacjentController extends Controller
{
    /**
     * @Route("/dodaj_pacjenta", name="dodaj_pacjenta", options={"expose"=true})
     * @Template("LogopediaBundle:Pacjent:dodaj_pacjenta.html.twig")
     */
    public function dodaj_pacjentaAction()
    {
        if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        } else {
            $user = $this->getUser();
        }

        $pacjent = new Pacjent();
        $form = $this->createForm(new DodajPacjentaType(), $pacjent, array(
            'action' => $this->generateUrl('dodany_pacjent'),
        ));

        //$this->addFlash('notice', 'Zapisano nowego pacjenta');
        return array('form' => $form->createView());

    }

    /**
     * @Route("/dodany_pacjent", name="dodany_pacjent", options={"expose"=true})
     * @Template("LogopediaBundle:Pacjent:dodano_pacjenta.html.twig")
     */
    public function dodany_pacjentAction(Request $request)
    {
        $pacjent = new Pacjent();
        $form = $this->createForm(new DodajPacjentaType(), $pacjent);

        $form->handleRequest($request);
        $form->createView();
        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $nowy_pacjent = $form->getData();
            //$nowy_pacjent->setIdWywiadu(0);
            //$nowy_pacjent->setIdDiagnozy(0);

            $em->persist($nowy_pacjent);
            $em->flush();


            return array('nowy_pacjent' => $nowy_pacjent);

        } else {
            return $this->redirectToRoute('dodaj_pacjenta');
        }


    }

    /**
     * @Route("/usun_pacjenta/{id}", name="usun_pacjenta", options={"expose"=true})
     *
     */
    public function usun_pacjentaAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT d
                 FROM LogopediaBundle:Diagnoza d
                  WHERE d.pacjent = :id
              ')
            ->setParameter('id', $id);

        $diagnoza = $query->setMaxResults(1)->getOneOrNullResult();


        if($diagnoza) {

            $em->remove($diagnoza);
            $em->flush();

        }

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT w
                 FROM LogopediaBundle:Wywiad w
                  WHERE w.pacjent = :id
              ')
            ->setParameter('id', $id);

        $wywiad = $query->setMaxResults(1)->getOneOrNullResult();


        if($wywiad) {

            $em->remove($wywiad);
            $em->flush();

        }

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT s
                 FROM LogopediaBundle:Spotkanie s
                 JOIN s.pacjent p
                  WHERE p.id = :id
              ')
            ->setParameter('id', $id);

        $spotkania = $query->getResult();

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT a
                 FROM LogopediaBundle:Pacjent a
                  WHERE a.id = :id
              ')
            ->setParameter('id', $id);


        $pacjent = $query->setMaxResults(1)->getOneOrNullResult();


        //exit(\Doctrine\Common\Util\Debug::dump($spotkania));
        foreach($spotkania as $spotkanie) {

            $pacjent->getSpotkania()->removeElement($spotkanie);
            $spotkanie->setPacjent(null);
            $em->flush();
        }









        if($pacjent) {

            $em->remove($pacjent);
            $em->flush();


            //$em = $this->getDoctrine()->getManager();
            //$spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')->find($id_spotkania);


            $em->remove($pacjent);
            $em->flush();


        //===================
        /*$spotkanie = $this->getDoctrine()->getRepository('LogopediaBundle:Spotkanie')
            ->find($id_spotkania);


        if($spotkanie->getDone() == 1) {


        }

        if($spotkanie->getDone() == 0) {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                'SELECT a
                 FROM LogopediaBundle:Artykulacja a
                  WHERE a.spotkanie = :id_spotkania')
                ->setParameter('id_spotkania',$id_spotkania);

            $artykulacje = $query->getResult();

            foreach($artykulacje as $artykulacja) {

                $spotkanie->getArtykulacje()->removeElement($artykulacja);
                $artykulacja->setSpotkanie(null);

            }

            $em->flush();
        //}



        /*

        $spotkanie->getObrazki()->removeElement($zestaw);
        $zestaw->setSpotkanie(null);
        $em->flush(); */

        }

        return $this->redirectToRoute('przegladaj_pacjentow');

    }

    /**
     * @Route("/przegladaj_pacjentow", name="przegladaj_pacjentow", options={"expose"=true})
     * @Template("LogopediaBundle:Pacjent:przegladaj_pacjentow.html.twig")
     */
    public function przegladaj_pacjentowAction()
    {


        $pacjenci = $this->getDoctrine()->getRepository('LogopediaBundle:Pacjent')
            ->findAll();


        if ($pacjenci) {

            return array('pacjenci' => $pacjenci);

        } else {
            return new Response('Nie znaleziono żadnych pacjentów!');
        }


    }

    /**
     * @Route("/pacjent/{id}", name="pacjent", options={"expose"=true})
     * @Template("LogopediaBundle:Pacjent:pacjent.html.twig")
     */
    public function pacjentAction($id)
    {
        if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        } else {
            $user = $this->getUser();
        }

        $pacjent = $this->getDoctrine()->getRepository('LogopediaBundle:Pacjent')
            ->find($id);

        $spotkanie = $this->getDoctrine()->getRepository('LogopediaBundle:Spotkanie')
            ->findBy(array('pacjent'=>$id));



        if ($pacjent) {


            $diagnoza = $this->getDoctrine()->getRepository('LogopediaBundle:Diagnoza')
                ->findOneBy(array('pacjent' => $id));

            $wywiad = $this->getDoctrine()->getRepository('LogopediaBundle:Wywiad')
                ->findOneBy(array('pacjent' => $id));

            return array('pacjent' => $pacjent, 'diagnoza' => $diagnoza, 'wywiad' => $wywiad, 'spotkanie'=> $spotkanie);

        } else {

            $this->addFlash('notice', 'Nie znaleziono pacjenta');
            return $this->redirectToRoute('przegladaj_pacjentow');

        }


    }

    /**
     * @Route("/pobierz_wywiad", name="pobierz_wywiad", options={"expose"=true})
     *
     */
    public function pobierz_wywiadAction(Request $request)
    {
        $id_pacjenta = (int)$request->request->get('id');
        //$id_pacjenta = $id;

        //$wywiad = new Wywiad();

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT w
                 FROM LogopediaBundle:Wywiad w
                 WHERE w.pacjent = :id_pacjenta')
            ->setParameter('id_pacjenta', $id_pacjenta);

        $wywiad = $query->getSingleResult();


        $tablica = [];

        for ($i = 1; $i <= 21; ++$i) {

            $temp = $wywiad->getValue('b', $i);

            $tablica[$i] = $temp;


        }

        $tablica[0] = $wywiad->getId();
        $tablica = json_encode($tablica);
        //exit(\Doctrine\Common\Util\Debug::dump($tablica));
        return new Response($tablica, 200, array('Content-Type' => 'aplication/json'));


    }

    /**
     * @Route("/zapisz_wywiad", name="zapisz_wywiad", options={"expose"=true})
     *
     */
    public function zapisz_wywiadAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $id_pacjenta = $dane['0'];


        $pacjent = $this->getDoctrine()
            ->getRepository('LogopediaBundle:Pacjent')
            ->find($id_pacjenta);


        $wywiad = new Wywiad();

        for ($i = 1; $i <= 17; ++$i) {

            $dane[$i] = (int)$dane[$i];

        }

        foreach ($dane as $key => $value) {

            if ($key == '0') {
                continue;
            }

            if ($key != '0') {


                $wywiad->setValue('b', $key, $value);

            }

        }

        $wywiad->setPacjent($pacjent);


        $em = $this->getDoctrine()->getManager();

        $em->persist($wywiad);
        $em->flush();

        $dane = json_encode($dane);

        return new Response($dane, 200, array('Content-Type' => 'application/json'));


    }

    /**
     * @Route("/popraw_wywiad", name="popraw_wywiad", options={"expose"=true})
     *
     */
    public function popraw_wywiadAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $id_pacjenta = $dane['0'];


        $pacjent = $this->getDoctrine()
            ->getRepository('LogopediaBundle:Pacjent')
            ->find($id_pacjenta);

        $em = $this->getDoctrine()->getManager();
        $wywiad = $em->getRepository('LogopediaBundle:Wywiad')
            ->findOneBy(array('pacjent' => (int)$id_pacjenta));

        for ($i = 1; $i <= 17; ++$i) {

            $dane[$i] = (int)$dane[$i];

        }


        foreach ($dane as $key => $value) {

            if ($key == '0') {

                continue;
            }

            if ($key != '0') {


                $wywiad->setValue('b', $key, $value);

            }

        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $dane = json_encode($dane);

        return new Response($dane, 200, array('Content-Type' => 'application/json'));


    }

    /**
     * @Route("/zapisz_diagnoze", name="zapisz_diagnoze", options={"expose"=true})
     *
     */
    public function zapisz_diagnozeAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $id_pacjenta = $dane['id_pacjenta'];


        $pacjent = $this->getDoctrine()
            ->getRepository('LogopediaBundle:Pacjent')
            ->find($id_pacjenta);



        $diagnoza = new Diagnoza();
        $diagnoza->setTresc($dane['tresc']);
        $diagnoza->setData(new \DateTime());
        $diagnoza->setPacjent($pacjent);

        $em = $this->getDoctrine()->getManager();

        $em->persist($diagnoza);
        $em->flush();
        $status = [];
        $status[0] = 'done';

        $status = json_encode($status);

        return new Response($status, 200, array('Content-Type' => 'aplication/json'));

    }

    /**
     * @Route("/popraw_diagnoze", name="popraw_diagnoze", options={"expose"=true})
     *
     */
    public function popraw_diagnozeAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $id_pacjenta = $dane['id_pacjenta'];


        $pacjent = $this->getDoctrine()
            ->getRepository('LogopediaBundle:Pacjent')
            ->find($id_pacjenta);

        $em = $this->getDoctrine()->getManager();
        $diagnoza = $em->getRepository('LogopediaBundle:Diagnoza')
            ->findOneBy(array('pacjent' => (int)$id_pacjenta));


        $diagnoza->setTresc($dane['tresc']);
        $diagnoza->setData(new \DateTime());
        $diagnoza->setPacjent($pacjent);


        $em->persist($diagnoza);
        $em->flush();
        $status = [];
        $status[0] = 'done';

        $status = json_encode($status);

        return new Response($status, 200, array('Content-Type' => 'aplication/json'));

    }
    /**
     * @Route("/pobierz_diagnoze", name="pobierz_diagnoze", options={"expose"=true})
     *
     */
    public function pobierz_diagnozeAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));

        $id_pacjenta = $dane['id_pacjenta'];

        $em = $this->getDoctrine()->getManager();
        $diagnoza = $em->getRepository('LogopediaBundle:Diagnoza')
            ->findOneBy(array('pacjent' => (int)$id_pacjenta));

        $text = $diagnoza->getTresc();

        return new Response($text, 200, array('Content-Type' => 'text/html'));

    }
}
