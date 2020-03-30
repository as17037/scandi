<!DOCTYPE html>
<html>
<head>
  <title>Product add</title>
</head>
<body>
  <header>
    <h1>Product add</h1>
    <hr>
  </header>
    <body>
      <a href = "index.php">Product List</a>
    <form name = "product" action = "controllers/add_prod_oop.php" method = "post">
      <div name = "first_part" id = "first">
        <label>SKU: </label></br>
        <input type = "text" name = "SKU"/></br>
        <label>Name: </label></br>
        <input type = "text" name = "Name"/></br>
        <label>Price: </label></br>
        <input type = "text" name = "Price"/></br>
        <label>Type switcher: </label></br>
        <form name ="drop-down" id = "1" action = "" method = "post">

        <select id="prod_type" name="type" onchange="getProdType()">
            <option value="dvd">DVD-disc</option>
            <option value="book">Book</option>
            <option value="furniture">Furniture</option>
        </select>
      </form>
      </div>
        <div name = "second_part" id = "sec">
        <script src="js/getProdType.js">      </script>
      </div>
    </form>
</body>
</html>
