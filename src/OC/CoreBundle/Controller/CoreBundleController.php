<?php

namespace OC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//pour le message flash
use Symfony\Component\HttpFoundation\Response;

class CoreBundleController extends Controller
{
    public function indexAction()
    {

        $listAdverts = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OCPlatformBundle:Advert')
            ->myFindAll()
            ;

        return $this->render('OCCoreBundle:CoreBundle:index.html.twig',
        array('listAdverts' => $listAdverts)
        );

    }

    public function contactAction(Request $request)
    {
        //$session = $request->getSession();

        // Bien sûr, cette méthode devra réellement ajouter l'annonce
        // Le « flashBag » est ce qui contient les messages flash dans la session
        // Il peut bien sûr contenir plusieurs messages :
        $request->getSession()->getFlashBag()->add('info', 'Pas encore de contacts !');

        $request->getSession()->getFlashBag()->add('info', 'Oui oui, ca va venir !');

        // Puis on redirige vers la page de visualisation de cette annonce
        return $this->redirectToRoute('oc_core_homepage');

        //return $this->render('OCCoreBundle:CoreBundle:contact.html.twig');


    }


}
