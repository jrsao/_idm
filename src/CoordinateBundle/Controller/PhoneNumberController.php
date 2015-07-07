<?php

namespace CoordinateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CoordinateBundle\Form\PhoneNumberType;
use CoordinateBundle\Entity\PhoneNumber;

/**
 * @Route("/phone_number")
 */
class PhoneNumberController extends CrudBaseController
{
 protected function getRoutes()
    {
        return array(
            'index' => 'phone_number_index',
            'show' => 'phone_number_show',
            'add' => 'phone_number_add',
            'edit' => 'phone_number_edit',
            'delete' => 'phone_number_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('PersonBundle:PhoneNumber');
    }
    
    protected function getFormType()
    {
        return new PhoneNumberType();
    }

    protected function getNewEntity()
    {
        return new PhoneNumber();
    }
    
    /**
     * @Route("/", name="phone_number_index")
     * @Template("PersonBundle:PhoneNumber:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="phone_number_add")
     * @template("PersonBundle:PhoneNumber:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="phone_number_show")
     * @Template("PersonBundle:PhoneNumber:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="phone_number_edit")
     * @Template("PersonBundle:PhoneNumber:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="phone_number_delete")
     * @Template("PersonBundle:PhoneNumber:delete.html.twig")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    
    /**
     * @Route("/add/person/{id}", name="phone_number_person_add")
     * @Template()
     */
    public function addToPersonAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $person = $em->getRepository('PersonBundle:Person')->find($id);
        $phoneNumber = new PhoneNumber();
        $form = $this->createForm(new PhoneNumberType(), $phoneNumber);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $phoneNumber->setPerson($person);
            
            $em->persist($phoneNumber);
            $em->flush();
            
            return $this->redirect($this->generateUrl('client_show', array('id' => $person->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:PhoneNumber:add.html.twig', 
            array(
                'form' => $form->createView(),
                'entity' => $person
            )
        );
    }

        
    /**
     * @Route("/add/site/{id}", name="phone_number_site_add")
     * @Template()
     */
    public function addToSiteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('SiteBundle:Site')->find($id);
        $phoneNumber = new PhoneNumber();
        $form = $this->createForm(new PhoneNumberType(), $phoneNumber);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $phoneNumber->setSite($site);
            
            $em->persist($phoneNumber);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $site->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:PhoneNumber:add.html.twig', 
            array(
                'form' => $form->createView(),
                'entity' => $site
            )
        );
    }
}
