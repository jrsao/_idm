<?php

namespace ContractBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CommonBundle\Controller\CrudBaseController;

use ContractBundle\Form\UnitContractType;
use ContractBundle\Form\ParkingContractType;
use ContractBundle\Entity\Contract;

/**
 * @Route("/contract")
 */
class ContractController extends CrudBaseController
{
    protected function getRoutes()
    {
        return array(
            'index' => 'contract_index',
            'show' => 'contract_show',
            'add' => 'contract_add',
            'edit' => 'contract_edit',
            'delete' => 'contract_delete'
        );
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('ContractBundle:Contract');
    }
    
    protected function getFormType()
    {
        return new UnitContractType();
    }

    protected function getNewEntity()
    {
        return new Contract();
    }
                
    /**
     * @Route("/add", name="contract_add")
     * @template("ContractBundle:Contract:add.html.twig")
     */
    public function addAction(Request $request)
    {
        return parent::addAction($request);
    }
                
    /**
     * @Route("/show/{id}", name="contract_show")
     * @Template("ContractBundle:Contract:show.html.twig")
     */
    public function showAction($id)
    {
        return parent::showAction($id);
    }
    
    /**
     * @Route("/edit/{id}", name="contract_edit")
     * @Template("ContractBundle:Contract:edit.html.twig")
     */
    public function editAction(Request $request, $id)
    {
        return parent::editAction($request,$id);
    }
    
    /**
     * @Route("/delete/{id}", name="contract_delete")
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    
    /**
     * @Route("/", name="contract_index")
     * @Template("ContractBundle:Contract:index.html.twig")
     */
    public function indexAction()
    {
        $unitContracts = $this->getRepository()->findAllUnitContract();
        $parkingContracts = $this->getRepository()->findAllParkingContract();
        
        return array('unitContracts' => $unitContracts, 'parkingContracts' => $parkingContracts);
    }
    
    /**
     * @Route("/add/unit", name="contract_unit_add")
     * @template("ContractBundle:Contract:add.html.twig")
     */
    public function addUnitAction(Request $request)
    {
        $entity = $this->getNewEntity();
        
        $form = $this->createForm(new UnitContractType(), $entity);
        $form->add('save', 'submit');
        
        return $this->getSpecialForm($request, $form, $entity);
    }
    
        /**
     * @Route("/add/parking", name="contract_parking_add")
     * @template("ContractBundle:Contract:add.html.twig")
     */
    public function addParkingAction(Request $request)
    {
        $entity = $this->getNewEntity();
        
        $form = $this->createForm(new ParkingContractType(), $entity);
        $form->add('save', 'submit');
        
        return $this->getSpecialForm($request, $form, $entity);
    }
    
    /**
     * @Route("/edit/unit/{id}", name="contract_unit_edit")
     * @Template("ContractBundle:Contract:edit.html.twig")
     */
    public function editUnitAction(Request $request, $id)
    {
        $entity = $this->getRepository()->find($id);
                
        $form = $this->createForm(new UnitContractType(), $entity);
        $form->add('save', 'submit');
         
        return $this->getSpecialForm($request, $form, $entity);
    }
    
    /**
     * @Route("/edit/parking/{id}", name="contract_parking_edit")
     * @Template("ContractBundle:Contract:edit.html.twig")
     */
    public function editParkingAction(Request $request, $id)
    {
        $entity = $this->getRepository()->find($id);
         
        $form = $this->createForm(new ParkingContractType(), $entity);
        $form->add('save', 'submit');
        
        return $this->getSpecialForm($request, $form, $entity);
    }
    
    /**
     * 
     * @param type $entity
     * @return type
     */
    protected function getSpecialForm(Request $request, $form, $entity)
    {
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $route = $this->getRoutes()['show'];
            
            return  $this->redirect($this->generateUrl($route, array('id' => $entity->getId()), 301));
        }
        
        return array(
            'form' => $form->createView(),
            'id' => $entity->getId()
        ); 
    }
}
