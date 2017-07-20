<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Result;
use AppBundle\Entity\Run;
use AppBundle\Form\ResultType;
use AppBundle\Form\RunType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    
    public function indexAction()
    {
       
        return $this->render('admin.html.twig');
    }
    
    /**
     * @Route("/admin/addrun", name="addrun")
     */
    
    public function addrunAction(Request $request)
    {
       // 1) build the form
        $addrun = new Run();
        $form = $this->createForm(RunType::class, $addrun);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($addrun);
            $em->flush();

            return $this->redirectToRoute('admin');
        }
        return $this->render(
            'addrun.html.twig',
            array('form' => $form->createView())
        );
    }
    
    /**
     * @Route("/admin/addrslt", name="addrslt")
     */
    
    public function selectrunAction(Request $request)
    {  
        $em0= $this->getDoctrine()->getManager();
        $query0 = $em0->createQuery('SELECT r
                                   FROM AppBundle:Run r
                                   WHERE r.validate = :bool
                                   ')->setParameter('bool',0)  ;    
        $events0 = $query0->getResult();

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT i
                                   FROM AppBundle:Inscription i
                                 ');       
        $events = $query->getResult();
        

        $rslt = new Result();
        $form = $this->createForm(ResultType::class, $rslt);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($rslt);
            $em->flush();

            return $this->redirectToRoute('login');
        }
        
        return $this->render('addrslt.html.twig',
                array('events'=> $events, 
                      'form' => $form->createView(),
                       'validate' => $events0
                ));

        
        
    }
    
    
}