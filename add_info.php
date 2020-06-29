<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Обработчик</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username,$password,$dbname);



$points = 0;
$like = 1;

if($_POST['user']) {
  $user = $_POST['user'];
 }

 $result = $conn->query("SELECT id,points FROM points WHERE user = '$user'");
if($result){
  while($row = mysqli_fetch_assoc($result)){
    print_r($row);
    
    $id = current($row);
    echo($id);
    $point= next($row);
    $points = $point+$like;
    echo($points);
    $query =$conn->query("UPDATE points SET points='$points' WHERE id='$id'");
  }
 } /*else{
  $result->close();
   $id = $conn->query("SELECT MAX(id) FROM points");
   $id =+1;
    $result = "INSERT INTO points (id, user, points) VALUES ('$id','$user', '$points')";
  }*/

  $result->close();
  $conn->close();

?>


</body>
</html>