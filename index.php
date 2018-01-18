<?php

$conn = new mysqli('localhost','root','','restaurant_db');

?>

<?php
    
if(isset($_POST['submit'])){
    
$name = $_POST['name'];
$price = $_POST['price'];
$details = $_POST['details'];
$category = $_POST['category'];
$ingred = $_POST['ingredients'];
    
if($_POST['name'] == '' ||  $_POST['price'] == '' || $_POST['details'] == '' || $_POST['ingredients'] == ''){
        
echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<span class='close'>X</span>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Error message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Please fill all fields.</h1></p>
</div>
<div class='modal-footer'>
</div>
</div>

</div>"; 
}
    
else{
    

$image = mysql_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
$imagetype = mysql_escape_string($_FILES["image"]["type"]);
$imageName = mysql_escape_string($_FILES["image"]["name"]);

    
if(substr($imagetype,0,5) == "image"){
    
    $query = "INSERT INTO food_items VALUES (' ','$imageName','$image','$name','$price','$details','$category','$ingred')";
    $check = $conn -> query($query);
    
echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<span class='close'>×</span>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Confirmation message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Item add Successful!!.</h1></p>
</div>
<div class='modal-footer'>
</div>
</div>

</div>";
}

else{
    
echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<span class='close'>×</span>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Error message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Only images allowed please.</h1></p>
</div>
<div class='modal-footer'>
</div>
</div>

</div>";
}

}
}
    
   
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>
</title>  
<link rel="stylesheet" href="../homecss.css" />
</head>
<body>
    
<div id="navbar1">
<div id="see">
<ul class="nav">
<li><a href="">View reservations</a></li>
<li><a href="">View report</a></li>
<li><a>View Orders</a></li>
<li><a href="#tag2">View food items</a></li>
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
<br>
<br>
<br>
<br>
<br>
<div id="formdata">
    

    <form id="form1" method="post" action="index.php" enctype="multipart/form-data">
    <center><h2 style="color: #8B4513;font-family:'AlexBrush-Regular';">Add food items form</h2></center>
      <hr class="hr">
    <div class="form-group">
    <label for="name">Name of food:</label><br> 
    <input type="text" id="name" name="name" class="input" placeholder="Enter Food name" autofocus/><br> 
    </div>
    <div class="form-group">
    <label for="price">Price:</label><br> 
    <input type="text" id="price" name="price" class="input" placeholder="Enter Price" /><br> 
    </div>
    
    <div class="form-group">
        <label for='category'>Category:</label>
        <select id="file" name="category">
        <option value="dessert">Dessert</option>
        <option value="wine">Wine</option>
        <option value="meal">Meals</option>
        </select>
    </div>
    <div class="form-group">
    <input type="file" id="image" name="image" /><br>
    </div>
    <div class="form-group">
    <label for="details">Details</label><br>
    <textarea name="details" id="details" placeholder="Write details..."></textarea>
    </div>
    <div class="form-group">
    <label for="details">Major ingredients</label><br>
    <textarea name="ingredients" id="major" placeholder="Write details..."></textarea><br>
    </div>
   <br>
   <br>
    <center><input class="sub" type="submit" value="Add item" name="submit" /><input class="sub" style="margin-left:30px"type="reset" value="Reset" name="reset" /></center>
    
    


    
</form> 
    


</div>
</div>
    

<center>


<div id="ply" class="box">

<h1 class="tag2" id="tag2">A full list Food Items.</h1>
<table class="table" width="10" height="10" border="10" bordercolor="purple">


<tr>
	<th>Id</th>
    <th>Food name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Main_ingredients</th>
    <th>Details</th>
    <th></th>
    <th></th>
    
</tr>
    
    
    
    

<?php
    
if ($conn->connect_error) {
    
  echo "Error";  
}
    
        $db1 = "SELECT id,food_name,price,category,major_ingredients,details FROM food_items";
        $check1 = $conn -> query($db1);
    
        $c1 = mysqli_num_rows($check1);
        
         while($see = mysqli_fetch_array($check1)){
            
            $id = $see["id"];
            $name = $see["food_name"];
            $price = $see["price"];
            $cat = $see["category"];
            $major = $see["major_ingredients"];
            $detail = $see["details"];
         
    
    echo
    "<tr>
	<td>$id</td>
    <td>$name</td>
    <td>GHS $price</td>
    <td>$cat</td>
    <td>$major</td>
    <td>$detail</td>
    <td><a class='con1' href='index.php?pid=$id'>Edit</a></td>
    <td><a class='con1' href='index.php?deleteid=$id'>Delete</a></td>
    
     </tr> ";
}
?>
</table>


</div>
</center>

<?php
    
if(isset($_POST['check'])){
    
$id = mysql_escape_string($_POST['pid']);  
$name = mysql_escape_string($_POST['name']);
$price = mysql_escape_string($_POST['price']);
$details = mysql_escape_string($_POST['details']);
$category = mysql_escape_string($_POST['category']);
$ingred = mysql_escape_string($_POST['ingredients']);
$image = mysql_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
$imagetype = mysql_escape_string($_FILES["image"]["type"]);
$imageName = mysql_escape_string($_FILES["image"]["name"]);
                              
$querya = "UPDATE food_items SET name='$imageName', image='$image',food_name='$name',price='$price',details='$details',category='$category',major_ingredients='$ingred' WHERE id='$id'";
      
$check2 = $conn->query($querya);
    
if($check2){
echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<span class='close'>×</span>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Confirmation message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Item edit Successful!!.</h1></p>
</div>
<div class='modal-footer'
</div>
</div>

</div>";
    
}
    else{
        
echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<span class='close'>×</span>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Error message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Item edit unsuccesful.</h1></p>
</div>
<div class='modal-footer'
</div>
</div>

</div>";
    }

}
?>    
    
<?php
    
if(isset($_GET['pid'])){
     $targetID = $_GET['pid'];
     $query2 = "SELECT * FROM food_items WHERE id='$targetID'";
     $check2 = $conn -> query($query2);
    
     $c2= mysqli_num_rows($check2);
    
         while($see1 = mysqli_fetch_array($check2)){
            
            $id = $see1["id"];
            $name = $see1["food_name"];
            $price = $see1["price"];
            $cat = $see1["category"];
            $majors = $see1["major_ingredients"];
            $detaila = $see1["details"];
             
    
    
}
    
 echo
 "<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='mo-content'>
<div class='modal-header'>
<span class='close'>×</span>
</div>
<div class='modal-body'>
<form method='post' id='check' action='index.php' enctype='multipart/form-data'>
    <center><h2 style='color: #8B4513;font-family:'AlexBrush-Regular';'>Add food items form</h2></center>
    <div class='form-group'>
    <label for='name'>Name of food:</label><br> 
    <input type='text' id='name' name='name' class='input1' value='$name' autofocus /><br> 
    </div>
     <div class='form-group'>
    <label for='price'>Price:</label><br> 
    <input type='text' id='price' name='price' class='input' value='$price' /><br> 
    </div>
    <div class='form-group'>
        <label for='category'>Category:</label>
        <select id='file' name='category'>
        <option value='$cat'>$cat</option>
        <option value='dessert'>Dessert</option>
        <option value='wine'>Wine</option>
        <option value='meal'>Meals</option>
        </select>
    </div>
    <div class='form-group'>
    <input type='file' id='image' name='image'/><input type='hidden' id='pid' name='pid' value='$targetID' /><br>
    </div>
    <div class='form-group'>
    <label for='details'>Details</label><br>
    <textarea name='details' id='details'>$detaila</textarea>
    </div>
    <div class='form-group'>
    <label for='ingredients'>Major ingredients</label><br>
    <textarea name='ingredients' id='major'>$majors</textarea><br>
    </div>
    <center><input class='sub' type='submit' value='Edit' name='check' /></center>


</form>
</div>
<div class='modal-footer'
</div>
</div>

</div>";
    
}    
    
?>


    
<?php
    
if(isset($_GET['deleteid'])){
$delete = $_GET['deleteid'];    
    
echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<span class='close'>×</span>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Confirmation message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Are you sure want to delete this item</h1></p>
</div>
<div class='m-footer'>
<br>
<br>
<center><a href='index.php?yesdelete=$delete'><button class='sub' name='go' >Yes</button></a><a href='index.php'><button class='sub' style='margin-left:30px'>No</button></a></center>
</div>
</div>

</div>";
}    
    
?> 
<?php
if(isset($_GET['yesdelete'])){
    
$yes = $_GET['yesdelete'];

$query = "DELETE FROM food_items WHERE id='$yes'";
$check = $conn -> query($query);
if($check){

echo
"<div id='myModal' class='mo'>

<!-- Modal content -->
<div class='Modal-content'>
<div class='modal-header'>
<center><h2 style='color:#8B4513;font-family:AlexBrush-Regular;'>Confirmation message</h2></center>
<hr class='hr' style='margin-top:-10px'>
</div>
<div class='modal-body'>
<center><p style='font-family:Quicksand-Regular;font-size:25px;margin-top:40px'>Item Delete successful!.</h1></p>
</div>
<div class='modal-footer'>
<br>
<br>
<br>
<br>
<center><a href='index.php'><button class='sub'>Ok</button></a></center>
</div>
</div>

</div>";
        
}
    exit();
}

?> 
    
    
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        

    
</body>
</html>