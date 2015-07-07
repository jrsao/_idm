<?php

namespace PersonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use PersonBundle\Entity\Person;
use PersonBundle\Form\PersonType;

/**
 * @Route("/person")
 */
class PersonController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'person_index',
            'show' => 'person_show',
            'add' => 'person_add',
            'edit' => 'person_edit',
            'delete' => 'person_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('PersonBundle:Person');
    }
    
    protected function getFormType()
    {
        return new PersonType();
    }

    protected function getNewEntity()
    {
        return new Person();
    }
    
    /**
     * @Route("/", name="person_index")
     * @Template("PersonBundle:Person:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
            
    /**
     * @Route("/add", name="person_add")
     * @template("PersonBundle:Person:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
            
    /**
     * @Route("/show/{id}", name="person_show")
     * @Template("PersonBundle:Person:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="person_edit")
     * @Template("PersonBundle:Person:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="person_delete")
     * @Template("PersonBundle:Person:delete.html.twig")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
}
