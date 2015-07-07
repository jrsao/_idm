<?php

namespace CoordinateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use CoordinateBundle\Form\AddressType;
use CoordinateBundle\Entity\Address;

/**
 * @Route("/address")
 */
class AddressController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'address_index',
            'show' => 'address_show',
            'add' => 'address_add',
            'edit' => 'address_edit',
            'delete' => 'address_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('CoordinateBundle:Address');
    }
    
    protected function getFormType()
    {
        return new AddressType();
    }

    protected function getNewEntity()
    {
        return new Address();
    }
    
    /**
     * @Route("/", name="address_index")
     * @Template("CoordinateBundle:Address:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
    
    private function addFromPersonChild(Request $request, $id, $entityType)
    {
        $address = new Address();
        $form = $this->createForm(new AddressType(), $address);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $person = $em->getRepository('PersonBundle:Person')->find($id);
            
            if ($person == null) {
                throw new Exception('personId is invalid, no '.$entityType.' found in the function addAction from AddressController');
            }
            
            $person->addAddress($address);
            $address->setPerson($person);
            
            $em->persist($address);
            $em->flush();
            
            //
            return $this->redirect($this->generateUrl('client_show', array('id' => $person->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:Address:add.html.twig', 
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/add/person/{id}", name="address_person_add")
     * @Template()
     */
    public function addFromPersonAction(Request $request, $id)
    {
        return $this->addFromPersonChild($request, $id, 'person');
    }
    
    /**
     * @Route("/add/client/{id}", name="address_client_add")
     * @Template()
     */
    public function addFromClientAction(Request $request, $id)
    {
        return $this->addFromPersonChild($request, $id, 'client');
    }
    
    /**                                                                                   
    * @Route("/ajax/{id}", name="site_address_ajax")
    */
    public function ajaxAction(Request $request, $id)    
    {
        if ($request->isXMLHttpRequest()) {         
            return new JsonResponse(array('data' => 'this is a json response'));
        }

        return new Response('This is not ajax!', 400);
    }
 
    /**
     * @Route("/add/site/{id}", name="address_site_add")
     * @Template()
     */
    public function addFromSiteAction(Request $request, $id)
    {
        if ($request->isXMLHttpRequest()) {
        }
        if ($id == 0){
            throw new Exception('id is needed in the function addAction from AddressController');
        }
        
        $address = new Address();
        $form = $this->createForm(new AddressType(), $address);
        $form->add('save', 'submit');

        if ($form->handleRequest($request)->isValid() || $request->isXMLHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            
            $site = $em->getRepository('SiteBundle:Site')->find($id);
            
            if ($site == null) {
                throw new Exception('siteId is invalid  in the function addAction from AddressController');
            }
            
            $site->addAddress($address);
            $address->setSite($site);
            
            $em->persist($address);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $site->getId()), 301));
        }
        
        return $this->render(
            'CoordinateBundle:Address:add.html.twig', 
            array('form' => $form->createView())
        );
    }
            
    /**
     * @Route("/show/{id}", name="address_show")
     * @Template("CoordinateBundle:Address:show.html.twig")
     */
    public function showAction($id)
    {
        $entity = $this->getDoctrine()     
            ->getRepository('CoordinateBundle:Address')
            ->find($id);
        
        return array('entity' => $entity);
    }
    /**
     * @Route("/edit")
     * @Template()
     */
    public function editAction(Request $request, $id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/update")
     * @Template()
     */
    public function updateAction()
    {
        return array(
                // ...
            );    }

}
