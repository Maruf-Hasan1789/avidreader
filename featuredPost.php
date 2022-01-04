<div class="card mb-4">
                   
                   <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                   <div class="card-body">
                       <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($POST['created_at']))?> </div>
                       <h2 class="card-title"><?php echo $POST['title']?></h2>
                       <p class="card-text text-truncate"><?php echo $POST['content'] ?></p>
                       <a class="btn btn-primary" href="post.php ? id=<?php echo $POST['post_id']?>">Read More</a>
                       
                   </div>
               </div>