<?php

namespace Models;

class News {
    private $id;
    private $title;
    private $slug;
    private $description;
    private $keyword;
    private $content;
    private $photo;

    // setters

    public function setId($id){
        $this->id = (int)$id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setSlug($slug){
        $this->slug = $slug;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setKeyword($keyword){
        $this->keyword = $keyword;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    // getters
    public function getId(){
        return $this->id ;
    }

    public function getTitle(){
        return $this->title ;
    }
    public function getSlug(){
        return $this->slug ;
    }
    public function getDescription(){
        return $this->description ;
    }
    public function getKeyword(){
        return $this->keyword ;
    }
    public function getContent(){
        return $this->content ;
    }
    public function getPhoto(){
        return $this->photo ;
    }
}