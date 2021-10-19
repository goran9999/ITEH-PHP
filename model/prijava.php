<?php

class Prijava{
    public $id;
    public $predmet;
    public $sala;
    public $datum;
    public $katedra;

    public function __construct($id=null,$predmet=null,
    $katedra=null,$sala=null,$datum=null){
        $this->id=$id;
        $this->predmet=$predmet;
        $this->katedta=$katedra;
        $this->sala=$sala;
        $this->datum=$datum;
    }
}

    public static function getAll(mysqli $conn){
        $query= "SELECT * from prijave";
        return $conn->query($query);
    }
    
    public static function getById($id,mysqli $conn){
        $query="SELECT * from prijave WHERE id=$id";
        $rezultat = $conn->query($query);
        $myArray=array();
        if($rezultat){
            while($red=$rezultat->fetch_array()){
            $myArray[]=$red;
            }
        }
        return $myArray;
    }

    public function deleteById($id,mysqli $conn){
        $query="DELETE FROM prijave WHERE id=$this->id"

        return $conn->query($query);
    }

    public static function add(Prijava $prijava,mysqli $conn){
        $query="INSERT INTO prijave(predmet,katedra,sala,datum)
        VALUES('$prijava->predmet','$prijava->katedra','$prijava->sala','$prijava->datum')";
        return $conn->query($query);
    }

    public function update(mysqli $conn){
        $query="UPDATE prijave SET predmet=$this->predmet, katedra=$this->katedra,sala=$this->sala,datum=$this->datum";
        return $conn->query($query);
    }


?>