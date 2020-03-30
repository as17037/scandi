function getActionType()
{
  var select = document.getElementById("action_type");
  var value = select.value;
  if (value == "del_all")
    {
    var aa = document.getElementById('action_type1');
    for (var i = 0; i < aa.elements.length; i++)
      {
       aa.elements[i].checked = true;
       aa.elements[i].disabled = true;
       document.getElementById('apply').disabled = false;
       select.disabled = false;
      }
    }
 else if (value == "del_sel")
 {
   var aa = document.getElementById('action_type1');
   for (var i = 0; i < aa.elements.length; i++)
     {
      aa.elements[i].checked = false;
      aa.elements[i].disabled = false;
      document.getElementById('apply').disabled = false;
      select.disabled = false;
     }
   }
 }
getActionType();
