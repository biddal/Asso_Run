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
    /**
     * @Route("/classement", name="classement")
     */
    
    public function classementAction()
    {
        $em = $this->getDoctrine()->getManager();
        // Native query for general classment
        $sql = "SELECT SUM(result.point) as total, SUM(result.times) as ttime, user.lastname, user.firstname "
                . "FROM result "
                . "inner join user on result.id_user = user.id "
                . "inner join run on result.id_run = run.id "
                . "inner join type on user.typ_id = type.id "
                . "WHERE YEAR(CURRENT_DATE()) = 2017 "
                . "GROUP BY user.id "
                . "ORDER BY total DESC ";
        $nativeQuery = $em->getConnection()->prepare($sql);
        $nativeQuery->execute();
        $general_classment = $nativeQuery->fetchAll();
        
        
        return $this->render('classement.html.twig',
                array('generals'          => $general_classment  
                ));       
    }
}
