<?php
include "dbh.class.php";
class Items extends Dbh
{
    public function count(){
      $sql = "SELECT * FROM items";
      $stmt = $this->connect()->query($sql);
      return mysqli_num_rows ( $stmt );
    }
  public function getItems()
  {
    //fetch items
    $sql = "SELECT * FROM items";
    $stmt = $this->connect()->query($sql);
    return $stmt;
  }
  public function insertItem()
  {
    $con = $this->connect();
    if (isset($_POST['submit'])) {

      $values = $_POST['value'];
      var_dump($values);
      $value = (int)$values[0] + (int)$values[1] + (int)$values[2];
      $value_2 = (int)$values[3];
      $value_3 = (int)$values[4];
      $name = strval($_POST['name']);
      $type = strval($_POST['type']);
      $price = $_POST['price'];
      $stmt = $con->prepare("INSERT INTO items (name, price, value, value_2, value_3, type) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('ssssss', $name, $price, $value, $value_2, $value_3, $type);

      $stmt->execute();
      header("Location: ./.php", true, 301);
    }
  }

  public function getSKU()
  {
    $query = "SELECT `AUTO_INCREMENT`
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'products_list'
    AND   TABLE_NAME   = 'items';  ";

 $row = mysqli_fetch_array( $this->connect()->query($query) );
    return $row['AUTO_INCREMENT'];
  }


  public function delete()
  {
    $con = $this->connect();
    mysqli_select_db($this->connect(), 'products_list');
    if (isset($_POST['delete-selected'])) {
      if (isset($_POST['delete-checkbox'])) {

        $items_ids = $_POST['delete-checkbox'];
        var_dump($items_ids);
        $extracted_ids = implode(',', $items_ids);

        
        $query = "DELETE FROM items WHERE sku IN($extracted_ids)";
        $query_run =  mysqli_query($con, $query);

        if ($query_run) {
          header("location: productslist.php");
        }
      } else {
        header("location: productslist.php");

        // $message = 'no products selected to delete, please select a product to delet first';

        // echo "<SCRIPT> 
        //     alert('$message')
        //     window.location.replace('.php');
        // </SCRIPT>";

          }

    }
  }


  
  

}
