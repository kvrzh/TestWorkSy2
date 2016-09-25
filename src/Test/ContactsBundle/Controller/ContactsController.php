<?php

namespace Test\ContactsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Test\ContactsBundle\Entity\Contacts;
use Test\ContactsBundle\Form\ContactsType;

/**
 * Contacts controller.
 *
 * @Route("/Contacts")
 */
class ContactsController extends Controller
{
    /**
     * Lists all Contacts entities.
     *
     * @Route("/", name="Contacts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('TestContactsBundle:Contacts')->findAll();

        return $this->render('contacts/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new Contacts entity.
     *
     * @Route("/new", name="Contacts_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contact = new Contacts();
        $form = $this->createForm('Test\ContactsBundle\Form\ContactsType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('Contacts_show', array('id' => $contact->getIdContacts()));
        }

        return $this->render('contacts/new.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contacts entity.
     *
     * @Route("/{id}", name="Contacts_show")
     * @Method("GET")
     */
    public function showAction(Contacts $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);

        return $this->render('contacts/show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contacts entity.
     *
     * @Route("/{id}/edit", name="Contacts_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Contacts $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);
        $editForm = $this->createForm('Test\ContactsBundle\Form\ContactsType', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('Contacts_edit', array('id' => $contact->getIdContacts()));
        }

        return $this->render('contacts/edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contacts entity.
     *
     * @Route("/{id}", name="Contacts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Contacts $contact)
    {
        $form = $this->createDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('Contacts_index');
    }

    /**
     * Creates a form to delete a Contacts entity.
     *
     * @param Contacts $contact The Contacts entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contacts $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Contacts_delete', array('id' => $contact->getIdContacts())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
