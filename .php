 <?php
  include "items.class.php";
  $value;
  $delete_item = new Items();
  $del =$delete_item->delete();


  $count_item = new Items();
  $count = $count_item->count();  
  

 ?>



 <!DOCTYPE html>
 <html>
 <html lang="en">

 <head>
   <title> products </title>
   <link rel="stylesheet" type="text/css" href="layout\css\style.css" />

   <link rel="stylesheet" type="text/css" href="layout\css\bootstrap.css" />


   <link rel="stylesheet" type="text/css" href="layout\css\fontawesome.min.css" />
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script src="layout\js\jquery.min.js" type="text/javascript"></script>
   <script src="layout\js\bootstrap.min.js" type="text/javascript"></script>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE-edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>



 <body class="body" style=" font-family: Trebuchet MS, sans-serif;">
   <?php
    $testObj = new Items();
    $item = $testObj->getItems();
    ?>
   <nav class="navbar navbar-header navbar-dark bg-dark">

     <a class="navbar-brand font-weight-bold h1" href="#" style="margin-left: 2rem; margin-top:1rem;">PRODUCTS LIST</a>
     <form id="delete-form" method="POST">
       <span style="margin-top:0.5rem; margin-right:2rem; display: inline-block;">

         <a href="./addproduct" value="ADD" class="button btn navbar-btn text-light bg-dark">ADD</a>

         <input type="submit" id="delete-product-btn" name="delete-selected" value="MASS DELETE" class=" button btn navbar-btn text-light  bg-dark">

       </span>


   </nav>


   <div class="cards-area">

     <?php
      $itemsObject = new Items();
      $items = $itemsObject->getItems();
      foreach ($items as $item) {
      ?>

       <div class="card shadow text-white bg-dark">
         <div class="card-header" style="text-align: left;">
           <div class="form-check">
             <input name="delete-checkbox[]" class="form-check-input" type="checkbox" value="<?= $item['sku']; ?>" id="flexCheckDefault" style="transform : scale(2);">
             <label class="form-check-label" for="flexCheckDefault">
             </label>
           </div>
         </div>

         <div class="card-body" style=" margin-bottom: 5px;" style="height:auto;">
           <p class="text-muted text-center" style="margin-bottom:0.4rem;"># <?= $item['sku']; ?></p>
           <p class="card-title font-weight-bold"> <?= $item['name']; ?></p>

           <?php

            switch ($item['type']) {
              case 'DVD':
                $value = 'Size: ' . $item['value'] . "MB";
                break;
              case 'Furniture':
                $value = 'Dimension: ' . $item['value'] . "x" . $item['value_2'] . "x" . $item['value_3'];
                break;
              case 'Book':
                $value = 'Weight: ' . $item['value'] . "KG";
                break;
            }
            ?>

           <p class="card-title"><small> <?= $value ?></small></p>
           <p class="card-title"><small><?= $item['price']; ?>$</small></p>
         </div>
       </div>
     <?php } ?>


   </div>


   </form>
   <h3 id="emptyDB" class="text-light">No Products Added Yet</h3>

   <br><br><br><br><br><br><p class="foot text-center py-3 bg-dark shadow">Scandiweb Test Assignment - done by rima- </p>

   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>

   <script type="text/javascript">


     var count = <?php echo $count; ?>;
     if (count == 0) {
       $("#emptyDB").show();
     } else {
       $("#emptyDB").hide();
     }

  


   </script>

 </body>

 </html>