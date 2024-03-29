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
                        if(!empty($_POST["remember"]))   
                        {  
                          setcookie ("member_login",$user_name,time()+ (10 * 365 * 24 * 60 * 60));  
                          setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
                        }
                        else  
                        {  
                         if(isset($_COOKIE["member_login"]))   
                         {  
                          setcookie ("member_login","");  
                         }  
                         if(isset($_COOKIE["member_password"]))   
                         {  
                          setcookie ("member_password","");
                         }  
                        }  
                            $_SESSION['user_id']=$user_data['user_id'];
                            if($user_name=='admin')
                            {
                                header("Location: adminpanel.php");
                            }
                            else
                            {
                              header("Location: index.php");
                            }
                              die;
                       }
                }
                $message="wrong username or password";
            }
           

        }
        else
        {
            $message="Please enter valid information";

        }
    }


?>


    <!DOCTYPE html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    
        <link rel="stylesheet" href="fonts/icomoon/style.css">
    
        <link rel="stylesheet" href="css/owl.carousel.min.css">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- Style -->
        <link rel="stylesheet" href="css/style.css">
    
        <title>Login AvidReader</title>
      </head>
      <body>
      
    
      <div class="d-md-flex half">
        <div class="bg" style="background-image: url('https://i.pinimg.com/736x/d0/91/a4/d091a4f02b7e64d126f2985fa8bdd34b.jpg');"></div>
        <div class="contents">
    
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12">
                <div class="form-block mx-auto">
                  <div class="text-center mb-5">
                  <h3>Login to <strong>AvidReader</strong></h3>
                  <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                  </div>
                  <form action="#" method="POST">
                    <div class="form-group first">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" placeholder="your-email@gmail.com" name="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
                    </div>
                    <div class="form-group last mb-3">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" placeholder="Your Password" name="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="remember" ?>
                      <label for="remember-me">Remember me</label>
                    </div>
                    <div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
                    <input type="submit" value="logIn" class="btn btn-block btn-primary">
    
                  </form>
                  <p class="text-center">Not a member? <a href="signup.php">Sign Up</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        
      </div>
        
        
    
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
      </body>
    </html>