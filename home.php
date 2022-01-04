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
if($page!=1)
{
    $results_per_page=8;
}
$sql="SELECT * FROM blogposts";
$result= mysqli_query($conn,$sql);
$number_of_results= mysqli_num_rows($result);
$number_of_pages=ceil($number_of_results/$results_per_page);



$starting_limit_number=($page-1)*($results_per_page);
if(isset($_GET['search']))
{
    $keyword=$_GET['search'];
    $sql = "SELECT * FROM blogposts where title LIKE '%keyboard%' ORDER BY post_id DESC LIMIT ".$starting_limit_number.','.$results_per_page;
}
else
{
    $sql = "SELECT * FROM blogposts ORDER BY post_id DESC LIMIT ".$starting_limit_number.','.$results_per_page;
}
$result=mysqli_query($conn,$sql);
$post_array=array();
$prev=$page-1;
$next=$page+1;



while($row= mysqli_fetch_assoc($result))
{
    $post_array[] = $row;
//    echo $row['title']." ".'<br>';
}


$len=count($post_array);
if($len==0)
{
    header("Location: home.php");
}
if($len!=$results_per_page)
{
    $rem=$results_per_page-$len;
    for($i=0;$i<$rem;$i++)
    {
        $post_array[] = $post_array[0];
    }
}

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
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php
                        $records=mysqli_query($conn,"select * from blogposts where post_id=3 limit 1");
                        $POST = mysqli_fetch_assoc($records);
                        if($page==1)
                        {
                            include_once("featuredPost.php");
                        }
                        else
                        {
                            include_once("otherpage.php");
                        }
                    ?>
                    
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <?php
                        $records=mysqli_query($conn,"select * from blogposts where post_id=3 limit 1");
                        $POST = mysqli_fetch_assoc($records);
                        ?>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[0]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[0]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[0]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[0]['post_id']?>">Read More</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[1]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[1]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[1]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[1]['post_id']?>">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[2]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[2]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[2]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[2]['post_id']?>">Read More</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[3]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[3]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[3]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[3]['post_id']?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
               
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
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                            <form action="searchpost.php" class="d-flex">
                                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
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