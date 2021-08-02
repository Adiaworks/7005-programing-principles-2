<?php
namespace wad;

class CommentSeeder{
    public static function seed( mixed $posts){
        //Add comments for posts
        foreach($posts as $post) {
            $post->addComments("Bob", "Great!");
            $post->addComments("Jhon", "It's a good vibe");
            $post->addComments("Fred", "Beautiful");
        }       
    }
}
?>