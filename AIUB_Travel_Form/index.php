<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);
if(!$con){
    die("Connection to the database failed due to " .mysqli_connect_error());

}
$name  = $_POST['name'];
$id = $_POST['id'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `id`, `email`, `phone`, `date`) VALUES ('$name', '$id', '$email', '$phone', current_timestamp());";

if($con->query($sql) == true){
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg"src="bg.jpg" alt="AIUB">
 <div class="container">
  <h1>Welcome to AIUB Travel Form</h1>
  <p> Enter your details to confirm</p> 
  <?php
  if($insert == true){
  echo "<p class='submitMsg'> Thanks for submitting the form</p>";
}
  ?>
  <form action="index.php" method="post">
      <input type="text" name="name" id="name" placeholder="Enter Your Name">
      <input type="number" name="id" id="id" placeholder="Enter Your ID">
        
      <input type="email" name="email" id="email" placeholder="Enter Your Email">
      <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
       <button class="btn">Submit</button>
           
    </form>
 </div>
 <script  src="index.js"></script> 

</body>
</html>