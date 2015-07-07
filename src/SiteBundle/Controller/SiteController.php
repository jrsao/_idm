<?php

namespace SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;
use SiteBundle\Entity\Site;
use SiteBundle\Form\SiteType;

/**
 * @Route("/site")
 */
class SiteController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'site_index',
            'show' => 'site_show',
            'add' => 'site_add',
            'edit' => 'site_edit',
            'delete' => 'site_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('SiteBundle:Site');
    }
    
    protected function getFormType()
    {
        return new SiteType();
    }

    protected function getNewEntity()
    {
        return new Site();
    }
    
    /**
     * @Route("/", name="site_index")
     * @Template("SiteBundle:Site:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="site_add")
     * @template("SiteBundle:Site:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="site_show")
     * @Template("SiteBundle:Site:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="site_edit")
     * @Template("SiteBundle:Site:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="site_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
}
