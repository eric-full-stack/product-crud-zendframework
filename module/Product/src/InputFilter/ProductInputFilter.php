<?php
namespace Product\InputFilter;

use Product\Form\ProductForm;
use Zend\Filter\StringTrim;
use Zend\Filter\toInt;
use Zend\Filter\StripTags;
use Zend\Validator\StringLength;
use Zend\InputFilter\InputFilter;

/**
 * Class ProductInputFilter
 *
 * @package Product\InputFilter
 */
class ProductInputFilter extends InputFilter
{
    /**
     * {@inheritdoc}
     */
    public function init(){

        $this->add([
            'name' => ProductForm::ID,
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $this->add([
            'name' => ProductForm::NAME,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => ProductForm::DESCRIPTION,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => ProductForm::PRICE,
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                ['name' => 'Regex', 'options' => ['pattern' => '/[0-9].[0-9]/']],
            ],
        ]);

    }
}    
    