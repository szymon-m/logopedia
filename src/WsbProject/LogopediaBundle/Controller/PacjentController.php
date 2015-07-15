<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use WsbProject\LogopediaBundle\Entity\Pacjent;
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

        $this->addFlash('notice', 'Zapisano nowego pacjenta');
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

        $form -> handleRequest($request);
        $form ->createView();
        if($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $nowy_pacjent = $form->getData();
            $nowy_pacjent->setIdWywiadu(0);
            $nowy_pacjent->setIdDiagnozy(0);

            $em->persist($nowy_pacjent);
            $em->flush();


            return array('nowy_pacjent'=> $nowy_pacjent);

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

        $form -> handleRequest($request);
        $form ->createView();
        if($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $nowy_pacjent = $form->getData();
            $nowy_pacjent->setIdWywiadu(0);
            $nowy_pacjent->setIdDiagnozy(0);

            $em->persist($nowy_pacjent);
            $em->flush();


            return array('nowy_pacjent'=> $nowy_pacjent);

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


        if($pacjenci) {

            return array('pacjenci'=> $pacjenci);

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


        if($pacjent) {


            $diagnoza = $this->getDoctrine()->getRepository('LogopediaBundle:Diagnoza')
                ->findOneBy(array('idPacjenta' => $id));

            //$wywiad = $this->getDoctrine()->getRepository('LogopediaBundle:Wywiad')
            //    ->findOneBy(array('id_pacjenta' => $))

            return array('pacjent'=> $pacjent, 'diagnoza'=> $diagnoza);

        } else {

            $this->addFlash('notice', 'Nie znaleziono pacjenta');
            return $this->redirectToRoute('przegladaj_pacjentow');

        }


    }

}
