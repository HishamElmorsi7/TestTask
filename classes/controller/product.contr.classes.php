<?php
//Requiring the instantiator class
require_once "/storage/ssd2/991/18252991/public_html/productInstantiator/instantiator.classes.php";

class ProductController{

    // For creating a product obj and add it to the DB ;
    function create_product($sku, $name, $price, $type, $weight, $size, $height, $width, $length){
        //instantiating an object from the instantiator
        $instantiator = new Instantiator($sku, $name, $price, $type, $weight, $size, $height, $width, $length);
        //Creating a product instance
        $product = $instantiator->instantiate();
        //Adding product to the DB
        $product->add_product();
    }

    //For Deleting a product by knowing its (id: to determine which product), (type to determine which tables to delete from)
    function delete_product($product_type, $id){

            switch($product_type) {
            case 'dvd_product':
                // creating a new dvd model to use it for deletion
                $dvdModel = new DVD();
                $dvdModel->delete_product($id);
                break;

            case 'book_product':
                // creating a new book model to use it for deletion
                $bookModel = new Book();
                $bookModel->delete_product($id);
                break;;

            case 'furniture_product':
                // creating a new furniture model to use it for deletion
                $furnitureModel = new Furniture();
                $furnitureModel->delete_product($id);
                break;
            
        }
    }

}

