<?php
namespace app\model;

use app\engine\Db;

class Products extends DbModel
{
    public $id;
    public $name;
    public $img;
    public $description;
    public $price;
    public $customer_id;
    public $customer_address;

    /**
     * Products constructor.
     * @param $id
     * @param $name
     * @param $img
     * @param $description
     * @param $price
     * @param $customer_id
     * @param $customer_address
     */
    public function __construct($id = null, $name = null,$img = null ,$description = null, $price = null, $customer_id = null, $customer_address = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
        $this->description = $description;
        $this->price = $price;
        $this->customer_id = $customer_id;
        $this->customer_address = $customer_address;
    }


    public static function getTableName()
    {
        return "products";
    }


}

