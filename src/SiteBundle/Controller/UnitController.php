<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use SiteBundle\Form\UnitType;
use SiteBundle\Entity\Unit;

/**
 * @Route("/unit")
 */
class UnitController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'unit_index',
            'show' => 'unit_show',
            'add' => 'unit_add',
            'edit' => 'unit_edit',
            'delete' => 'unit_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('SiteBundle:Unit');
    }
    
    protected function getFormType()
    {
        return new UnitType();
    }

    protected function getNewEntity()
    {
        return new Unit();
    }
    
    /**
     * @Route("/", name="unit_index")
     * @Template("SiteBundle:Unit:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="unit_add")
     * @template("SiteBundle:Unit:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="unit_show")
     * @Template("SiteBundle:Unit:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="unit_edit")
     * @Template("SiteBundle:Unit:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="unit_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    } 
    
    /**
     * @Route("/add/modal", name="unit_add_modal")
     * @Template("SiteBundle:Unit:addModal.html.twig")
     */
    public function addModalAction(Request $request)
    {
        $entity = $this->getNewEntity();
        
        return $this->getForm($request, $entity);
    }
    
    /**
     * @Route("/add/unit/{id}", name="unit_add_building")
     * @Template("SiteBundle:Unit:add.html.twig")
     */
    public function addToBuildingAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $building = $em->getRepository('SiteBundle:Building')->find($id);
        $unit = new Unit();
        $building->addUnit($unit);
        
        $form = $this->createForm(new UnitType(), $unit);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($unit);
            $em->flush();
            
            return $this->redirect($this->generateUrl('building_show', array('id' => $id), 301));
        }
        
        return array('form' => $form->createView());
    }
}
