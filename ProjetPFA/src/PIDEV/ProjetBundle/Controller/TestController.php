<?php
/**
 * Created by PhpStorm.
 * User: Haithem
 * Date: 28/03/2018
 * Time: 17:42
 */

namespace PIDEV\ProjetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{

    public function indexAction()
    {
        return $this->render('@PIDEVProjet/Template/Layout.html.twig');
    }
    public function index2Action()
    {
        return $this->render('@PIDEVProjet/Template/dashboard.html.twig');
    }


}