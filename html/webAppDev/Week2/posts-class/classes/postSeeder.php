<?php
namespace wad;
use wad\Post;
include 'post.php';

class PostSeeder{
     public static function seed(){
         $posts = [];
         $posts[] = new Post("Bob", "Hi!", "images/sea.JPG", "1/1/11");
         $posts[] = new Post("Jhon", "It's a good day", "images/tree.JPG", "2/3/14");
         $posts[] = new Post("Fred", "Sunny day", "images/house.JPG", "4/5/16");
         return $posts; //Return the content of the post
     }
}
?>