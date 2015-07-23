<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ConfigController extends Controller
{
    /**
     * @Route("/konfiguracja", name="konfiguracja", options={ "expose" = true })
     * @Template("LogopediaBundle:Config:konfiguracja.html.twig")
     */


    public function konfiguracjaAction()
    {
        $name = 'Szymon';

        return array('name' => $name);

    }

    /**
     * @Route("/pobierz_konfiguracje", name="pobierz_konfiguracje", options={ "expose" = true })
     *
     */


    public function pobierz_konfiguracjeAction(Request $request)
    {
        $id = $request->request->get('id');

        $konfiguracja = $this->getDoctrine()->getRepository('LogopediaBundle:Konfiguracja')
            ->find($id);
        //exit(\Doctrine\Common\Util\Debug::dump($konfiguracja));

        $tablica['godzinka'] = $konfiguracja->getGodzinka();
        $tablica['czasOd'] = $konfiguracja->getCzasOd();
        $tablica['czasDo'] = $konfiguracja->getCzasDo();
        $tablica['slot'] = $konfiguracja->getCzasTrwania();

        //exit(\Doctrine\Common\Util\Debug::dump($tablica));


        $tablica = json_encode($tablica);
        return new Response($tablica, 200, array('Content-Type' => 'aplication/json'));

    }
    /**
     * @Route("/popraw_konfiguracje", name="popraw_konfiguracje", options={ "expose" = true })
     *
     */


    public function popraw_konfiguracjeAction(Request $request)
    {
        $godzinka = $request->request->get('godzinka');
        $czasOd = $request->request->get('czasOd');
        $czasDo = $request->request->get('czasDo');
        $slot = $request->request->get('slot');

        $em = $this->getDoctrine()->getManager();

        $konfiguracja = $em->getRepository('LogopediaBundle:Konfiguracja')
            ->find(1);



        //exit(\Doctrine\Common\Util\Debug::dump($konfiguracja));

        $konfiguracja->setGodzinka($godzinka);
        $konfiguracja->setCzasOd($czasOd);
        $konfiguracja->setCzasDo($czasDo);
        $konfiguracja->setCzasTrwania($slot);

        $em->persist($konfiguracja);
        $em->flush();

        //exit(\Doctrine\Common\Util\Debug::dump($tablica));
        $tablica[0] = 'OK';

        $tablica = json_encode($tablica);
        return new Response($tablica, 200, array('Content-Type' => 'aplication/json'));

    }
}
