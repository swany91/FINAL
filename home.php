<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>
</title>  
<link type="text/css" rel="stylesheet" href="homecss.css" />
</head>
<body>


<div id="navbar">
<div id="see">
<ul class="nav">
<li><a href="">Menu</a></li>
<li><a href="">Reservations</a></li>
<li id="center"><a>Login</a></li>
<li class="icon">
    <a onclick="myFunction()">☰</a>
  </li>
</ul>    
</div> 
    
<script type="text/javascript">
    
var nav = document.getElementById("see");
var bar = document.getElementsByName("ul");

window.onscroll = function(){
    
    if(window.pageYOffset>100){
        
        
        nav.style.background = "#8B4513";
        nav.style.boxShadow = "0px 8px 16px 0px rgba(0,0,0,0.4)";
        
    }
    else{
        
        nav.style.background = "rgba(0,0,0,0.5)";
    }
}


function myFunction() {
    document.getElementsByClassName("nav")[0].classList.toggle("responsive");
}

window.onclick = function(event) {
    if (event.target == bar) {
        bar.style.display = "none";
    }
}

    
</script>
    
    
<center>
<div id="message">
    <p>Reservations and meal ordering just got better and far easier.</p>
</div>
</center>

</div>
    
    
<div id="myModal" class="modal">
<?php

$conn = new mysqli('localhost','root','','restaurant_db');

if ($conn->connect_error) {
    
  echo "Error";  
}

 if(isset($_POST['first']) && !empty($_POST['first']) AND isset($_POST['last']) && !empty($_POST['last']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['tel']) && !empty($_POST['tel']) AND isset($_POST['pass']) && !empty($_POST['pass']))
 
 {
     
     $fname = mysql_escape_string($_POST['first']);
     $lname = mysql_escape_string($_POST['last']);
     $email = mysql_escape_string($_POST['email']);
     $tel = mysql_escape_string($_POST['tel']);
     $pass = mysql_escape_string($_POST['pass']);
     
    
     $hash = md5( rand(0,1000) );
     
     
$query = "INSERT INTO customer_details (Firstname, Lastname, Email, Tel, Password, hash) VALUES(
'". mysql_escape_string($fname) ."', 
'". mysql_escape_string(md5($lname)) ."', 
'". mysql_escape_string($email) ."',
'". mysql_escape_string($tel) ."',
'". mysql_escape_string($pass) ."', 
'". mysql_escape_string($hash) ."')";
     
$check = $conn -> query($query);
     
}
?>

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
      <span class="clos">×</span>
      <center><h2 style="color: #8B4513;font-family:'AlexBrush-Regular';">Please Enter your credentials</h2></center>
      <hr class="hr">
    </div>
    <div class="Modal-body">
    <form>
    <div class="form-group">
    <label for="Email">Email :</label> <br>
    <input type="email" id="em1" class="input" placeholder="Enter Email" autofocus/><br> 
    </div>
    <div class="form-group">
    <label for="Password">Password:</label> <br>
    <input type="password" id="pw1" class="input" placeholder="Enter Password" /><br>
    </div>
    <center><input id="submit" type="submit" value="Login" name="submit" /></center>
     </form>
    </div>
    <div class="Modal-footer">
    </div>
  </div>

</div> 
    

    
<div id="mid2" >
    
<div class='mid3'>
<h1 class="tag">Reserve Table & Order online.</h1>
<hr class="hr">
<hr class="hr">
<p id="p1">You can save time and reduce stress by making <span class="tag">reservations</span> online anywhere and everywhere.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>    
</div>
</div>
    
<div class="container">
    
<div class="parallax">
<br>
<br>
<br>
<br>
    
<div id="mid4">
    <center><h1 class="tag">Create a personalized feel.</h1></center>
    <hr id="hr1">
    <p class="p">You get to signup and create a profile where you can save your favorite order,enjoy discounts and receive information about any promotions the restaurant advertises.</p>
    <center><button id="myBtn" class="con"><span>SignUp</span></button></center>
</div>
 <br>
 <br>
 <br>
<br>   
 </div>   


</div>
    
<script>
// Get the modal
var modal = document.getElementById('myModal');
var modala = document.getElementById('Modal');
var mod = document.getElementById('mod');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btna = document.getElementById("center");
var sub = document.getElementById("submit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var spana = document.getElementsByClassName("clos")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
spana.onclick = function() {
    modala.style.display = "none";
}
btna.onclick = function() {
    modala.style.display = "block";
}
sub.onclick = function() {
    mod.style.display = "block";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal || event.target == modala) {
        modal.style.display = "none";
        modala.style.display = "none";
    }
}
</script>
    

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