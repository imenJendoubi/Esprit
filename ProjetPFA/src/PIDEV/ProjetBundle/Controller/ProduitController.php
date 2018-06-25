<?php
/**
 * Created by PhpStorm.
 * User: Haithem
 * Date: 21/04/2018
 * Time: 14:48
 */

namespace PIDEV\ProjetBundle\Controller;


use PIDEV\UserBundle\Entity\Produit;
use PIDEV\UserBundle\Form\ProduitType22;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PIDEV\UserBundle\Form\ProduitType;
use PIDEV\UserBundle\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class ProduitController extends Controller
{

    function AjoutProduitAction(Request $request)
    {
        $produit= new Produit();
        $ref="";
        $form=$this->createForm(ProduitType::class,$produit);
        if($form->handleRequest($request)->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            if($produit->getCategorie()=='Animaux'){
                $ref=  $produit->setReference('AN'.$produit->getId());
                $em->flush();

            }elseif ($produit->getCategorie()=='Hygienes'){
                $ref=  $produit->setReference('HG'.$produit->getId());
                $em->flush();

            }
            return $this->redirect('../app_dev.php/afficheP');



        }
        return $this->render('@PIDEVProjet/Produit/List.html.twig',array('f'=>$form->createView()));
    }




    function listProduitAction()
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->findAll();

        return $this->render('@PIDEVProjet/Produit/AfficheListeProduit.html.twig',array('m'=>$produit));
    }

    function suppAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->find($id);
        $em->remove($produit);
        $em->flush();
        //return new Response('syyyy avec seccés');
        return $this->redirectToRoute('AffichageProduit');
    }



    function UpdateAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->find($id);
        $form=$this->createForm(ProduitType::class,$produit);
        if($form->handleRequest($request)->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute('AffichageProduit');
        }
        return $this->render('@PIDEVProjet/Produit/ajoutModif.html.twig',array('f'=>$form->createView()));
    }

    function RechercheAction(Request $req)
    {
        $prod= new Produit();
        //$form=$this->createForm(RechType::class,$mark);
        $form=$this->createForm(ProduitType22::class,$prod);
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->findAll();
        if($form->handleRequest($req)->isValid())
        {
            $produit=$em->getRepository('PIDEVUserBundle:Produit')->findBy(
                array('nomP'=>$prod->getNomP())
            );
        }
        return $this->render('@PIDEVProjet/Produit/Recherche.html.twig',array('m'=>$produit,'form'=>$form->createView()));

    }


    function IndexAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->find($id);
        return $this->render('@PIDEVProjet/Produit/Produit.html.twig',array('m'=>$produit));
    }

    function PesentationProduitAction()
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->findAll();
        return $this->render('@PIDEVProjet/Produit/ProduitPresentation.html.twig',array('m'=>$produit));
    }


   // function listCatAction()
    //{
        //$em=$this->getDoctrine()->getManager();
       // $produits=$em->getRepository('PIDEVUserBundle:Produit')->Cat();

      //  return $this->render('@PIDEVProjet/Produit/ListeCategorie.html.twig',array('m'=>$produits));
    //}

    function listCatAction()
    {
        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository('PIDEVUserBundle:categories')->findAll();

        return $this->render('@PIDEVProjet/Produit/ListeCategorie.html.twig',array('m'=>$produits));
    }


    function CategorieTrieAction($categorie)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository('PIDEVUserBundle:Produit')->ByCat($categorie);
        return $this->render('@PIDEVProjet/Produit/ProduitPresentation.html.twig',array('m'=>$produit));
    }
}