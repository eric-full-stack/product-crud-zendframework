<?php
namespace Product\Factory\Form;
use Product\Model\Product;
use Product\Form\ProductForm;
use Product\InputFilter\ProductInputFilter;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

/**
 * Class ProductFormFactory
 * 
 * @package Product\Factory\Form
 */
class ProductFormFactory
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container)
    {
        $form = new ProductForm('product');
        $form->setHydrator($container->get('HydratorManager')->get(ClassMethods::class));
        $form->setInputFilter($container->get('InputFilterManager')->get(ProductInputFilter::class));
        $form->setObject(new Product);

        return $form;
    }
}