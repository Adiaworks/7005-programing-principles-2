<?php

namespace wad;
use wad\Comment;
include 'comment.php';

class Post{
    protected string $user;
    protected string $message;
    protected mixed $image;
    protected string $date;
    protected object $comments;
    
    function __construct($user,  $message, $image, $date){
        $this->user = $user;
        $this->message = $message;
        $this->image = $image;
        $this->date = $date;
        $this->comments = new Comment();
    }
    function getUser(){
        return $this->user;
    }
    function getMessage(){
        return $this->message;
    }
    function getImage(){
        return $this->image;
    }
    function getDate(){
        return $this->date;  
    }
    function getComments() {
        return $this->comments->getComment();
    }
    function addComments($user, $comment) {
        //Adding a comment to a post
        $this->comments->addComments($user, $comment);
    }
}
?>