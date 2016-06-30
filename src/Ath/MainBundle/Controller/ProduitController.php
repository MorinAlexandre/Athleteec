<?php

namespace Ath\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    /**
     * @Route("/associations", name="ath_list_association")
     */
    public function indexAction(Request $request, $page) {

        //$form = $this->createForm(new SportsFormType());
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AthMainBundle:Produit')->getProduitList($page,6);

        foreach ($produits as $produit) {
            $produit->getCategorieProduit();
        }
        $produits_count = $em->getRepository('AthMainBundle:Produit')->countProduit();

        $pagination = array(
            'page' => $page,
            'route' => 'ath_list_produits',
            'pages_count' => ceil($produits_count / 6),
            'route_params' => array()
        );

        return $this->render('@ath_views/Ath/Produit/index.html.twig', array(
            'produits' => $produits,
            'pagination' => $pagination
        ));
    }

    /**
     * @Route("/associations/{id}", name="ath_page_association")
     */
    public function pageAction($id) {
        $em = $this->getDoctrine()->getManager();
        $association = $em->getRepository('AthUserBundle:User')->getAssociation($id);

        if ($association) {
            $association = $association[0];
        }

        //$association->getUserFollow();

        return $this->render('@ath_views/Ath/Association/page.html.twig', array(
            'association' => $association
        ));
    }
}