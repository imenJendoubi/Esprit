<?php
/**
 * Created by PhpStorm.
 * User: Haithem
 * Date: 26/04/2018
 * Time: 17:20
 */

namespace PIDEV\ProjetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PanierController extends Controller
{
    public function supprimerPanAction($id, Request $request)
    {
        $session= $request->getSession();
        $panier = $session->get('panier');
        if (array_key_exists($id,$panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
        }
        return $this->redirect($this->generateUrl('Panier'));
    }
    public function ajouterAction($id, Request $request)
    {
        $session= $request->getSession();
        if (!$session->has('panier')) $session->set('panier',array());


        $panier = $session->get('panier');
        if (array_key_exists($id,$panier))
        {
            if($request->query->get('qte')!= null)
                $panier['id'] = $request->query->get('qte');

        }else
        {
            if($request->query->get('qte')!= null)
                $panier[$id] = $request->query->get('qte');


            else
                $panier[$id]=1;

        }
        $session->set('panier',$panier);

        return $this->redirect($this->generateUrl('Panier'));
    }

    function PanierAction(Request $request)
    {
        $session= $request->getSession();
        if (!$session->has('panier')) $session->set('panier',array());

        $em = $this->getDoctrine()->getManager();
        $produit= $em->getRepository('PIDEVUserBundle:Produit')->findArray(array_keys($session->get('panier')));

        return $this->render('@PIDEVProjet/Panier/Panier.html.twig',array('produit'=>$produit,'panier'=>$session->get('panier')));
    }

    function LivraisonAction()
    {
        return $this->render('@PIDEVProjet/Panier/Livraison.html.twig');
    }

    function ValidationAction()
    {
        return $this->render('@PIDEVProjet/Panier/Validation.html.twig');
    }

}