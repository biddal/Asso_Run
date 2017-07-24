<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Result;
use AppBundle\Entity\Run;
use AppBundle\Entity\User;
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

        // 2) handle the submit (will only happen on POST)
        if ($request->isXmlHttpRequest())
        {
            $idRun      = $request->request->get('idrun');
            $user_id    = $request->request->get('iduser');
            $time       = $request->request->get('time');
            $points     = $request->request->get('point');            

            $meeting    = $this->getDoctrine()->getRepository(Run::class)->findOneBy(['id' => $idRun]);
            $user       = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id' => $user_id]);
            $result     = $this->getDoctrine()->getRepository(Result::class)->findOneBy(['idUser' => $user_id, 'idRun' => $idRun]);
            
            if($result)
            {
                $rslt = $result;
                $rslt->setTimes($time);
                $rslt->setPoint($points);
            }
            else
            {
                $rslt = new Result();

                $rslt->setTimes($time);
                $rslt->setIdRun($meeting);
                $rslt->setIdUser($user);
                $rslt->setPoint($points);           
            }
            $em->persist($rslt);
            $em->flush(); 
        }
        
        return $this->render('addrslt.html.twig',
                array('events'=> $events, 
                      'validate' => $events0
                ));

        
        
    }
    
    
}