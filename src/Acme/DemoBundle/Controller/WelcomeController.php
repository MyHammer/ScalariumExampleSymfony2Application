<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        $thingRepository = $this->getDoctrine()->getRepository('AcmeDemoBundle:Thing');
        $thing = $thingRepository->findOneByValue('Hello World');
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig',
                             array('thing' => $thing));
    }
}
