<?php
require_once "product.classes.php";

class Book extends Product {
    private $weight;

    // setting special attribute
    public function set_weight($weight) {
        $this->weight  = $weight;

    }

    // setting all book attributes
    public function set_book_attr($sku, $name, $price, $type, $weight){
        // common attributes
        $this->set_sku($sku);
        $this->set_name($name);
        $this->set_price($price);
        $this->set_type($type);
        // Book attributes
        $this->set_weight($weight);
        
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
        //Inserting into weight
        $stmt = $pdo->prepare("INSERT INTO weights(weight, item_id) VALUES(:weight, :item_id)");
        $stmt->bindParam(':weight', $this->weight);
        $stmt->bindParam(':item_id', $item_id);
        $item_id = $pdo->lastInsertId();

        $stmt->execute();
    }

    public function get_products(){
        $pdo = $this->connect();
        //SELECTING items
        $query =
        "SELECT items.id, items.type, items.sku, items.name, items.price, weights.weight
         FROM items
        INNER JOIN weights ON items.id = weights.item_id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete_product($id){
        $pdo = $this->connect();

        //DELETING product special attr from weight table
        $query = "DELETE FROM weights WHERE item_id = :id";
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



