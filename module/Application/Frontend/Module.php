<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Frontend;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $app = $e->getParam('application');
        $app->getEventManager()->attach('dispatch', array($this, 'setTemplate'), 1);
        //$app->getEventManager()->attach('render', array($this, 'setTemplate'), 100);
    }

    public function setTemplate(MvcEvent $e) {
        $result = $e->getResult();
        $router = $e->getRouteMatch();
        $params = $router->getParams();
        if (isset($params['__NAMESPACE__']) && isset($params['__CONTROLLER__']) && isset($params['action'])) {
            $controllerClass = $params['__NAMESPACE__'];
            $moduleNamespace = substr($controllerClass, strpos($controllerClass, '\\'));
            $moduleNamespace = substr($moduleNamespace, 1);
            $moduleNamespace = substr($moduleNamespace, 0, strpos($moduleNamespace, '\\Controller'));
            $templatePath = __DIR__;
            $config = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['view_manager']['template_map'])) {
                $moduleNamespace = strtolower($moduleNamespace . '/' . $params['__CONTROLLER__']);
                $templatePath = $templatePath . '/view/' . $moduleNamespace . '/' . $params['action'] . '.phtml';
                $moduleNamespace = str_replace('\\', '/', $moduleNamespace);
                $template = $moduleNamespace . '/' . $params['action'];
                $config['view_manager']['template_map'][$template] = $templatePath;
                $result->setTemplate($template);
            }

            //set Title;
            if (isset($config['view_manager']['siteName'])) {
                $siteName = $config['view_manager']['siteName'];
            } else {
                $siteName = $moduleNamespace;
            }
            $viewHelperManager = $e->getApplication()->getServiceManager()->get('viewHelperManager');
            $headTitle = $viewHelperManager->get('headTitle');
            $headTitle->setSeparator(' - ');
            $headTitle->append($params['action']);
            $headTitle->append($siteName);
            
        }
    }

    public function getConfig() {
        return include __DIR__ . '/config/frontend.config.php';
    }

    public function getAutoloaderConfig() {
        $arr = array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/Index',
                    __NAMESPACE__ . '\\Video' => __DIR__ . '/src/Video',
                    __NAMESPACE__ . '\\News' => __DIR__ . '/src/News'
                ),
            ),
        );
        return $arr;
    }

}
