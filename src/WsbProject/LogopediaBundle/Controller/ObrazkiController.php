<?php

namespace WsbProject\LogopediaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use WsbProject\LogopediaBundle\Entity\Obrazki;
use WsbProject\LogopediaBundle\Form\Type\DodajObrazkiType;

class ObrazkiController extends Controller
{
    /**
     * @Route("/dodaj_obrazki", name="dodaj_obrazki", options={"expose"=true})
     * @Template("LogopediaBundle:Obrazki:dodaj_obrazki.html.twig")
     */

    public function dodaj_obrazkiAction()
    {
        if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        } else {
            $user = $this->getUser();
        }
        $obrazki = new Obrazki();
        $form = $this->createForm(new DodajObrazkiType(), $obrazki, array(
            'action' => $this->generateUrl('dodany_obrazek'),
        ));
        return array('form' => $form->createView());


    }
    /**
     * @Route("/dodany_obrazek", name="dodany_obrazek", options={"expose"=true})
     * @Template("LogopediaBundle:Obrazki:dodany_obrazek.html.twig")
     */

    public function dodany_obrazekAction(Request $request)
    {
        $obrazek = new Obrazki();
        $form = $this->createForm(new DodajObrazkiType(), $obrazek);

        $form->handleRequest($request);
        $form->createView();
        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $nowy_obrazek = $form->getData();
            //$nowy_pacjent->setIdWywiadu(0);
            //$nowy_pacjent->setIdDiagnozy(0);

            $em->persist($nowy_obrazek);
            $em->flush();


            return array('nowy_obrazek' => $nowy_obrazek);

        } else {
            return $this->redirectToRoute('dodaj_obrazek');
        }

    }
    /**
     * @Route("/przegladaj_obrazki", name="przegladaj_obrazki", options={"expose"=true})
     * @Template("LogopediaBundle:Obrazki:przegladaj_obrazki.html.twig")
     */

    public function przegladaj_obrazkiAction()
    {
        if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        } else {
            $user = $this->getUser();
        }
        $obrazki = $this->getDoctrine()->getRepository('LogopediaBundle:Obrazki')
            ->findAll();

        $em = $this->getDoctrine()->getManager();

        /*dodajemy
        $spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')
            ->find(51);

        $zestaw = $this->getDoctrine()->getRepository('LogopediaBundle:Obrazki')
            ->find(9);


        $spotkanie->setObrazki($zestaw);

        $em->persist($spotkanie);
        $em->flush();*/

        /* usuwamy
        $spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')
            ->find(51);

        $zestaw = $em->getRepository('LogopediaBundle:Obrazki')
            ->find(9);


        $spotkanie->getObrazki()->removeElement($zestaw);
        $zestaw->setSpotkanie(null);
        $em->flush(); */

        return array('obrazki' => $obrazki);



    }

    /**
     * @Route("/usun_obrazki/{id}", name="usun_obrazki", options={"expose"=true})
     * @Template("LogopediaBundle:Obrazki:usun_obrazki.html.twig")
     */

    public function usun_obrazkiAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $obrazki = $em->getRepository('LogopediaBundle:Obrazki')
            ->find($id);

        if($obrazki) {
            $em->remove($obrazki);
            $em->flush();
        }


        return array('obrazki' => $obrazki);
    }
    /**
     * @Route("/dodaj_dostepny/{id_spotkania}/{id_obrazka}", name="dodaj_dostepny", options={"expose"=true})
     *
     */

    public function dodaj_dostepnyAction($id_spotkania, $id_obrazka)
    {
        $em = $this->getDoctrine()->getManager();

        //dodajemy
        $spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')
            ->find($id_spotkania);

        $zestaw = $this->getDoctrine()->getRepository('LogopediaBundle:Obrazki')
            ->find($id_obrazka);


        $spotkanie->setObrazki($zestaw);

        $em->persist($spotkanie);
        $em->flush();


        return $this->redirectToRoute('sptk', array('id_spotkania' => $id_spotkania));



    }
    /**
     * @Route("/usun_przypisany/{id_spotkania}/{id_obrazka}", name="usun_przypisany", options={"expose"=true})
     *
     */

    public function usun_przypisanyAction($id_spotkania, $id_obrazka)
    {
        $em = $this->getDoctrine()->getManager();

        //usuwamy
        $spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')
            ->find($id_spotkania);

        $zestaw = $em->getRepository('LogopediaBundle:Obrazki')
            ->find($id_obrazka);


        $spotkanie->getObrazki()->removeElement($zestaw);
        $zestaw->setSpotkanie(null);
        $em->flush();



        return $this->redirectToRoute('sptk', array('id_spotkania' => $id_spotkania));



    }
}
