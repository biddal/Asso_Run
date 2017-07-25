<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    
    public function indexAction()
    {
       
        return $this->render('index.html.twig');
    }
    
    /**
     * @Route("/resultat", name="resultat")
     */
    
    public function rsltAction(Request $request)
    {      
        $em0= $this->getDoctrine()->getManager();
        $query0 = $em0->createQuery('SELECT r
                                   FROM AppBundle:Run r
                                   WHERE r.validate = :bool
                                   ')->setParameter('bool',1)  ;    
        $events0 = $query0->getResult();

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT re
                                   FROM AppBundle:Result re
                                 ');       
        $events = $query->getResult();        

        // 2) handle the submit (will only happen on POST)
        
        
        return $this->render('resultat.html.twig',
                array('events'=> $events, 
                      'validate' => $events0
                ));

        
        
    }
}
