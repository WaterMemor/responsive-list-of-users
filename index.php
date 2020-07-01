<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Instagram Win</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>


<div class="container">
  <form method="POST" action="add_info.php">
  <input type="text" name="user" placeholder="Write a username">
  <input id="add" type="submit" name="add" value="add">
  <input id="show" type="submit" name="show" value="show">
  <input id="clean" onclick="return confirm('Are you sure? After that you can\'t save your data')"type="submit" name="clean" value="clean">
  <input id="delete_point" type="submit" name="delete_point" value="-1">
  <input id="delete" onclick="return confirm('Are you sure? After that you can\'t save your data')" type="submit" name="delete" value="delete">
  </form>


</div>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username,$password);

if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
echo "Connection successfully";


?>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="form.js"></script>
</body>
</html>
