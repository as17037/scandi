function getProdType()
{
  document.getElementById("sec").remove();
  var select = document.getElementById("prod_type");
  var value = select.value;
  if (value == "dvd")
  {
    select.insertAdjacentHTML('afterend', '  <div name = "second_part" id = "sec">  <label>Size (MB): </label></br>  <input type = "text" name = "Size"/></br></br><button id = "sendform" type="submit" name = "Save">Save</button> </div> ');
  }
  else if (value == "book")
  {
    select.insertAdjacentHTML('afterend', '<div name = "second_part" id = "sec">  <label>Weight (Kg): </label></br>  <input type = "text" name = "Weight"/></br></br><button id = "sendform" type="submit" name = "Save">Save</button></div>');
  }
  else if (value == "furniture")
  {
    select.insertAdjacentHTML('afterend', '<div name = "second_part" id = "sec">  <label>Height (cm): </label></br>  <input type = "text" name = "Height"/></br> <label>Width (cm): </label></br>  <input type = "text" name = "Width"/></br>  <label>Length (cm): </label></br>  <input type = "text" name = "Length"/></br></br><button id = "sendform" type="submit" name = "Save">Save</button></div>');
  }
}
getProdType();
