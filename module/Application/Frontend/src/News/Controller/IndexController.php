<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Frontend\News\Controller;
use Application\Controller\ApplicationController;
use Zend\View\Model\ViewModel;

class IndexController extends ApplicationController 
{
    public function indexAction()
    {        
        $em = $this->getDoctrine();
        $data = $em->getRepository('Application\Entity\Users')->createQueryBuilder('t')->select('t')->setCacheable(true)->getQuery()->getResult();
        
        return new ViewModel();
    }
}
