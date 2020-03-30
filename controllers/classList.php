<?
require 'db_config.php';
class ShowList
{
  function delete($list)
    {
      unset($list);
    }
  function Show($dbc)
    {
      $query ="SELECT * FROM `product`";
      $result = mysqli_query($dbc, $query);
      if($result)
        {
          $rows = mysqli_num_rows($result); // количество полученных строк
          for ($i = 0 ; $i < $rows ; ++$i)
          {
            echo "<div class = \"container\">";
            echo "<input type=\"checkbox\" name=\"Product[$i]\">  <label for=\"Product\"></label>";
            echo "<ul>";
              $row = mysqli_fetch_row($result);
              echo "<li>";
                  for ($j = 0 ; $j < 4 ; ++$j)

                    echo "$row[$j]</li></br>";
                    if ($row[3] == "dvd")
                      {
                        $query1 ="SELECT `Size_MB` FROM `dvd` WHERE `Prod_SKU` = '$row[0]'";
                        $result1 = mysqli_query($dbc, $query1);
                        $sec_res = mysqli_fetch_row($result1);
                        echo "<li>Size : $sec_res[0] MB</li>";
                      }
                   elseif ($row[3] == "book")
                   {
                     $query1 ="SELECT `Weight_kg` FROM `book` WHERE `Prod_SKU` = '$row[0]'";
                     $result1 = mysqli_query($dbc, $query1);
                     $sec_res = mysqli_fetch_row($result1);
                     echo "<li>Weight : $sec_res[0] kg</li>";
                   }
                   else
                   {
                     $query1 = "SELECT `Height` FROM `furniture` WHERE `Prod_SKU` = '$row[0]'";
                     $query2 = "SELECT `Width` FROM `furniture` WHERE `Prod_SKU` = '$row[0]'";
                     $query3 = "SELECT `Length` FROM `furniture` WHERE `Prod_SKU` = '$row[0]'";
                     $result1 = mysqli_query($dbc, $query1);
                     $result2 = mysqli_query($dbc, $query2);
                     $result3 = mysqli_query($dbc, $query3);
                     $sec_res = mysqli_fetch_row($result1);
                     echo "<li>Dimensions : $sec_res[0] x";
                     $sec_res = mysqli_fetch_row($result2);
                     echo " $sec_res[0] x";
                     $sec_res = mysqli_fetch_row($result3);
                     echo " $sec_res[0] cm</li>";

                   }
            echo "</ul></div>";
          }
        }
      }
  }

$List = new ShowList;
$List->Show($dbc);
$List->delete($List);
?>
