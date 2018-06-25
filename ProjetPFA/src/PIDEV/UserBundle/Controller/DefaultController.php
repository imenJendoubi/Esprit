<?php

namespace PIDEV\UserBundle\Controller;

use PIDEV\UserBundle\PIDEVUserBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
     return $this->render('@PIDEVProjet/Template/Layout.html.twig');
    }
}
