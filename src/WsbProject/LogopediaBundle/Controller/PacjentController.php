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
     * @Route("/usun_pacjenta", name="usun_pacjenta", options={"expose"=true})
     * @Template("LogopediaBundle:Pacjent:usun_pacjenta.html.twig")
     */
    public function usun_pacjentaAction(Request $request)
    {
        $pacjent = new Pacjent();
        $form = $this->createForm(new DodajPacjentaType(), $pacjent);

        $form->handleRequest($request);
        $form->createView();
        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $nowy_pacjent = $form->getData();
            $nowy_pacjent->setIdWywiadu(0);
            $nowy_pacjent->setIdDiagnozy(0);

            $em->persist($nowy_pacjent);
            $em->flush();


            return array('nowy_pacjent' => $nowy_pacjent);

        } else {
            return $this->redirectToRoute('dodaj_pacjenta');
        }


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


        $pacjent = $this->getDoctrine()->getRepository('LogopediaBundle:Pacjent')
            ->find($id);


        if ($pacjent) {


            $diagnoza = $this->getDoctrine()->getRepository('LogopediaBundle:Diagnoza')
                ->findOneBy(array('pacjent' => $id));

            $wywiad = $this->getDoctrine()->getRepository('LogopediaBundle:Wywiad')
                ->findOneBy(array('pacjent' => $id));

            return array('pacjent' => $pacjent, 'diagnoza' => $diagnoza, 'wywiad' => $wywiad);

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
}
