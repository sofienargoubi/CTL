<?php
class Promotion {


    private $id;
    private $Prix_ancien;
    private $Prix_nouveau;
    private $Pourcentage;



    public function __construct($id,$Prix_ancien,$Prix_nouveau,$Pourcentage){

        $this->id=$id;
        $this->Prix_ancien=$Prix_ancien;
        $this->Prix_nouveau=$Prix_nouveau;
        $this->Pourcentage=$Pourcentage;


    }


    public function getid(){
        return $this->id;
    }
    public function getPrix_ancien(){
        return $this->Prix_ancien;
    }
    public function getPrix_nouveau(){
        return $this->Prix_nouveau;
    }
    public function getPourcentage(){
        return $this->Pourcentage;
    }

}

?>