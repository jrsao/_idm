<?php

namespace TaxeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudParameterController;

use TaxeBundle\Form\TaxeType;
use TaxeBundle\Entity\Taxe;

/**
 * @Route("/taxe")
 */
class TaxeController extends CrudParameterController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'taxe_index',
            'add' => 'taxe_add',
            'edit' => 'taxe_edit',
            'delete' => 'taxe_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('TaxeBundle:Taxe');
    }
    
    protected function getFormType()
    {
        return new TaxeType();
    }

    protected function getNewEntity()
    {
        return new Taxe();
    }
    
    /**
     * @Route("/", name="taxe_index")
     * @Template("TaxeBundle:Taxe:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="taxe_add")
     * @template("TaxeBundle:Taxe:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="taxe_show")
     * @Template("TaxeBundle:Taxe:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="taxe_edit")
     * @Template("TaxeBundle:Taxe:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="taxe_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
}
