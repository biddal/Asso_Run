<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Run;
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
    
    public function addrsltAction()
    {
       
        return $this->render('addrslt.html.twig');
    } 
}