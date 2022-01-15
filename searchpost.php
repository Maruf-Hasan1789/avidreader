<?php
session_start();
     $_SESSION;
     include("connect_database.php");
     include("functions.php");
     $user_data=check_login($conn);
?>



<?php

if(!isset($_GET['page']))
{
    $page=1;
}
else
{
    $page = $_GET['page'];
}


$results_per_page=4;
$sql="SELECT * FROM blogposts";
$result= mysqli_query($conn,$sql);
$number_of_results= mysqli_num_rows($result);
$number_of_pages=ceil($number_of_results/$results_per_page);
$starting_limit_number=($page-1)*($results_per_page);

$keyword=$_GET['search'];

 $sql = "SELECT * FROM blogposts where title LIKE '%$keyword%' ORDER BY post_id DESC LIMIT ".$starting_limit_number.','.$results_per_page;
$result=mysqli_query($conn,$sql);
$post_array=array();
$number_of_results= mysqli_num_rows($result);
$number_of_pages=ceil($number_of_results/$results_per_page);
$starting_limit_number=($page-1)*($results_per_page);
$prev=$page-1;
$next=$page+1;










?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Avid Reader read as much as you can whenever you can</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="home.php">Avidreader</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Avid Reader Blog Home!</h1>
                    <p class="lead mb-0">Read whenever you can wherever you can</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                    <?php
                    $i=0;
                    while($row= mysqli_fetch_assoc($result))
                    {
                        
                        $post_array[] = $row;


                        


                        
                      ?>

                
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                        <?php
                                    $flg=false;
                                    $post_id_for_image=$row['post_id'];
                                    
                                    $images= getImagesByPost($conn,$post_id_for_image);
                                 //   echo $row['post_id'];
                                 //   echo gettype($images);
                                   /// print_r($images);
                                   // echo gettype(check_return($flg,$post_id_for_image,$images_id,$conn));
                                //    echo $images_id[$post_id_for_image].'<br>';
                                  //  echo gettype($images_id[$post_id_for_image]);
                                  //  print_r($images);
                                ?>

                            <!-- Blog post-->
                            <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="images/<?=$images[0]['images']?>" alt="..."></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($row['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $row['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $row['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $row['post_id']?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
             
                     <?php 
                     $i+=1;
                }
               ?>
                <!-- Pagination -->
                <nav aria-label="Page navigation example mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                        </li>

                        <?php for($i = 1; $i <= $number_of_pages; $i++ ): ?>
                        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                            <a class="page-link" href="home.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                        </li>
                        <?php endfor; ?>

                    <li class="page-item <?php if($page >= $number_of_pages) { echo 'disabled'; } ?>">
                        <a class="page-link"
                            href="<?php if($page >= $number_of_pages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                    </li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Avid Reader 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>