<?php
include "items.class.php";
$item = new Items();
$item->insertItem();
$last_item = new Items(); 
// $sku = $last_item-> getSKU();


?>

<!DOCTYPE html>
<html>
<html lang="en">

<head>
  <title> products </title>
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

  <link rel="stylesheet" type="text/css" href="layout\css\style.css" />
  <link rel="stylesheet" type="text/css" href="layout\css\bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="layout\css\fontawesome.min.css" />




  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>



<body class="body" style=" font-family: Trebuchet MS, sans-serif;">

        <nav class="navbar navbar-header navbar-dark bg-dark" style="      font-family: Trebuchet MS, sans-serif; ">
          <a class="navbar-brand font-weight-bold h1" href="./.php" style="margin-left: 2rem; margin-top:1rem;">PRODUCTS LIST</a>
          <form id="product_form" method="POST" >
            <input type="submit" value="Save" name="Save" class="button btn navbar-btn text-light  bg-dark">
            <span style="margin-top:0.5rem; margin-right:2rem;">
              <a href="./.php" class="button btn navbar-btn text-light bg-dark">Cancel</a>
            </span>
        </nav>


  <div class="form-area">    
                          <div class="labels-devider">
                              <label class="label text-light">SKU</label>
                              <input  id = "sku" type="text" value = <?=  $last_item-> getSKU(); ?>  disabled="disabled">
                          </div>
                          <div class="main-inputs">
                            <!-- sku - name - price -->
                            <div class="labels-devider">
                              <label class="label text-light">Name</label>
                              <input  type="text" name="name" id="name" required>
                            </div>
                            <div class="labels-devider">
                              <label class="label text-light">price($)</label>
                              <input type="number" name="price" id ="price" required>
                            </div>
                            
                            <!-- typeswitcher -->
                            <div class="labels-devider">
                              <label class="label text-light" style="width:130px;">Type Switcher</label>
                              <span class="selectpicker">
                                <select name="type" id="productType" style="width:auto;" required>
                                  <option selected value = "first-select" >Select Type:</option>
                                  <option value="DVD">DVD</option>
                                  <option value="Furniture">Furniture</option>
                                  <option value="Book">Book</option>
                                </select>
                              </span>
                            </div>
                          </div>
                           
                          
                          <!-- indivisual forms -->
                            <div id="special-atts" style="margin-top:20px; "  >

                              <div class="DVD-area special-atts" >
                                      <label class="  text-light">Size (MB)</label>
                                      <input  type="number" id="size" name="value[]">
                                      <p class="description ">Please, provide size*</p>
                              </div>   

                              <div class="Book-area special-atts">
                                      <label class=" text-light">Weight (KG)</label>
                                      <input type="number"  id="weight" name="value[]">
                                      <p class="description  ">Please, provide weight*</p>
                              </div>  




                              <div class="Furniture-area special-atts">
                                      <label class="   text-light">Height (CM)</label>
                                      <input  type="number" id="height" name="value[]">
                                      <p class="description ">Please, provide height*</p>

                                      <label class=" text-light ">Width (CM)</label>
                                      <input class="" type="number" id="width" name="value[]">
                                      <p class="description ">Please, provide width*</p>

                                      <label class=" text-light ">Length (CM)</label>
                                      <input class="" type="number" id="length" name="value[]">
                                      <p class="description ">Please, provide length*</p>
                              </div>

                              </div>    
                            
                            
 </div>
 <br><br><br><br><br><br><p class="foot text-center py-3 bg-dark shadow">Scandiweb Test Assignment - done by rima- </p>




    </form>
    <!-- </form> -->
   
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript">
      $(".DVD-area").hide();
      $(".Furniture-area").hide();
      $(".Book-area").hide();

      window.onload = function (){
        $(".form-area").find("input").each(function() {
                              $(this).val('');
                          });
        $('#productType').val("first-select");                   
      }
      $('#productType').change(function() {
        var area = $('#productType').find('option:selected').val();
        area = "." + area + "-area";

        $(area).show();
        
//--- if not selected area : set input to null && hide ---
        $('.special-atts').not(area).each(function() {
                          $(this).hide();
                          $(this).find("input").each(function() {
                              $(this).val(0);  
                          }); 
                          
        });

//--- make input required ---
        $(area).find("input").each(function() {
          $(this).attr('required', true);
          $(this).val('');  
        });        

      });



    </script>


</body>

</html>