<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles_index.css">
<header>
  <h1>Product List</h1>
  <form id="action_type1" name = "delete" action = "controllers/del_list_oop.php" method = "post">
    <select id="action_type" name="action" onchange="getActionType()">
      <option value="del_all">Mass delete action</option>
      <option value="del_sel" selected="selected">Delete selected</option>
    </select>
    <script src = "js/getActionType.js"></script>
    <input type = "submit" id = "apply" name = "apply" value = "Apply"/></br>
<hr>
</header>
<body>
  <div>
    <?
      require 'controllers/db_config.php';
      require 'controllers/ClassList.php';
    ?>
  </div>
</form>
</body>
<div class = "container" id = "footer">
    <a href = "add.php">Add Product</a>
</div>
</html>
