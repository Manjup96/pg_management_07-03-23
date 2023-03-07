<!DOCTYPE html>
<html>
<body>

<h1>JavaScript Statements</h1>
<h2>The for Loop</h2>

<p>A nested loop (a loop inside a loop):</p>

<p id="demo"></p>

<script>
let text = "";
var floor=2,room=2,bed=2;
 var PG_Name="Sri Venkateswara Mens PG",
     manager_mobile="8834567891" ,
    manager_email="manjuprasad.4327@gmail.com";
     
for (let i = 1; i <= floor; i++) {
   
  for (let j = 1; j <=room; j++) {
    
     for (let k = 1;k <=bed; k++) {
   // text += k + "k = within k nested loop<br>";   
   
     fetch('https://iqbetspro.com/pg-management/configure-POST-API.php', {
  method: 'POST',
  body: JSON.stringify({
    "PG_Name":PG_Name,
     "manager_mobile":manager_mobile ,
    "manager_email":manager_email,
    
    "floor":i,
    "room":j,
    "bed":k   
    // "floor":floor,
    // "room":room,
    // "bed":bed,
      
  }),
  headers: {
    'Content-type': 'application/json; charset=UTF-8',
  }
  })
  .then(function(response){ 
  return response.json()})
  .then(function(data)
  {
    console.log(data);
   

}).catch(error => console.error('Error:', error)); 

   
   
    //document.getElementById("demo").innerHTML = text;
    }
  }
//document.getElementById("demo").innerHTML = text;
}
</script>

</body>
</html>
