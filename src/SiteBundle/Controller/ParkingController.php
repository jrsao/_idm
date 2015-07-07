<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use SiteBundle\Form\ParkingType;
use SiteBundle\Entity\Parking;

/**
 * @Route("/parking")
 */
class ParkingController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'parking_index',
            'show' => 'parking_show',
            'add' => 'parking_add',
            'edit' => 'parking_edit',
            'delete' => 'parking_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('SiteBundle:Parking');
    }
    
    protected function getFormType()
    {
        return new ParkingType();
    }

    protected function getNewEntity()
    {
        return new Parking();
    }
    
    /**
     * @Route("/", name="parking_index")
     * @Template("SiteBundle:Parking:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="parking_add")
     * @template("SiteBundle:Parking:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="parking_show")
     * @Template("SiteBundle:Parking:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="parking_edit")
     * @Template("SiteBundle:Parking:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="parking_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    } 
    
    /**
     * @Route("/add/parking/{id}", name="parking_add_site")
     * @Template("SiteBundle:Parking:add.html.twig")
     */
    public function addToSiteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('SiteBundle:Site')->find($id);
        
        $parking = new Parking();
        $site->addParking($parking);
        
        $form = $this->createForm(new ParkingType(), $parking);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($parking);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $id), 301));
        }
        
        return  array('form' => $form->createView(), 'siteId' => $site->getId());
    }
}
