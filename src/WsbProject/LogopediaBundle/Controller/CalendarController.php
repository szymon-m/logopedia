<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use WsbProject\LogopediaBundle\Entity\EventEntity;
use WsbProject\LogopediaBundle\Entity\Spotkanie;
use WsbProject\LogopediaBundle\Entity\Zdarzenia;
use WsbProject\LogopediaBundle\Event\CalendarEvent;

class CalendarController extends Controller
{
    /**
     * Dispatch a CalendarEvent and return a JSON Response of any events returned.
     * @Route("/fc-load-calendar-events", name="fullcalendar_loader", options={"expose"=true})
     * @param Request $request
     * @return Response
     */
    public function loadCalendarAction(Request $request)
    {
        $time_zone = new \DateTimeZone('UTC');
        $time_zone->getName();

        $startDatetime = new \DateTime();
        $startDatetime->createFromFormat('ATOM', $request->get('start'),$time_zone);
        //$startDatetime->format('Y-m-d\TH:i:sP');
        //$startDatetime->setTimestamp($request->get('start'));

        $endDatetime = new \DateTime();
        //$endDatetime->setTimestamp($request->get('end'));
        $endDatetime->createFromFormat('ATOM', $request->get('end'),$time_zone);


        $events = $this->container->get('event_dispatcher')->dispatch(CalendarEvent::CONFIGURE, new CalendarEvent($startDatetime, $endDatetime, $request))->getEvents();

        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-Type', 'application/json');

        $return_events = array();

        foreach($events as $event) {
            $return_events[] = $event->toArray();
        }

        $response->setContent(json_encode($return_events));

        return $response;
    }
    /**
     * @Route("/dodaj_zdarzenie", name="dodaj_zdarzenie", options={"expose"=true})
     * @param Request $request
     * @return Response
     */
    public function dodajZdarzenieAction(Request $request)
    {
        $time_zone = new \DateTimeZone('UTC');
        $time_zone->getName();

        $dane = new Spotkanie();

        $start = new \DateTime($request->get('start'));
        //$start->createFromFormat('ATOM', $request->get('start'),$time_zone);

        $end = new \DateTime($request->get('end'));
        //$end->createFromFormat('ATOM', $request->get('end'),$time_zone);

        $id_pacjenta = $request->get('id_pacjenta');

        $pacjent = $this->getDoctrine()->getRepository('LogopediaBundle:Pacjent')
            ->find($id_pacjenta);

        //exit(\Doctrine\Common\Util\Debug::dump($pacjent));

        $dane->setUwagi($request->get('uwagi'));
        $dane->setStart($start);
        $dane->setEnd($end);
        $dane->setAllday($request->get('alldayevent'));
        $dane->setFirst($request->get('first'));
        $dane->setDone($request->get('done'));
        $dane->setPacjent($pacjent);

        $em = $this->getDoctrine()->getManager();

        $em->persist($dane);
        $em->flush();

        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-Type', 'application/json');

        $response->setContent(json_encode($dane));

        return $response;
    }
    /**
     * @Route("/kalendarz", name="kalendarz", options={"expose"=true})
     * @Template("LogopediaBundle:Default:kalendarz.html.twig")
     */
    public function kalendarzAction() {

        $name = "Szymon";
        return array('name' => $name);


    }

    /**
     * @Route("/pobierz_pacjentow", name="pobierz_pacjentow", options={"expose"=true})
     *
     */
    public function pobierz_pacjentowAction() {

        $pacjenci = $this->getDoctrine()->getRepository('LogopediaBundle:Pacjent')
            ->findAll();

        $pacjenci_wyjscie = '';

        foreach ($pacjenci as $pacjent) {

            $nazwa = $pacjent->getImie().'  '.$pacjent->getNazwisko();

            $pacjenci_wyjscie .= '<option value="'.$pacjent->getId().'">'.$nazwa.'</option>';
        }


        return new Response($pacjenci_wyjscie, 200, array('Content-Type' => 'text/html'));

    }

    /**
     * @Route("/popraw_zdarzenie", name="popraw_zdarzenie", options={"expose"=true})
     * @param Request $request
     * @return Response
     */
    public function popraw_zdarzenieAction(Request $request)
    {
        $dane = $request->request->all();
        //exit (\Doctrine\Common\Util\Debug::dump($dane));
        $time_zone = new \DateTimeZone('UTC');
        $time_zone->getName();

        $start = new \DateTime($request->request->get('start'));
        //$start->createFromFormat('ATOM', $request->get('start'),$time_zone);

        $end = new \DateTime($request->request->get('end'));
        //$end->createFromFormat('ATOM', $request->get('end'),$time_z

        $id_spotkania = $dane['id_spotkania'];
        //$start = $dane['start'];
        //$end = $dane['end'];


        $em = $this->getDoctrine()->getManager();

        $spotkanie = $em->getRepository('LogopediaBundle:Spotkanie')
            ->find($id_spotkania);

        $spotkanie->setStart($start);
        $spotkanie->setEnd($end);

        $em->flush();

        $dane = json_encode($dane);

        return new Response($dane, 200, array('Content-Type' => 'application/json'));



    }

}