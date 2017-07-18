<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DateTime;
use Doctrine\DBAL\Types\Type;

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
      return $this->render('event.html.twig',
              array('events'=> $events
              ));
    }
}