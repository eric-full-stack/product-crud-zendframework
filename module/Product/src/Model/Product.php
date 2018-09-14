<?php
namespace Product\Model;

use DomainException;


class Product
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $created;
    protected $updated;

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
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }
    /**
     * @param string $name
     */
    public function setName($name){
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }
    /**
     * @param string $description
     */
    public function setDescription($description){
        $this->description = $description;
    }
    /**
     * @return double
     */
    public function getPrice(){
        return $this->price;
    }
    /**
     * @param string $price
     */
    public function setPrice($price){
        $this->price = $price;
    }
    /**
     * @return datetime
     */
    public function getCreated(){
        return $this->created;
    }
    /**
     * @param datetime $created
     */
    public function setCreated($created){
        $this->created = $created;
    }
    /**
     * @return datetime
     */
    public function getUpdated(){
        return $this->updated;
    }
    /**
     * @param string $updated
     */
    public function setUpdated($updated){
        $this->updated = $updated;
    }
}