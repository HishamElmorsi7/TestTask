<?php
require_once "product.classes.php";

class Furniture extends Product {
    private $height, $width, $lenght;

    // setting special attributes
    public function set_height($height) {
        $this->height = $height;
    }
    public function set_width($width) {
        $this->width = $width;
    }
    public function set_length($length) {
        $this->length = $length;
    }

    // setting all Furniture attributes
    public function set_furniture_attr($sku, $name, $price, $type, $height, $width, $length ){
        // common attributes
        $this->set_sku($sku);
        $this->set_name($name);
        $this->set_price($price);
        $this->set_type($type);
        // furniture attributes
        $this->set_height($height);
        $this->set_width($width);
        $this->set_length($length);
    }

    public function add_product(){
        $pdo = $this->connect();
        //Inserting into items
        $stmt = $pdo->prepare("INSERT INTO items(sku, name, price, type) VALUES(:sku, :name, :price, :type)");
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':type', $this->type);
        
        $stmt->execute();
        //Inserting into dimensions
        $stmt = $pdo->prepare("INSERT INTO dimensions(height, width, length , item_id) VALUES(:height, :width, :length, :item_id)");
        $stmt->bindParam(':height', $this->height);
        $stmt->bindParam(':width', $this->width);
        $stmt->bindParam(':length', $this->length);
        $stmt->bindParam(':item_id', $item_id);
        $item_id = $pdo->lastInsertId();

        $stmt->execute();
    }


    public function get_products(){
        $pdo = $this->connect();
        //SELECTING items
        $query =
        "SELECT items.id, items.type, items.sku, items.name, items.price, dimensions.length, dimensions.width, dimensions.height
         FROM items
        INNER JOIN dimensions ON items.id = dimensions.item_id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

        public function delete_product($id){
        $pdo = $this->connect();

        //DELETING product special attr from dimensions table
        $query = "DELETE FROM dimensions WHERE item_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        //DELETING product from items table
        $query = "DELETE FROM items WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

}

$fur = new Furniture();