<?php

include_once "mod_decouvrir.php";
include_once "vue_decouvrir.php";
include_once "modele_decouvrir.php";
include_once "connexion.php";

class ContDecouvrir{

    private $vue;
    private $modele;

    public function __construct(){
		$this -> vue = new VueDecouvrir();
		$this -> modele = new ModeleDecouvrir();
    }

    public function contenueDecouvrir($id_Image){
        $data=$this->modele->getImage($id_Image);
        $annotation=$this->modele->getAnnotations($id_Image);
       
  
        if (!empty($annotation)){
            $this -> vue-> afficherDecouvrir($data, $annotation);

        }
        else {

        $this -> vue-> afficherDecouvrirNull($data);

        }
    }

    

    


    }


    

   



?>