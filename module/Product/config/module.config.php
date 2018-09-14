<?php
namespace Product;

use Product\Factory\Form\ProductFormFactory;
use Product\Form\ProductForm;
use Product\InputFilter\ProductInputFilter;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\ProductController::class => Controller\ProductControllerFactory::class,
        ]
    ],

    'service_manager' => [
        'factories' => [
            ProductForm::class => ProductFormFactory::class,
        ],
    ],

    'form_elements' => [
        'factories' => [
            ProductForm::class => ProductFormFactory::class,
        ],
    ],
    
    'input_filters' => [
        'factories' => [
            ProductInputFilter::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'product' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/product[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../../Application/view/layout/layout.phtml',
            'layout/email_template'           => __DIR__ . '/../../Application/view/layout/email_template.phtml',
        ],
        'template_path_stack' => [
            'product' => __DIR__ . '/../view'
        ],
    ],
    'view_helper_config' => [
        'flashmessenger' => [
            'message_open_format' => '<div%s><ul><li>',
            'message_separator_string' => '</li><li>',
            'message_close_string' => '</li></ul></div>',
        ]
    ]
];