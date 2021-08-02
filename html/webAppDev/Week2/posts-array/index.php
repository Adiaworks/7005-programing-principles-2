<?php
     $posts = array();
     $posts[] = array(
         'name' => 'Bob',
         'message' => 'hello',
         'image' => 'images/sea.JPG',
         'date' => '1/1/11'

     );
     $posts[] = array(
         'name' => 'John',
         'message' => "It's a good day",
         'image' => 'images/tree.JPG',
         'date' => '2/3/14'

     );
     $posts[] = array(
         'name' => 'Fred',
         'message' => 'Sunny day',
         'image' => 'images/house.JPG',
         'date' => '4/5/16'

     );
     // var_dump($posts);
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
                    <img src="<?= $post['image'] ?>" width="300" height="250" alt="user image">
                    <span id="style">
                        <?= $post['name'] ?>
                        <?= $post['message'] ?>
                        <?= $post['date'] ?>
                    </span>
                </div>
            <?php } ?>
        </div>
    </body>
</html>