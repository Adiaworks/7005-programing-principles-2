<?php
    include 'classes/postSeeder.php';
    $posts = wad\PostSeeder::seed();
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
                        <?= $post->getMessage() ?>
                        <?= $post->getDate() ?>
                    </span>
                </div>
            <?php } ?>
        </div>
    </body>
</html>