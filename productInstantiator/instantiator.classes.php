<?php
// THIS CLASS IF FOR DETERMINING WHICH CLASS TYPE SHOULD I INSTANTIATE
// include_once "../classes/model/book.classes.php";
// include_once "../classes/model/DVD.classes.php";
// include_once "../classes/model/furniture.classes.php";

require_once "/storage/ssd2/991/18252991/public_html/classes/model/book.classes.php";
require_once "/storage/ssd2/991/18252991/public_html/classes/model/DVD.classes.php";
require_once "/storage/ssd2/991/18252991/public_html/classes/model/furniture.classes.php";

class Instantiator {

    private $sku, $name, $price, $type, $weight, $size, $height, $width, $length;

    public function __construct($sku, $name, $price, $type, $weight, $size, $height, $width, $length) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->weight = $weight;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function instantiate() {
        switch($this->type) {
            case 'DVD':
                $DVD_obj = new DVD();
                $DVD_obj->set_DVD_attr($this->sku, $this-> name, $this->price, $this->type, $this->size);
                return $DVD_obj;
                break;

            case 'Book':
                $book_obj = new Book();
                $book_obj->set_book_attr($this->sku, $this-> name, $this->price, $this->type, $this->weight);

                return $book_obj;
                break;

            case 'Furniture':
                $furniture_obj = new Furniture();
                $furniture_obj->set_furniture_attr($this->sku, $this-> name, $this->price, $this->type, $this->height, $this->width, $this->length);
                return $furniture_obj;
                break;
            
        }
    }

}



