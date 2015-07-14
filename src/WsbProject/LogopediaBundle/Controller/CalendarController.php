<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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

        $dane = new Zdarzenia();

        $start = new \DateTime($request->get('start'));
        //$start->createFromFormat('ATOM', $request->get('start'),$time_zone);

        $end = new \DateTime($request->get('end'));
        //$end->createFromFormat('ATOM', $request->get('end'),$time_zone);

        $dane->setTitle($request->get('title'));

        $dane->setDescription($request->get('description'));
        $dane->setLocation($request->get('location'));
        $dane->setContact($request->get('contact'));
        $dane->setUrl($request->get('url'));
        $dane->setStart($start);
        $dane->setEnd($end);
        $dane->setAlldayevent($request->get('alldayevent'));

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
}