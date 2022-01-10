<!-- Header -->
<?php require_once "partial_views/main_views/header.partial.php"; ?>
<!-- product Viewer -->
<?php require_once "classes/productView/productView.classes.php"; ?>


<div class = "container mt-3 px-5">   
    <div class="row align-items-center">
        <!-- header text -->
        <div class="col">
            <h1 class="ms-2">Product List</h1>
        </div>
        <!-- buttons -->
        <div class="col">
            <!-- ADD BUTTON -->
            <!--Link with (add product page) by clicking (ADD button)-->
            <button onclick="goToaddPage()" type="button" class="btn btn-light  float-end me-2" >ADD</button>
            <script>
                function goToaddPage(){
                    window.location.href = "addProduct.php";
                }
            </script>
            <!--DELETE BUTTON -->
            <button type="submit" form= "products" class="btn btn-danger float-end me-2" id ="delete-product-btn">MASS DELETE</button>                      
        </div>
    </div>
    <hr>


    <?php 
        $view = new ProductView();
        $products = $view->get_sorted_productsASC();
        ?>
    <!-- sku name price -->

    <form id = "products" action="includes/deleteProduct.inc.php" method="post">
        <div class="row">
            <!-- Iteration through all products from database -->
            <?php foreach($products as $product):?>
                <?php switch($product['type']): 
                    case 'DVD': ?>
                
                        <div class = "col-md-3 col-sm-6 border border-2  border-top-0 border-bottom-0 rounded-circle text-center py-4 my-3" >
                            <!-- checkbox -->
                            <div class="form-check">
                                <input class="form-check-input delete-checkbox DVD" name = "<?php echo $product['id'] ?>" type="checkbox" value="dvd_product" id="flexCheckDefault">
                            </div>
                            <!-- showing DVD sku -->
                            <h6><?php echo $product['sku'] ?></h6>
                            <!-- showing DVD name -->
                            <h6><?php echo $product['name'] ?></h6>
                            <!-- showing DVD price -->
                            <h6><?php echo round($product['price'], 2).' $' ?></h6>
                            <!-- showing DVD size -->
                            <h6><?php echo 'Size: '.round($product['size'], 2).' MB' ?></h6>
                        </div>
                        <?php break ?>
                    <?php case 'Book': ?>
                        <div class = "col-md-3 col-sm-6 border border-2  border-top-0 border-bottom-0 rounded-circle text-center py-4 my-3">
                            <!-- checkbox -->
                            <div class="form-check">
                                <input class="form-check-input delete-checkbox" name = "<?php echo $product['id'] ?>" type="checkbox" value="book_product" id="flexCheckDefault">
                            </div>
                            <!-- showing book sku -->
                            <h6><?php echo $product['sku'] ?></h6>
                            <!-- showing book name -->
                            <h6><?php echo $product['name'] ?></h6>
                            <!-- showing book price -->
                            <h6><?php echo round($product['price'], 2).' $' ?></h6>
                            <!-- showing book weight -->
                            <h6><?php echo 'Weight: '.round($product['weight'], 2).' KG' ?></h6>
                        </div>
                        <?php break ?>
                    
                    <?php case 'Furniture': ?>

                        <div class = "col-md-3 col-sm-6 border border-2 border-top-0 border-bottom-0 rounded-circle text-center py-4 my-3">
                            <!-- checkbox -->
                            <div class="form-check">
                                <input class="form-check-input delete-checkbox" name = "<?php echo $product['id'] ?>" type="checkbox" value="furniture_product" id="flexCheckDefault">
                            </div>
                            <!-- showing furniture sku -->
                            <h6><?php echo $product['sku'] ?></h6>
                            <!-- showing furniture name -->
                            <h6><?php echo $product['name'] ?></h6>
                            <!-- showing furniture price -->
                            <h6><?php echo round($product['price'], 2).' $' ?></h6>
                            <!-- showing furniture dimensions in form width x length x height -->
                            <h6><?php echo 'Dimensions: '. round($product['width'], 2).'x'.round($product['length'], 2).'x'.round($product['height'], 2) ?></h6>
                        </div>
                        <?php break ?>
                        
                <?php endswitch;?>

            <?php endforeach; ?>
        </div>
    </form>

</div>

<!-- Footer -->
<?php require_once "partial_views/main_views/footer.partial.php"; ?>
