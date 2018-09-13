<?php
namespace Product\Form;

use Zend\Form\Form;

class ProductForm extends Form
{
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const PRICE = 'price';
    const SUBMIT = 'submit';

    public function __construct($name = null)
    {
        parent::__construct('product');

        $this->add([
            'name' => self::ID,
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => self::NAME,
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => self::DESCRIPTION,
            'type' => 'text',
            'options' => [
                'label' => 'Description',
            ],
        ]);
        $this->add([
            'name' => self::PRICE,
            'type' => 'text',
            'options' => [
                'label' => 'Price R$',
            ],
        ]);
        $this->add([
            'name' => self::SUBMIT,
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
                'class'    => 'btn btn-success',
            ],
        ]);
    }
}