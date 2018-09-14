<?php

namespace Product\Controller;

use Product\Controller\ProductController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Product\Model\ProductTable;
use Product\Form\ProductForm;
use Zend\Form\FormElementManager;

class ProductControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,$requestedName, array $options = null)
    {
    	// $formManager = $container->get(FormElementManager::class);
   
		$form = $container->get(FormElementManager::class)->get(ProductForm::class);
    		
        return new ProductController(
            $container->get(ProductTable::class),
            $form
        );
    }
}