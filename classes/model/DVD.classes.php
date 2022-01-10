<?php
require_once "product.classes.php";

class DVD extends Product {
    private $size;

    // setting special attributes
    public function set_size($size) {
        $this->size = $size;
    }

    // setting all DVD attributes
    public function set_DVD_attr($sku, $name, $price, $type, $size){
        // common attributes
        $this->set_sku($sku);
        $this->set_name($name);
        $this->set_price($price);
        $this->set_type($type);
        // DVD attributes
        $this->set_size($size);
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
        //Inserting into size
        $stmt = $pdo->prepare("INSERT INTO sizes(size, item_id) VALUES(:size, :item_id)");
        $stmt->bindParam(':size', $this->size);
        $stmt->bindParam(':item_id', $item_id);
        $item_id = $pdo->lastInsertId();

        $stmt->execute();
    }

    public function get_products(){
        $pdo = $this->connect();
        //SELECTING items
        $query =
        "SELECT items.id, items.type, items.sku, items.name, items.price, sizes.size
         FROM items
        INNER JOIN sizes ON items.id = sizes.item_id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

        public function delete_product($id){
        $pdo = $this->connect();

        //DELETING product special attr from sizes table
        $query = "DELETE FROM sizes WHERE item_id = :id";
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
