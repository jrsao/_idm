<?php

namespace CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

abstract class CrudBaseController extends Controller
{
    abstract protected function getRoutes();
    
    abstract protected function getRepository();
    
    abstract protected function getFormType();
    
    abstract protected function getNewEntity();
    
    public function __construct()
    {
        
    }
    
    /**
     * 
     * @param type $entity
     * @return type
     */
    protected function getForm(Request $request, $entity)
    {
        $form = $this->createForm($this->getFormType(), $entity);
        $form->add('save', 'submit');
        
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
    
    /**
     * 
     * @return array
     */
    protected function indexAction()
    {
        $entities = $this->getRepository()->findAll();
        
        return array('entities' => $entities);
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     */
    protected function addAction(Request $request)
    {
        $entity = $this->getNewEntity();
        
        return $this->getForm($request, $entity);
    }
        
    /**
     * 
     * @return type
     */
    protected function editAction(Request $request, $id)
    {
        $entity = $this->getRepository()->find($id);
        
        return $this->getForm($request, $entity);
    }
    
    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type
     * @throws NotFoundHttpException
     */
    protected function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->getRepository()->find($id);

        // TODO modif traduction message d'erreur avec toString
        if (!$entity) {
          throw new NotFoundHttpException("L'entity d'id ".$id." n'existe pas.");
        }
        
        $form = $this->createFormBuilder()->getForm();
        
        if ($form->handleRequest($request)->isValid()) {
          $em->remove($entity);
          $em->flush();

          //$request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");

          return $this->redirect($this->generateUrl($this->getRoutes()['index']));
        }

        return $this->render('CommonBundle:Partial:deleteForm.html.twig', array(
          'entity' => $entity,
          'route' => $this->getRoutes()['delete'],
          'form'   => $form->createView()
        ));
    }
  
    /**
     * 
     * @param type $id
     * @return type
     */
    protected function showAction($id)
    {
        $entity = $this->getRepository()->find($id);
        
        return array('entity' => $entity);
    }
}
