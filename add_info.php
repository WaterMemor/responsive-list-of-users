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


$id = $conn->query("SELECT MAX(id) FROM points");
while($row = mysqli_fetch_assoc($id)){
    $MAXid = current($row);
}

$id = 1;
if(isset($_POST['delete'])){
while($id<=$MAXid){
$result = $conn->query("DELETE FROM points WHERE id = '$id'");

$id = $id + 1;
}
exit('<meta http-equiv="refresh" content="0; url=index.php" />');
} else {
  if(isset($_POST['clean'])){
    $points = 0;
    while($id<=$MAXid){
      $result = $conn->query("UPDATE points SET points='$points' WHERE id='$id'");
      
      $id = $id + 1;
  }
  $points=1;
  exit('<meta http-equiv="refresh" content="0; url=index.php" />');
} else{
    $result = $conn->query("SELECT id,points FROM points WHERE user = '$user'");
    while($row = mysqli_fetch_assoc($result)){
        print_r($row);
        
        $id = current($row);
        $point= next($row);
        if(isset($_POST['add'])){
          $points = $point+$like;
        }
        if(isset($_POST['delete_point'])){
          $points = $point-$like;
        }
    
        $query =$conn->query("UPDATE points SET points='$points' WHERE id='$id'");
        exit('<meta http-equiv="refresh" content="0; url=index.php" />');
      }
  }

 if ($points == 0){
  $id = $conn->query("SELECT MAX(id) FROM points");
  while($row = mysqli_fetch_assoc($id)){
    $MAXid = current($row);
    $MAXid = $MAXid +1;
  }
  $points = 1;
  $result = $conn->query("INSERT INTO points (id, user, points) VALUES ('$MAXid','$user', '$points')");
  exit('<meta http-equiv="refresh" content="0; url=index.php" />');
 }


  $conn->close();
}
?>


</body>
</html>
