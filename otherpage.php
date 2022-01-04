


<div class="row">
                     
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[4]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[4]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[4]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[4]['post_id']?>">Read More</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[5]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[5]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[5]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[5]['post_id']?>">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[6]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[6]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[6]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[6]['post_id']?>">Read More</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on <?php echo date('F jS,Y',strtotime($post_array[7]['created_at']))?></div>
                                    <h2 class="card-title h4"><?php echo $post_array[7]['title']; ?></h2>
                                    <p class="card-text text-truncate"><?php echo $post_array[7]['content'] ?></p>
                                    <a class="btn btn-primary" href="post.php ? id=<?php echo $post_array[7]['post_id']?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>