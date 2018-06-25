<?php
/**
 * Created by PhpStorm.
 * User: Haithem
 * Date: 06/06/2018
 * Time: 17:36
 */

namespace PIDEV\ProjetBundle\Controller;


use PIDEV\UserBundle\Entity\categories;
use PIDEV\UserBundle\Form\categoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{

    function AjoutCategorieAction(Request $request)
    {
        $categorie= new categories();
        $form=$this->createForm(categoriesType::class,$categorie);
        if($form->handleRequest($request)->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('AffichageCateg');

        }
        return $this->render('@PIDEVProjet/Categorie/ajout.html.twig',array('f'=>$form->createView()));
    }


    function listCategorieAction()
    {
        $em=$this->getDoctrine()->getManager();
        $categorie=$em->getRepository('PIDEVUserBundle:categories')->findAll();

        return $this->render('@PIDEVProjet/Categorie/AfficheListeCategorie.html.twig',array('m'=>$categorie));
    }

    function suppAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $categorie=$em->getRepository('PIDEVUserBundle:categories')->find($id);
        $em->remove($categorie);
        $em->flush();
        //return new Response('syyyy avec seccés');
        return $this->redirectToRoute('AffichageCateg');
    }
    function UpdateAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $categorie=$em->getRepository('PIDEVUserBundle:categories')->find($id);
        $form=$this->createForm(categoriesType::class,$categorie);
        if($form->handleRequest($request)->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('AffichageCateg');
        }
        return $this->render('@PIDEVProjet/Categorie/ModifCat.html.twig',array('f'=>$form->createView()));
    }
}