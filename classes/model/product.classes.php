<?php
require_once "/storage/ssd2/991/18252991/public_html/classes/dbConnection/dbh.classes.php";

// This class is abstract product class which describes the main form of each product
abstract class Product extends Dbh {
    // common attrs
    protected $sku, $name, $price, $type;

    public function set_sku($sku){
        $this->sku = $sku;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_price($price){
        $this->price = $price;
    }

    public function set_type($type){
        $this->type = $type;
    }

    // methods each product must have
    abstract public function add_product();
    abstract public function get_products();
    abstract public function delete_product($id);

    
}