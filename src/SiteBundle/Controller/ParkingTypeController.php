<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudParameterController;

use SiteBundle\Form\ParkingTypeType;
use SiteBundle\Entity\ParkingType;

/**
 * @Route("/parking_type")
 */
class ParkingTypeController extends CrudParameterController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'parking_type_index',
            'show' => 'parking_type_show',
            'add' => 'parking_type_add',
            'edit' => 'parking_type_edit',
            'delete' => 'parking_type_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('SiteBundle:ParkingType');
    }
    
    protected function getFormType()
    {
        return new ParkingTypeType();
    }

    protected function getNewEntity()
    {
        return new ParkingType();
    }
    
    /**
     * @Route("/", name="parking_type_index")
     * @Template("SiteBundle:ParkingType:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="parking_type_add")
     * @template("SiteBundle:ParkingType:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="parking_type_show")
     * @Template("SiteBundle:ParkingType:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="parking_type_edit")
     * @Template("SiteBundle:ParkingType:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="parking_type_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    } 
    
    /**
     * @Route("/add/parking_type/{id}", name="parking_type_add_site")
     * @Template()
     */
    public function addToSiteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('SiteBundle:Site')->find($id);
        
        $unitType = new ParkingType();
        $unitType->addSite($site);
        
        $form = $this->createForm(new ParkingTypeType(), $unitType);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($unitType);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $id), 301));
        }
        
        return $this->render(
            'SiteBundle:ParkingType:add.html.twig', 
            array('form' => $form->createView())
        );
    }
}
