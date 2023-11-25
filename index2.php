<?php include('includes/header.php');?>   
   
   
   
    

        <div class="row">
            <div class="col-md-8 mx-auto my-4">
                <h2 class="text-primary">Últimas Notícias</h2>
                <?php
                    include 'post.php';
                    $posts = getPosts();

                    foreach ($posts as $post) {
                        echo "<div class='post mb-4 p-3 bg-light'>";
                        echo "<h3 class='text-primary'>{$post['title']}</h3>";
                        echo "<p>" . nl2br($post['content']) . "</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    


    <?php include('includes/footer.php');?>