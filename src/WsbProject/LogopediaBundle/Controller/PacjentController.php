<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
class PacjentController extends Controller
{
    /**
     * @Route("/dodaj_pacjenta", name="dodaj_pacjenta", options={"expose"=true})
     * @Template("LogopediaBundle:Pacjent:dodaj_pacjenta.html.twig")
     */
    public function dodaj_pacjentaAction()
    {
        return $this->render(
            'LogopediaBundle:Pacjent:dodaj_pacjenta.html.twig'
        );
    }
}
