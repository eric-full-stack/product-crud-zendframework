<?php
namespace Product\Model;

use DomainException;


class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $created;
    public $updated;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->description  = !empty($data['description']) ? $data['description'] : null;
        $this->price  = !empty($data['price']) ? $data['price'] : null;
        $this->created  = !empty($data['created']) ? $data['created'] : null;
        $this->updated  = !empty($data['updated']) ? $data['updated'] : null;
    }

    public function getArrayCopy(){
        return [
            'id'     => $this->id,
            'name' => $this->name,
            'description'  => $this->description,
            'price'  => $this->price,
        ];
    }
    
}