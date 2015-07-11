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
     * @Route("/kalendarz")
     * @Template()
     */
    public function kalendarzAction($name)
    {
        return array('name' => $name);
    }

}
