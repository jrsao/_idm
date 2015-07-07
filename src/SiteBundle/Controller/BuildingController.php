<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use SiteBundle\Form\BuildingType;
use SiteBundle\Entity\Building;

/**
 * @Route("/building")
 */
class BuildingController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'building_index',
            'show' => 'building_show',
            'add' => 'building_add',
            'edit' => 'building_edit',
            'delete' => 'building_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('SiteBundle:Building');
    }
    
    protected function getFormType()
    {
        return new BuildingType();
    }

    protected function getNewEntity()
    {
        return new Building();
    }
    
    /**
     * @Route("/", name="building_index")
     * @Template("SiteBundle:Building:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="building_add")
     * @template("SiteBundle:Building:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="building_show")
     * @Template("SiteBundle:Building:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="building_edit")
     * @Template("SiteBundle:Building:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="building_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    } 
    
    /**
     * @Route("/add/building/{id}", name="building_add_site")
     * @Template("SiteBundle:Building:add.html.twig")
     */
    public function addToSiteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('SiteBundle:Site')->find($id);
        
        $building = new Building();
        $site->addBuilding($building);
        
        $form = $this->createForm(new BuildingType(), $building);
        $form->add('save', 'submit');
        
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($building);
            $em->flush();
            
            return $this->redirect($this->generateUrl('site_show', array('id' => $id), 301));
        }
        
        return  array('form' => $form->createView(), 'siteId' => $site->getId());
    }
}
