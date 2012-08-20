<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'zucchi-pages-frontend' => 'ZucchiPages\Controller\FrontendController',
            'zucchi-pages-admin' => 'ZucchiPages\Controller\AdminController',
        ),
    ),
    'navigation' => array(
        'ZucchiAdmin' => array(
            'pages' => array(
                'label' => 'Pages',
                'route' => 'ZucchiAdmin/ZucchiPages',
            ),
        )
    ),
    // default route 
    'router' => array(
        'routes' => array(
            'ZucchiPages' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller'    => 'zucchi-pages-frontend',
                        'action'        => 'index',
                    ),
                ),
                'priority' => 0,
                'may_terminate' => true,
                'child_routes' => array(
                    'page' => array(
                        'type'    => 'Regex',
                        'options' => array(
                            'regex'    => '(?<slug>[a-zA-Z0-9\/_-]*)',
                            'defaults' => array(
                                'controller' => 'zucchi-pages-frontend',
                                'format' => 'html',
                            ),
                            'spec' => '/%slug%',
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'format' => array(
                                'type'    => 'Regex',
                                'options' => array(
                                    'regex'    => '.(?<format>[a-zA-Z]*)$',
                                    'defaults' => array(
                                        'controller' => 'zucchi-pages-frontend',
                                        'format' => 'html',
                                    ),
                                    'spec' => '/%slug%.%format%',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'ZucchiAdmin' => array(
                'child_routes' => array(
                    'ZucchiPages' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route' => '/pages[/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]+',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => 'zucchi-pages-admin',
                            )
                        ),
                        'may_terminate' => true,
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ZucchiPages' => __DIR__ . '/../view',
        ),
    ),
);
