<?php

namespace WsbProject\LogopediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template("LogopediaBundle:Default:index.html.twig")
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    /**
     * @Route("/artykulacja", name="artykulacja")
     * @Template("LogopediaBundle:Default:artykulacja.html.twig")
     */
    public function artykulacjaAction()
    {
        $text = "To jest formularz artykulacji";

        return array('text'=> $text);


    }

}
