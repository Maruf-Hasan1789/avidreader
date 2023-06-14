<?php
session_start();
$_SESSION;
     include("connect_database.php");
     include("functions.php");
     $user_data=check_login($conn);
     if($user_data['user_name']!='admin')
     {
        header("Location:index.php");
        die;  
     }
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
          $old_title=$_POST['old_title'];
          $new_title=$_POST['new_title'];
          $category=$_POST['post_category'];
          if(!empty($old_title) && !empty($new_title))
          { 
            //read from  database
            if(!empty($category))
            {
               $query= "UPDATE blogposts SET title='$new_title',category='$category' where title like '%$old_title%'";     
            }
            else
            {
               $query= "UPDATE blogposts SET title='$new_title' where title like '%$old_title%'";
            }
            $result = mysqli_query($conn,$query);
            if($result)
            {
            //   echo "Updated SucessFully"."<br>";  
            }
          }
     }
?>






<!DOCTYPE html>
<html>
<title>Admin Panel for post modification</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  <a href="post_creation_admin.php" class="w3-bar-item w3-button">Create Post</button>
  <a href="manage_post.php" class="w3-bar-item w3-button">Manage Post</a>
  <a href="manage_user.php" class="w3-bar-item w3-button">Manage User</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    
</div>
<div style="margin-left:25%">
<br><br>
<h1 style="margin-left:25%">All posts from the blog AvidReader</h1>

<div style="margin-left:25%">
<form action="#" method="POST">
                    <div class="form-group first">
                      <label for="post_title">Old Title</label>
                      <input type="text" class="form-control" placeholder="Old Title" name="old_title">
                    </div>
                    <div class="form-group first">
                      <label for="post_title">New Title</label>
                      <input type="text" class="form-control" placeholder="New Title" name="new_title">
                    </div>
                    <div class="form-group last mb-3">
                      <label for="post_category">Category</label>
                      <input type="text" class="form-control" placeholder="New Category" name="post_category">
                    </div>
                    <input type="submit" value="update" id="update_btn"class="btn btn-block btn-primary" style="margin-left:10%"><br>
                  </form>
</div>

</div>
</body>
</html>
