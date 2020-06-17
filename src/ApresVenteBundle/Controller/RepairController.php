<?php

namespace ApresVenteBundle\Controller;

use ApresVenteBundle\Entity\Repair;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Repair controller.
 *
 */
class RepairController extends Controller
{
    /**
     * Lists all repair entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repairs = $em->getRepository('ApresVenteBundle:Repair')->findAll();

        return $this->render('repair/index.html.twig', array(
            'repairs' => $repairs,
        ));
    }

    public function mobileallAction(){

       // $reclamation= new Repair();
        $em = $this->getDoctrine()->getManager();
        $clubb="select * from repair;";


        $resultt=$em->getConnection()->prepare($clubb);
        $resultt->execute();        $serializer=new  Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($resultt);
        return new JsonResponse($formatted);
    }

    /**
     * Creates a new repair entity.
     *
     */
    public function newAction(Request $request)
    {
        $repair = new Repair();
        $form = $this->createForm('ApresVenteBundle\Form\RepairType', $repair);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($repair);
            $em->flush();

            return $this->redirectToRoute('Av_Repair_show', array('id' => $repair->getId()));
        }

        return $this->render('repair/new.html.twig', array(
            'repair' => $repair,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a repair entity.
     *
     */
    public function showAction(Repair $repair)
    {
        $deleteForm = $this->createDeleteForm($repair);

        return $this->render('repair/show.html.twig', array(
            'repair' => $repair,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing repair entity.
     *
     */
    public function editAction(Request $request, Repair $repair)
    {
        $deleteForm = $this->createDeleteForm($repair);
        $editForm = $this->createForm('ApresVenteBundle\Form\RepairType', $repair);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Av_Repair_edit', array('id' => $repair->getId()));
        }

        return $this->render('repair/edit.html.twig', array(
            'repair' => $repair,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a repair entity.
     *
     */
    public function deleteAction(Request $request, Repair $repair)
    {
        $form = $this->createDeleteForm($repair);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($repair);
            $em->flush();
        }

        return $this->redirectToRoute('Av_Repair_index');
    }

    /**
     * Creates a form to delete a repair entity.
     *
     * @param Repair $repair The repair entity
     *
     * @return Form The form
     */
    private function createDeleteForm(Repair $repair)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Av_Repair_delete', array('id' => $repair->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function new2Action(Request $request){

        $em = $this->getDoctrine()->getManager();
        $user = new Repair();
       $user->setId($em->getRepository('ApresVenteBundle:Repair')->find($request->get('id')));

        $user -> setRepairStatus($request->get('RepairStatus'));
        $user -> setRepairDescription($request->get('RepairDescription'));



        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);
    }
}
