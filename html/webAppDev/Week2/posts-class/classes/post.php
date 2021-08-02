<?php

namespace wad;
class Post{
    protected $user;
    protected $message;
    protected $image;
    protected $date;
    
    function __construct($user, $message, $image, $date){
        $this->user = $user;
        $this->message = $message;
        $this->image = $image;
        $this->date = $date;
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
}
?>