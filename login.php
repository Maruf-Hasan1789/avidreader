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
            
            //read from  database
            $query="select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($conn,$query);
            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                       $user_data=mysqli_fetch_assoc($result);
                       
                       if($user_data['password']==$password)
                       {
                            $_SESSION['user_id']=$user_data['user_id'];
                            header("Location: home.php");
                            die;
                       }
                }
                echo "wrong username or password";
            }
           

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
	<title>Login </title>
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
    <h1>Login in Avidreader</h1>
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
    <a href="signup.php">Click to SignUp</a>
</div>

</form>
</div>
</body>
</html>

