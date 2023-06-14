<?php
session_start();
$_SESSION;
     include("connect_database.php");
     include("functions.php");
     $user_data=check_login($conn);
     //print_r($user_data);
     if($user_data['user_name']!='admin')
     {
        header("Location:index.php");
        die;  
     }
?>






<!DOCTYPE html>
<html>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="container mt-5">

<div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  <a href="post_creation_admin.php" class="w3-bar-item w3-button">Create Post</button>
  <a href="manage_post.php" class="w3-bar-item w3-button">Manage Post</a>
  <a href="manage_user.php" class="w3-bar-item w3-button">Manage User</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    
</div>
<div style="margin-left:50%">
<strong>Admin Panel for AvidReader</strong>
<br><br>
<p><?php 
    
        $sql="SELECT * FROM blogposts";
        $result= mysqli_query($conn,$sql);
        $number_of_results= mysqli_num_rows($result);
        echo "Total number of posts: ".$number_of_results."<br><br>";
        $sql="SELECT * FROM users";
        $query= mysqli_query($conn,$sql);
        $tot=mysqli_num_rows($query);
        echo "Total number of users: ".$tot."<br><br>";
?></p>
</div>
</div>
</div>
</body>
</html>
