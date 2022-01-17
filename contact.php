<?php
session_start();
     $_SESSION;
     include("connect_database.php");
     include("functions.php");
     $user_data=check_login($conn);
?>




<style>
p 
{
    text-align:center;

}

.contact
{
    color:black;
    background-color:grey;
    text-align:center;
    padding: 20%;
}
    </style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Avid Reader</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php  include_once("includes/navbar.php"); ?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    
                    <!-- Post content-->
                    <div class="contact">
                    <h1>Contact Us </h1>
                    <h6>Please reach us for any query</h6>
                    <p>Email:avidreader.blog@gmail.com</p>
                    </div>
                    <!-- Comments section-->
                   
                </div>
                <!-- Side widgets-->
                <?php include_once("includes/sidebar.php") ?>
            </div>
        </div>
        <!-- Footer-->
       <?php include_once("includes/footer.php"); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
