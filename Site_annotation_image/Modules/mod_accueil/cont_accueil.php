<?php

include_once "mod_accueil.php";
include_once "vue_accueil.php";
include_once "modele_accueil.php";
include_once "connexion.php";

class ContAccueil{

    private $vue;
    private $modele;

    public function __construct(){
		$this -> vue = new VueAccueil();
		$this -> modele = new ModeleAccueil();
    }

    public function contenueAccueil(){
        $this -> vue -> afficherContenueAccueil();
    }

    public function imageAccueil(){
        $data=$this->modele->getImage();
        $this -> vue-> afficherImageAccueil($data);
    }

    public function upload($URI_Image, $nom_Image){
        $this -> modele -> upload($URI_Image, $nom_Image);
    }

    

   
}


?>