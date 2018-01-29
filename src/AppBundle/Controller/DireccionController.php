<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Direccion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Direccion controller.
 *
 * @Route("direccion")
 */
class DireccionController extends Controller
{
    /**
     * Lists all direccion entities.
     *
     * @Route("/", name="direccion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $direccions = $em->getRepository('AppBundle:Direccion')->findAll();

        return $this->render('direccion/index.html.twig', array(
            'direccions' => $direccions,
        ));
    }

    /**
     * Creates a new direccion entity.
     *
     * @Route("/new", name="direccion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $direccion = new Direccion();
        $form = $this->createForm('AppBundle\Form\DireccionType', $direccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direccion);
            $em->flush();

        $this->addFlash(
            'notice',
            '¡Dirección añadida!'
        );

            return $this->redirectToRoute('direccion_show', array('id' => $direccion->getId()));
        }

        return $this->render('direccion/new.html.twig', array(
            'direccion' => $direccion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a direccion entity.
     *
     * @Route("/{id}", name="direccion_show")
     * @Method("GET")
     */
    public function showAction(Direccion $direccion)
    {
        $deleteForm = $this->createDeleteForm($direccion);

        return $this->render('direccion/show.html.twig', array(
            'direccion' => $direccion,
            'delete_form' => $deleteForm->createView(),
        ));


    }

    /**
     * Displays a form to edit an existing direccion entity.
     *
     * @Route("/{id}/edit", name="direccion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Direccion $direccion)
    {
        $deleteForm = $this->createDeleteForm($direccion);
        $editForm = $this->createForm('AppBundle\Form\DireccionType', $direccion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

        $this->addFlash(
            'notice',
            '¡Tus cambios se han guardado!'
        );

            return $this->redirectToRoute('direccion_edit', array('id' => $direccion->getId()));

        }



        return $this->render('direccion/edit.html.twig', array(
            'direccion' => $direccion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a direccion entity.
     *
     * @Route("/{id}", name="direccion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Direccion $direccion)
    {
        $form = $this->createDeleteForm($direccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($direccion);
            $em->flush();
        }

        $this->addFlash(
            'notice',
            '¡Direccion eliminada!'
        );

        return $this->redirectToRoute('direccion_index');
    }

    /**
     * Creates a form to delete a direccion entity.
     *
     * @param Direccion $direccion The direccion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Direccion $direccion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_delete', array('id' => $direccion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
