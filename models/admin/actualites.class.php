<?php 

class Actualites{
    private $id;
    private $titre;
    private $description;
    private $date_debut;
    private $date_fin;
    private $img;

    public function get_id(){
        return $this->id;
    }
    public function set_id($id){
       $this->id=$id;
    }

    public function get_titre(){
        return $this->titre;
    }
    public function set_titre($titre){
       $this->titre=$titre;
    }

    public function get_description(){
        return $this->description;
    }
    public function set_description($description){
       $this->description=$description;
    }

    public function get_date_debut(){
        return $this->date_debut;
    }
    public function set_date_debut($date_debut){
       $this->date_debut=$date_debut;
    }

    public function get_date_fin(){
        return $this->date_fin;
    }
    public function set_date_fin($date_fin){
       $this->date_fin=$date_fin;
    }

    public function get_img(){
        return $this->img;
    }
    public function set_img($img){
       $this->img=$img;
    } 
}