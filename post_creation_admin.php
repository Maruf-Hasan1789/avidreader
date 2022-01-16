<?php
session_start();
     $_SESSION;
     include("connect_database.php");
     include("functions.php");
     $user_data=check_login($conn);
     if($user_data['user_name']!='admin')
     {
        header("Location:home.php");
        die;  
     }
?>


<?php
    if(isset($_POST['upload']))
    {
        $title=$_POST['title'];
        $content=$_POST['content'];
        $category=$_POST['category'];
        $image_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        echo strlen($content);
        if(empty($title) || empty($content) || empty($category) || empty($image_name))
        {
            
            headder(Location: "post_creation_admin.php");
           die;  
        }
       
        $folder="images/".$image_name;
        move_uploaded_file($tmp_name,$folder);
       // print_r($_FILES['image']);
       // echo $content;
       $in_query="INSERT INTO blogposts (title, content,Category) VALUES ('$title','$content','$category')";
       mysqli_query($conn,$in_query);
    //   {
       //  header("Location:post_creation_admin.php");
      //   die;
      // }
       //echo "fasf";
       $squery="select * from blogposts where title LIKE '%$title%'";
       $records=mysqli_query($conn,$squery);
     //  print_r($records);

       $uploaded_post= mysqli_fetch_assoc($records);
      // print_r($uploaded_post);
       $uploaded_id=$uploaded_post['post_id'];
       //echo $uploaded_id;
       $inquery="insert into images (image_id,post_id,images) values ('$uploaded_id','$uploaded_id','$image_name')";
       if(mysqli_query($conn,$inquery));
       {
         //echo "uploaded successfully";
       }
      }

?>






<!DOCTYPE html>
<html>
<title>Admin Panel for post creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  <a href="post_creation_admin.php" class="w3-bar-item w3-button">Create Post</button>
  <a href="manage_post.php" class="w3-bar-item w3-button">Manage Post</a>
  <a href="manage_user.php" class="w3-bar-item w3-button">Manage User</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>


<style> 
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}



</style>
</head>
<body>
<div style="margin-left:25%">
<form action="" method="post" enctype="multipart/form-data">
    <div>
Title: <input type="text" name="title">
<label for="category">Category</label>
    <select id="category" name="category">
      <option value="Art">Art</option>
      <option value="Biography">Biograph</option>
      <option value="Classics">Classics</option>
      <option value="Fantasy">Fantasy</option>
      <option value="History">History</option>
      <option value="Mystery">Mystery</option>
      <option value="Poetry">Poetry</option>
      <option value="Pshycology">Pshycology</option>
      <option value="Romance">Romance</option>
      <option value="Science">Science</option>
      <option value="Science Fiction">Science Fiction</option>
      <option value="Thriller">Thriller</option>
      <option value="Religion">Religion</option>
      <option value="Crime">Crime</option>
    </select>
    
</br>
Content: <textarea name="content"></textarea>
    Image :<input type="file" id="image" name="image">
    <br>
    <div>
    <button type="submit" name="upload">Submit</button>
</div>
</div>


</form>

</div>
</body>
</html>


