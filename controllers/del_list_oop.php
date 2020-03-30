<?
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
require 'db_config.php';
class delProd
{
  var $prod;
  var $action;
  function Init()
    {
      $this->prod = $_POST["Product"];
      $this->action = $_POST["action"];
    }
  function delSelected($dbc)
    {
      if ($this->action == "del_sel")
      {
        $query ="SELECT * FROM `product`";
        $result = mysqli_query($dbc, $query) or die("Error in db " . mysqli_error($dbc));
        if($result)
        {
            $rows = mysqli_num_rows($result); // количество полученных строк
            for ($i = 0 ; $i < $rows ; ++$i)
            {
              $row = mysqli_fetch_row($result);
               if($this->prod[$i] == "on")
              {
                      for ($j = 0 ; $j < 4 ; ++$j)
                      {
                        $success = "DELETE FROM `$row[3]` WHERE `Prod_SKU` = '$row[0]'";
                        $data = mysqli_query($dbc, $success);
                        $success = "DELETE FROM `product` WHERE `SKU` = '$row[0]'";
                        $data = mysqli_query($dbc, $success);
                        header("Location: /index.php");
                      }
              }
            }
            // очищаем результат
            mysqli_free_result($result);
        }
      }

    }
  function delAll($dbc)
    {
      if($this->action == "del_all")
      {
        $query ="SELECT * FROM `product`";
        $result = mysqli_query($dbc, $query) or die("Error in db " . mysqli_error($dbc));
        if($result)
        {
            $rows = mysqli_num_rows($result); // количество полученных строк
            for ($i = 0 ; $i < $rows ; ++$i)
            {
              $row = mysqli_fetch_row($result);
                      for ($j = 0 ; $j < 4 ; ++$j)
                      {
                        $success = "DELETE FROM `$row[3]` WHERE `Prod_SKU` = '$row[0]'";
                        $data = mysqli_query($dbc, $success);
                        $success = "DELETE FROM `product` WHERE `SKU` = '$row[0]'";
                        $data = mysqli_query($dbc, $success);
                        header("Location: /index.php");
                      }
             }
            // очищаем результат
            mysqli_free_result($result);
        }
    }
  }
  function CheckForEmpty()
    {
      if(empty($this->prod) and $this->action != "del_all")
        echo "<br>Error, nothing have been chosen";
      else
        return false;
    }
  function delete($del)
    {
      unset($del);
      header("Location:/index.php");
    }
}

$del = new delProd;
$del -> Init();
if ($del -> CheckForEmpty() == false)
  $del -> delSelected($dbc);
  $del -> delAll($dbc);
  $del->delete($del)
?>
