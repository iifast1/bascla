<?php

namespace ApresVenteBundle\Controller;

use ApresVenteBundle\Entity\Reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;


/**
 * Reclamation controller.
 *
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclamations = $em->getRepository('ApresVenteBundle:Reclamation')->findAll();

        return $this->render('reclamation/index.html.twig', array(
            'reclamations' => $reclamations,
        ));
    }

    /**
     * Creates a new reclamation entity.
     *
     */
    public function newAction(Request $request)
    {
        $reclamation = new Reclamation();
        $form = $this->createForm('ApresVenteBundle\Form\ReclamationType', $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

// TWILIO SMS NOTIFICATION

            $msg=" Mr. Mohamed Amine Ben Taieb ,
             Votre Reclamation est effectué avec success - Service ApresVente - Bascla";
           //$tel='+216'.'96464420';
            $tel='+216'.'95802430';


            $twilio = $this->get('twilio.api');

            $message = $twilio->account->messages->sendMessage(
               '+17814297119',
                //OLD1 ACCOUNT '+12058903415',
               // OLD2  '+13346058266', // From a Twilio number in your account
                $tel, // Text any number
                $msg);
            $otherInstance = $twilio->createInstance('BBBB', 'CCCCC');



            return $this->redirectToRoute('Av_Reclamation_show', array('id' => $reclamation->getId()));

        }

        return $this->render('reclamation/new.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reclamation entity.
     *
     */
    public function showAction(Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);

        return $this->render('reclamation/show.html.twig', array(
            'reclamation' => $reclamation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reclamation entity.
     *
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);
        $editForm = $this->createForm('ApresVenteBundle\Form\ReclamationType', $reclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Av_Reclamation_edit', array('id' => $reclamation->getId()));
        }

        return $this->render('reclamation/edit.html.twig', array(
            'reclamation' => $reclamation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reclamation entity.
     *
     */
    public function deleteAction(Request $request, Reclamation $reclamation)
    {
        $form = $this->createDeleteForm($reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('Av_Reclamation_index');
    }

    /**
     * Creates a form to delete a reclamation entity.
     *
     * @param Reclamation $reclamation The reclamation entity
     *
     * @return Form The form
     */
    private function createDeleteForm(Reclamation $reclamation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Av_Reclamation_delete', array('id' => $reclamation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
