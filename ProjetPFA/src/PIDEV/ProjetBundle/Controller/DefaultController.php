<?php

namespace PIDEV\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PIDEVProjetBundle:Default:index.html.twig');
    }
}
