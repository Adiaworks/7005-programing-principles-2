<?php
    include 'classes/postSeeder.php';
    include 'classes/commentSeeder.php';
    $posts = wad\PostSeeder::seed();
    wad\CommentSeeder::seed($posts);
    //$posts[0]->addComments("Bob", "Nice post!");
    //$posts[0]->addComments("Sherry", "Stunning!");
    //$posts[1]->addComments("Fred", "Great!");
    //var_dump($posts);
    //exit;
?>
<!DOCTYPE html>   
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Social Media</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div id="content">
            <h1>Social Media</h1>
            <?php foreach($posts as $post) { ?>
                <div id="post">
                    <img src="<?= $post->getImage() ?>" width="300" height="250" alt="user image">
                    <span id="style">
                        <?= $post->getUser() ?>
                        </span>
                        <?= $post->getMessage() ?>
                        <?= $post->getDate() ?> <br>
                        <b>Comments:</b><br>
                        <?php $comments = $post->getComments();
                        foreach($comments as $comment) { ?>
                            <?= $comment["user"] ?> said <?= $comment["comment"] ?> <br>
                        <?php } ?>
                    
                </div>
            <?php } ?>
        </div>
    </body>
</html>