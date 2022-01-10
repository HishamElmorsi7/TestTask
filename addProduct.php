<!-- header -->
<?php require_once "partial_views/main_views/header.partial.php"; ?>

<div class = "container mt-3 px-5">   
    <div class="row align-items-center">
        <!-- header text -->
        <div class="col">
            <h1 class="ms-2">Product Add</h1>
        </div>
        <!-- buttons -->
        <div class="col">
            <!-- CANCEL BUTTON -->
            <button type="submit" onclick="returnToIndexPage()" class="btn btn-light  float-end me-2">Cancel</button>
            <!-- Script for handling returning to index page -->
            <script>
                function returnToIndexPage(){
                    window.location.href = "index.php";

                }
            </script>
            <!-- Save button -->
            <button type="submit" form= "product_form" class="btn btn-primary float-end me-2">Save</button>

        </div>
    </div>
    <hr>
</div>

<div class = "container mt-3 px-5">
    <!-- product form -->
    <form id="product_form" method="post" action ="includes/addProduct.inc.php" onsubmit="return validate()" >
        <!-- SKU -->
        <div class="row mb-3" >
            <!-- SKU label -->
            <label class="col-sm-1 col-form-label me-5 ms-2">SKU</label>
            <!-- SKU input -->
            <div class="col-sm-3">
                <input id="sku" type="text" required="true" class="form-control" name="sku"
                oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                >
                <!-- ALERT to show if there is wrong input or non valid ;) -->
                <div class="alert alert-danger" id = "validationSkuAlert" role="alert" style="display:none">
                </div>
            </div>
        </div>

        <!-- Name -->
        <div class="row mb-3">
            <!-- Name label -->
            <label class="col-sm-1 col-form-label me-5 ms-2">Name</label>
            <!-- Name input -->
            <div class="col-sm-3">
                <input id="name" type="text" required="true" class="form-control" name = "name"
                oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                >
                <!-- ALERT to show if there is wrong input or non valid ;) -->
                <div class="alert alert-danger" id = "validationNameAlert" role="alert" style="display:none">
                </div>
            </div>
        </div>

        <!-- Price -->
        <div class="row mb-3">
            <!-- Price label -->
            <label class="col-sm-1 col-form-label me-5 ms-2">Price ($)</label>
            <!-- Price input -->
            <div class="col-sm-2">
                <input id="price" type="number" step="0.001" required="true" class="form-control" name = "price"
                oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                >
                <!-- ALERT to show if there is wrong input or non valid ;) -->
                <div class="alert alert-danger" id = "validationPriceAlert" role="alert" style="display:none">
                </div>
            </div>
        </div>

        <!---------------------------------------------------------------------------------->
        <!-- SWITCHER AND SPECIAL ATTRIBUTES THAT DEPENDS ON THE DROPDOWN OPTION SELECTED -->
        <!---------------------------------------------------------------------------------->
        
        <!-- Type Switcher-->
        <div class="row mb-3 align-items-center">
            <!-- Type Switcher label -->            
            <label class="col-sm-1 col-form-label me-5 ms-2 ">Type Switcher</label>
            <div class="col-sm-3">
                <select id="productType" onchange= "showElement()" required="true" name="typeSwitcher" class="form-select form-select-sm"
                oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                >
                    <!--Options to choose from ;) -->
                    <option disabled selected value="" >Type Switcher</option>
                    <option  id="DVD" value="DVD" >DVD</option>
                    <option  id="Book" value="Book" >Book</option>
                    <option  id="Furniture" value="Furniture" >Furniture</option>
                </select>
            </div>
        </div>

        <!--Weight-->
        <div id= "productWeight" style="display:none" >
            <div  class="row mb-3 align-items-center">
                <!-- weight label -->
                <label class="col-sm-1 col-form-label me-5 ms-2">Weight (KG)</label>
                <!-- weight input -->
                <div class="col-sm-2">
                    <input id="weight" step="0.001" name="weight" type="number" class="form-control"
                    oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                    >
                    <!-- ALERT to show if there is wrong input or non valid ;) -->
                    <div class="alert alert-danger" id = "validationWeightAlert" role="alert" style="display:none">
                    </div>
                </div>
            </div>

            <h6 class="me-5 ms-2 my-4">Please, provide Book weight in KG</h6>
        </div>

        <!--size-->
        <div id= "productSize" style="display:none">
            <div class="row mb-3 align-items-center" >
                <!-- size label -->
                <label class="col-sm-1 col-form-label me-5 ms-2">Size (MB)</label>
                <!-- size input -->
                <div class="col-sm-2">
                    <input id="size" name= "size" type="number" step="0.001" class="form-control"
                    oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                    >
                    <!-- ALERT to show if there is wrong input or non valid ;) -->
                    <div class="alert alert-danger" id = "validationSizeAlert" role="alert" style="display:none">
                </div>
                </div>
            </div>

                <h6 class="me-5 ms-2 my-4">Please, provide disc space in MB</h6>
        </div>
        
        <!--height-->
        <div id= "productHeight" style="display:none">
            <div class="row mb-3 align-items-center">
                <!-- height label -->
                <label class="col-sm-1 col-form-label me-5 ms-2">Height (CM)</label>
                <!-- height input -->
                <div class="col-sm-2">
                    <input id="height" name="height" type="number" step="0.001" class="form-control"
                    oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                    >
                    <!-- ALERT to show if there is wrong input or non valid ;) -->
                    <div class="alert alert-danger" id = "validationHeightAlert" role="alert" style="display:none">
                    </div>
                </div>
            </div>
        </div>
    

        <!--width-->
        <div id= "productWidth" style="display:none">
            <div class="row mb-3 align-items-center" >
                <!-- width label -->
                <label class="col-sm-1 col-form-label me-5 ms-2">Width (CM)</label>
                <!-- width input -->
                <div class="col-sm-2">
                    <input id="width" name="width" type="number" step="0.001" class="form-control"
                    oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                    >
                    <!-- ALERT to show if there is wrong input or non valid ;) -->
                    <div class="alert alert-danger" id = "validationWidthAlert" role="alert" style="display:none">
                    </div>
                </div>
            </div>
        </div>

        <!--length-->
        <div id= "productLength" style="display:none">
            <div class="row mb-3 align-items-center">
                <!-- length label -->
                <label class="col-sm-1 col-form-label me-5 ms-2">Length (CM)</label>
                <!-- length input -->
                <div class="col-sm-2">
                    <input id="length" name="length" type="number" step="0.001" class="form-control"
                    oninvalid="this.setCustomValidity('Please, submit required data')" oninput="this.setCustomValidity('')" 
                    >
                    <!-- ALERT to show if there is wrong input or non valid ;) -->
                    <div class="alert alert-danger" id = "validationLengthAlert" role="alert" style="display:none">
                    </div>
                </div>

                <h6 class="me-5 ms-2 my-4">Please, provide dimensions in CM</h6>
            </div>

        </div>

    </form>
</div>
<!-- For handling special attributes by showing, hiding and other stuff ;) -->
<script src="includes/specialAttrHandler.inc.js"></script>
<!-- For inputs' validation -->
<script src="includes/check_input_data.inc.js"></script>
<!-- footer -->
<?php require_once "partial_views/main_views/footer.partial.php"; ?>




