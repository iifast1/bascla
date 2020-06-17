<?php

namespace ApresVenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApresVenteBundle:Default:index.html.twig');
    }
}
