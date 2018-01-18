<?php

$conn = new mysqli('localhost','root','','restaurant_db');
   
if ($conn->connect_error) {
    
  echo "Error";  
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>
</title>  
<link type="text/css" rel="stylesheet" href="menucss.css" />
    

</head>
<body>


<div id="navbar">
<div id="see">
<ul class="nav">
    <li><a><img id="log" src="images/icon1.PNG"/></a></li>
<li id="myBtn"><a>SignUp</a></li>
<li><a href="">Reservations</a></li>
<li id="center"><a>Login</a></li>
<li class="container" onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</li>
</ul>    
</div> 
    

 
<script type="text/javascript">
    

function myFunction(x) {
     document.getElementsByClassName("nav")[0].classList.toggle("responsive");
    x.classList.toggle("change");
}

</script>

<center>
<div id="message">
    <p>Choose from our wide range of delicious quisines.</p>
</div>
</center>

</div>
    
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <center><h2 style="color: #8B4513;font-family:'AlexBrush-Regular';">Please fill the form below</h2></center>
      <hr class="hr">
    </div>
    <div class="Modal-body">
    <form method="post" action="">
    <div class="form-group">
    <label for="Firstname">FirstName :</label><br> 
    <input type="text" id="fn" name="first" class="input" placeholder="Enter Firstname" autofocus/><br> 
    </div>
    <div class="form-group">
    <label for="Lastname">LastName :</label><br> 
    <input type="text" id="ln" name="last" class="input" placeholder="Enter Lastname" /><br> 
    </div>
    <div class="form-group">
    <label for="Email">Email :</label> <br>
    <input type="email" id="em" name="email" class="input" placeholder="Enter Email" /><br> 
    </div>
    <div class="form-group">
    <label for="Tel">Tel :</label> <br>
    <input type="text" id="tel" name="tel" class="input" placeholder="Enter number" /><br> 
    </div>
    <div class="form-group">
    <label for="Password">Password:</label> <br>
    <input type="password" id="pw" name="pass" class="input" placeholder="Enter Password" /><br>
    </div>
    <center><input id="sub" type="submit" value="Submit" name="submit" /></center>
     </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>

</div> 
    
<div id="Modal" class="Moda">

  <!-- Modal content -->
  <div class="Modal-content">
    <div class="Modal-header">
      <span class="clos">x</span>
      <center><h2 style="color: #8B4513;font-family:'AlexBrush-Regular';">Please Enter your credentials</h2></center>
      <hr class="hr">
    </div>
    <div class="Modal-body">
    <form>
    <div class="form-group">
    <label for="Email">Email :</label> <br>
    <input type="email" id="em" class="input" placeholder="Enter Email" autofocus/><br> 
    </div>
    <div class="form-group">
    <label for="Password">Password:</label> <br>
    <input type="password" id="pw" class="input" placeholder="Enter Password" /><br>
    </div>
    <center><input id="submit" type="submit" value="Login" name="submit" /></center>
     </form>
    </div>
    <div class="Modal-footer">
    </div>
  </div>

</div> 
    

<script type="text/javascript">

var modala = document.getElementById('Modal');
var modal = document.getElementById('myModal');
var btna = document.getElementById("center");
var btn = document.getElementById("myBtn");
var spana = document.getElementsByClassName("clos")[0];
var span = document.getElementsByClassName("close")[0];


spana.onclick = function() {
    modala.style.display = "none";
}
span.onclick = function() {
    modal.style.display = "none";
}

btna.onclick = function() {
    modala.style.display = "block";
}
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modala || event.target == modal) {
        modala.style.display = "none";
        modal.style.display = "none";
    }
}
</script>
    

<center>
<h1 class="tag">Our Menu.</h1>
<hr class="hr2">
</center>   
    
<div class="tab">
  <p class="tablinks" onclick="openCity(event, 'London')">Dish</p>
  <p class="tablinks" onclick="openCity(event, 'Paris')">Dessert</p>
    <p class="tablinks"onclick="openCity(event, 'Tokyo')">Drink</p>
</div>
    


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tabcontent.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

    
<center>

<div id="mid2" >
<div style="display:block" id="London" class="tabcontent">
 <center><p style="margin-top:100px;padding:0;line-height:2em">Choose from our wide range of main dishes both local and continental prepared by a seasoned chef and enjoy!!.</p></center>   
<hr class="hr">
<hr class="hr">
<?php
    
$db1 = "SELECT food_name,price,name,details FROM food_items WHERE category='meal'";
$check1 = $conn -> query($db1); 
 $c1 = mysqli_num_rows($check1);
        
         while($see = mysqli_fetch_array($check1)){
            
           
            $name = $see["food_name"];
            $price = $see["price"];
            $img = $see["name"];
             $detail = $see["details"];
            
            echo
                "<div class='img'>
                 <img class='food' style='width:300px;height:250px;' src='images/$img'>
                 <div class='desc'>$name</div>
                 <center><button class='con2'><span>Add to cart</span></button></center>
                 <div class='desc1'>GHS $price</div>
                 </div> ";
             
         }
    
?>
</div>

<div id="Paris" class="tabcontent">

<?php
    
$db1 = "SELECT food_name,price,name,details FROM food_items WHERE category='dessert'";
$check1 = $conn -> query($db1); 
 $c1 = mysqli_num_rows($check1);
        
         while($see = mysqli_fetch_array($check1)){
            
           
            $name = $see["food_name"];
            $price = $see["price"];
            $img = $see["name"];
             $detail = $see["details"];
            
            echo
                "<div class='img'>
                 <img class='food' style='width:300px;height:250px;' src='images/$img'>
                 <div class='desc'>$name</div>
                 <center><button class='con2'><span>Add to cart</span></button></center>
                 <div class='desc1'>GHS $price</div>
                 </div> ";
             
         }
    
?>
</div>

<div id="Tokyo" class="tabcontent">
<div class="img">
    <img class="food" style="width:300px;height:250px;" src="images/d6.png">
  <div class="desc">Add a description of the image here</div>
</div>    
    
<div class="img">
  <img class="food" style="width:300px;height:250px;" src="images/d2.jpe" >
  <div class="desc">Add a description of the image here</div>
</div>
<div class="img">
    <img class="food" style="width:300px;height:250px;" src="images/d5.jpg">
  <div class="desc">Add a description of the image here</div>
</div>    
    
</div>

</div>
</center>    


 <center><button class="con"><span>Order</span></button></center>    
    
    
    
<center>
<footer id="footer">
<div id="get">
<p class="par">Tel: 212-555-1212</p>
<p class="par">Email: info@catnet.com</p>
<p class="par">&copy 2017 CatNet. All Rights Reserved. Sitemap</p>
</div >   
</footer>
</center>
    
</body>
</html>
    