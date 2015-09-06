<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'frontend' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Frontend\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'news' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route' => 'news',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Frontend\News\Controller',
                                'controller' => 'Index',
                                'action' => 'index',
                            )
                        )
                    ),
                    'videos' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route' => 'videos',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Application\Frontend\Video\Controller',
                                'controller' => 'Index',
                                'action' => 'index',
                            )
                        )
                    )
                ),
            ),
        ),
    ),
    'navigation' => array(
        'frontend' => array(
            array(
                'label' => 'Home',
                'route' => 'frontend',
            ),
            array(
                'label' => 'News',
                'route' => 'frontend/news',
            ),
            array(
                'label' => 'Videos',
                'route' => 'frontend/videos',
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'Zend\Db\Adapter\Adapter' => 'Application\Services\DbProfilerFactory',
            'my_redis_alias' => 'Application\Services\RedisDoctrineFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'vi_VN',
        'translation_file_patterns' => array(
            array(
                'type' => 'phpArray',
                'base_dir' => __DIR__ . '/../language' . __NAMESPACE__,
                'pattern' => '%s.php',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Frontend\Controller\Index' => 'Application\Frontend\Controller\IndexController',
            'Application\Frontend\Video\Controller\Index' => 'Application\Frontend\Video\Controller\IndexController',
            'Application\Frontend\News\Controller\Index' => 'Application\Frontend\News\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'siteName' => 'News',
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
