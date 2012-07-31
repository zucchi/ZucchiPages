<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'zms-frontend' => 'ZucchiPages\Controller\FrontendController',
        ),
    ),
    // default route 
    'router' => array(
        'routes' => array(
            'ZucchiPages' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'ZucchiPages\Controller',
                        'controller'    => 'FrontendController',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Regex',
                        'options' => array(
                            'regex'    => '/(?<slug>[a-zA-Z0-9\/_-])',
                            'defaults' => array(
                                '__NAMESPACE__' => 'ZucchiPages\Controller',
                                'controller' => 'zms-frontend',
                                'format' => 'html',
                            ),
                            'spec' => '/%slug%',
                        ),
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
