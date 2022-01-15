<?php



session_start();
    include("connect_database.php");
    include("functions.php");
    

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name= $_POST['username'];
        $password = $_POST['password'];
        echo $user_name;
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
                            if($user_name=='admin')
                            {
                                header("Location: adminpanel.php");
                            }
                            else
                            {
                              header("Location: home.php");
                            }
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
        <div class="bg" style="background-image: url('images/bg_1.jpg');"></div>
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
                      <input type="text" class="form-control" placeholder="your-email@gmail.com" name="username">
                    </div>
                    <div class="form-group last mb-3">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" placeholder="Your Password" name="password">
                    </div>
            
                    <input type="submit" value="logIn" class="btn btn-block btn-primary">
    
                  </form>
                  <p class="text-center">Not a member? <a data-toggle="tab" href="signup.php">Sign Up</a></p>
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