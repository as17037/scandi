<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
require 'db_config.php';
class Product
{
  var $SKU;
  var $name;
  var $price;
  var $type;
  var $size;
  var $weight;
  var $height;
  var $width;
  var $length;
function Init()
  {
    $this->SKU = $_POST["SKU"];
    $this->name = $_POST["Name"];
    $this->price = $_POST["Price"];
    $this->type = $_POST["type"];
    $this->size = $_POST["Size"];
    $this->weight = $_POST["Weight"];
    $this->height = $_POST["Height"];
    $this->width = $_POST["Width"];
    $this->length = $_POST["Length"];
  }
function EmptyInput()
  {
    if ($this->SKU.trim() == "")
      echo "Error, enter the SKU, please!";
    elseif($this->name.trim() == "")
      echo "Error, enter name, please!";
    elseif($this->price.trim() == "" )
      echo "Error, enter price, please!";
    elseif($this->size.trim() == "" and isset($this->size))
      echo "Error, enter size, please!";
    elseif($this->weight.trim() == "" and isset($this->weight))
      echo "Error, enter weight, please!";
    elseif($this->width.trim() == "" and isset($this->width))
      echo "Error, enter width, please!";
    elseif($this->height.trim() == "" and isset($this->height))
      echo "Error, enter height, please!";
    elseif($this->length.trim() == "" and isset($this->length))
      echo "Error, enter length, please!";
    else
      return true;
  }
function CorrectInput()
  {
    if (!is_numeric($this->price))
      echo "Incorrectly entered price! Please use only numbers and '.' between whole and decimal parts!";
    elseif(!is_numeric($this->size) and isset($this->size))
      echo "Incorrectly entered size! Please use only numbers and '.' between whole and decimal parts!";
    elseif(!is_numeric($this->weight) and isset($this->weight))
      echo "Incorrectly entered weight! Please use only numbers and '.' between whole and decimal parts!";
    elseif(!is_numeric($this->width) and isset($this->width))
      echo "Incorrectly entered width! Please use only numbers and '.' between whole and decimal parts!";
    elseif(!is_numeric($this->height) and isset($this->height))
      echo "Incorrectly entered height! Please use only numbers and '.' between whole and decimal parts!";
    elseif(!is_numeric($this->length) and isset($this->length))
      echo "Incorrectly entered length! Please use only numbers and '.' between whole and decimal parts!";
    else
      return true;
  }
function Insert_in_db($dbc)
  {
    if (isset($this->size))
      {
        $query = "INSERT INTO `product`(`SKU`, `Name`, `Price`, `Type`) VALUES ('$this->SKU' ,'$this->name','$this->price', '$this->type' ) ";
        $data = mysqli_query($dbc,$query);
        $query = "INSERT INTO `dvd`(`Prod_SKU`, `Size_MB`) VALUES ('$this->SKU' ,'$this->size') ";
        $data = mysqli_query($dbc,$query);
      }
    elseif(isset($this->weight))
      {
        $query = "INSERT INTO `product`(`SKU`, `Name`, `Price`, `Type`) VALUES ('$this->SKU' ,'$this->name','$this->price', '$this->type' ) ";
        $data = mysqli_query($dbc,$query);
        $query = "INSERT INTO `book`(`Prod_SKU`, `Weight_kg`) VALUES ('$this->SKU' ,'$this->weight') ";
        $data = mysqli_query($dbc,$query);
      }
    elseif(isset($this->width) and isset($this->height) and isset($this->length))
      {
        $query = "INSERT INTO `product`(`SKU`, `Name`, `Price`, `Type`) VALUES ('$this->SKU' ,'$this->name','$this->price', '$this->type' ) ";
        $data = mysqli_query($dbc,$query);
        $query = "INSERT INTO `furniture`(`Prod_SKU`, `Height`, `Width`, `Length`) VALUES ('$this->SKU' ,'$this->height', '$this->width', '$this->length') ";
        $data = mysqli_query($dbc,$query);
      }
  }
function delete($Product)
  {
    unset($Product);
    header("Location:/add.php");
  }
}
$product = new Product;
$product->Init();
if($product->EmptyInput() == true)
  if($product->CorrectInput() == true)
    {
      $product->Insert_in_db($dbc);
      $product->delete($product);
    }
?>
