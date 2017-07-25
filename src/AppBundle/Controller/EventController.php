<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Inscription;
use DateTime;
use Doctrine\DBAL\Types\Type;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /**
     * @Route("/event", name="event")
     */
    public function listAction(Request $request)
    {       
       $em = $this->getDoctrine()->getManager();
       $query = $em->createQuery('SELECT r
                                  FROM AppBundle:Run r
                                  WHERE r.date >= :date'
                                )->setParameter('date', new DateTime('NOW'), Type::DATETIME);       
      $events = $query->getResult();
      if($this->getUser())
      {
       $em1 = $this->getDoctrine()->getManager();
       $query1 = $em1->createQuery('SELECT i
                                  FROM AppBundle:Inscription i
                                  WHERE i.idUser = :user'
                                )->setParameter('user', $this->getUser()->getId());       
      $events1 = $query1->getResult();
      
      return $this->render('event.html.twig',
              array('events'=> $events,'inscriptions'=> $events1
              ));
      }
      else
      {
          
          return $this->render('event.html.twig',
              array('events'=> $events
                  ));
      }
    }
    
    /**
     * @Route("/event/inscription", name="inscriptionevent")
     */
    
    public function inscriptionrunAction(Request $request)
    {
        $idcourse = $request->query->get('idrun');
        $user = $this->getUser();
        $inscription = new Inscription();
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery('SELECT r
                                   FROM AppBundle:Run r 
                                   WHERE r.id = :id'
                                 )->setParameter('id', $idcourse);
        $run = $query->getResult();
        
        $inscription->setIdUser($user);
        $inscription->setIdRun($run[0]);
        
        $em->persist($inscription);
        $em->flush();
        return $this->render('inscriptionevent.html.twig');
    }
    
}