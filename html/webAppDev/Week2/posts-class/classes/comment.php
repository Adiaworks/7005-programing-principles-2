<?php

namespace wad;
class Comment{
    protected $comments;
    
    function __construct(){
        $this->comments = [];
    }

    function getComment(){
        return $this->comments;
    }

    function addComments($user, $comment){
        $this->comments[] = array("user"=> $user, "comment"=>$comment);
    }
}
?>