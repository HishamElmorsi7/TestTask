<?php
require_once "/storage/ssd2/991/18252991/public_html/classes//model/book.classes.php";
require_once "/storage/ssd2/991/18252991/public_html/classes//model/DVD.classes.php";
require_once "/storage/ssd2/991/18252991/public_html/classes//model/furniture.classes.php";

// This class is for handling data grabbed with the model
class ProductView {
    private $books ;
    private $furnitures;
    private $DVDS;
    private $allProducts;

    //getting books, furnitures, dvds and setting them to attributes books, furnitures, dvds
    public function __construct(){
        $this->get_books();
        $this->get_DVDS();
        $this->get_furnitures();
        $this->get_all_products();
    }

    //getting books using model and setting to books attribute
    public function get_books(){
        //Instantiating a book model
        $book = new Book();
        $this->books = $book->get_products();
    }

    //getting DVDS using model and setting to DVDS attribute
    public function get_DVDS(){
        //Instantiating a DVD model
        $DVD = new DVD();
        $this->DVDS = $DVD->get_products();

    }

    //getting furnitures using model and setting to furnitures attribute
    public function get_furnitures(){
        //Instantiating a furniture model
        $furniture = new Furniture();
        $this->furnitures = $furniture->get_products();
    }

    //getting furnitures using model and setting to allProducts attribute
    public function get_all_products(){
        $merge_books_and_DVDS = array_merge($this->books, $this->DVDS);
        $merge_books_and_DVDS_and_furnitures = array_merge($merge_books_and_DVDS, $this->furnitures);
        $this->allProducts = $merge_books_and_DVDS_and_furnitures;
    }

    // sorting products assc according to id
    public function get_sorted_productsASC(){

        usort($this->allProducts, function($a, $b) {
        return $a['id'] <=> $b['id'];
        });

        return $this->allProducts;

    }




}



