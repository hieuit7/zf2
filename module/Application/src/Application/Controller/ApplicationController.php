<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
/**
 * Description of ApplicationController
 *
 * @author hieun
 */
abstract class ApplicationController extends AbstractActionController{
    private $doctrine;
    
    
    /**
     * @return \Doctrine\ORM\EntityManager Description
     */
    public function getDoctrine() {
        
        return $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    }
}
