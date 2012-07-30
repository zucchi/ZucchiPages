<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'skeleton' => 'ZucchiCms\Controller\FrontendController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ZucchiCms' => __DIR__ . '/../view',
        ),
    ),
);
