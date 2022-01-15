<?php
session_start();
$_SESSION;
     include("connect_database.php");
     include("functions.php");
     $user_data=check_login($conn);
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
          $user_name_dlt=$_POST['user_name_delete'];
          if(!empty($user_name_dlt))
          { 
            
            $query= "DELETE from users where user_name like '%$user_name_dlt'";
            
            $result = mysqli_query($conn,$query);
            if($result)
            {
               echo "Updated SucessFully"."<br>";  
            }
          }
     }
?>






<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  <a href="post_creation_admin.php" class="w3-bar-item w3-button">Create Post</button>
  <a href="manage_post.php" class="w3-bar-item w3-button">Manage Post</a>
  <a href="manage_user.php" class="w3-bar-item w3-button">Manage User</a>
    
</div>
<div style="margin-left:25%">
<br><br>
<h1 style="margin-left:25%">All posts from the blog AvidReader</h1>

<div style="margin-left:25%">
<form action="#" method="POST">
                    <div class="form-group first">
                      <label for="User Name">User Name</label>
                      <input type="text" class="form-control" placeholder="UserName" name="user_name_delete">
                    </div>
                    <input type="submit" value="delete user" id="delete_btn"class="btn btn-block btn-primary" style="margin-left:10%"><br>
                  </form>
</div>

</div>
</body>
</html>
