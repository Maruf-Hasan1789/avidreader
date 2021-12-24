<?php

session_start();
    include("connect_database.php");
    include("functions.php");
    

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name= $_POST['username'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            
            //save to database
            $user_id = random_number(20);
            $query="insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            mysqli_query($conn,$query);
            header("Location: login.php");
            die;

        }
        else
        {
            echo "Please enter valid information";

        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
<style>
.center {
  margin: auto;
  width: 30%;
  height:40%;
  border: 3px solid #73AD21;
  padding: 10px;
}
.box
{
    margin:0 auto;
    width: 400 px;
    text-align:center;
}
</style>
</head>
<body>
<div class="center" style="background-color:grey;width=500px">
    <br><br>
    <h1>SignUp for Avidreader</h1>
    <br><br>
    <form action="#" method="POST">
	<div class="box">
	  <label>User Name</label><br>
	  <input type="text" name="username" required>	
</div>
    <br>
<div class="box">
	  <label>Password</label><br>
	  <input type="password" name="password" required>	
</div>

<div style="font: 20px;">
	  <input id="button" type="submit" value="Login">	
</div>
<div>
    <a href="login.php">Click to Login</a>
</div>

</form>
</div>
</body>
</html>

