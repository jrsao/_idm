<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudParameterController;

use SiteBundle\Form\UnitTypeType;
use SiteBundle\Entity\UnitType;

/**
 * @Route("/unit_type")
 */
class UnitTypeController extends CrudParameterController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'unit_type_index',
            'add' => 'unit_type_add',
            'edit' => 'unit_type_edit',
            'delete' => 'unit_type_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('SiteBundle:UnitType');
    }
    
    protected function getFormType()
    {
        return new UnitTypeType();
    }

    protected function getNewEntity()
    {
        return new UnitType();
    }
    
    /**
     * @Route("/", name="unit_type_index")
     * @Template("SiteBundle:UnitType:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="unit_type_add")
     * @template("SiteBundle:UnitType:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="unit_type_show")
     * @Template("SiteBundle:UnitType:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="unit_type_edit")
     * @Template("SiteBundle:UnitType:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="unit_type_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    } 
    
    /**
     * @Route("/add/unit_type/{id}", name="unit_type_add_site")
     * @Template()
     */
    public function addToSiteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('SiteBundle:Site')->find($id);
        
        $unitType = new UnitType();
        $unitType->addSite($site);
        
        $form = $this->createForm(new UnitTypeType(), $unitType);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($unitType);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $id), 301));
        }
        
        return $this->render(
            'SiteBundle:UnitType:add.html.twig', 
            array('form' => $form->createView())
        );
    }
}
