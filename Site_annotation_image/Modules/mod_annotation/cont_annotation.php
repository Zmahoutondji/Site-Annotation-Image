<?php

include_once "mod_annotation.php";
include_once "vue_annotation.php";
include_once "modele_annotation.php";
include_once "connexion.php";

class ContAnnotation{

    private $vue;
    private $modele;

    public function __construct(){
		$this -> vue = new VueAnnotation();
		$this -> modele = new ModeleAnnotation();
    }

    public function contenueAnnotation($id_Image){
        $data=$this->modele->getImage($id_Image);
        $colors=$this->modele->mainColors($data, 3);

        if (exif_imagetype($data['URI_Image']) == IMAGETYPE_JPEG) {
        	$metaData=$this->modele->getMetaData($data); 	
        }
        else {
            $metaData=NULL;
        }
       
        	
        $this -> vue-> afficherContenueAnnotation($data, $colors, $metaData);
    }

    public function insererAnnotation($id_Image, $description, $lieu, $date, $objet, $zoneInteret, $motsCle, $categorie, $couleur, $type, $origine){

    	$data=$this->modele->getImage($id_Image);

    	$this->modele->inserationAnnotation($data, $description, $lieu, $date, $objet, $zoneInteret, $motsCle, $categorie, $couleur, $type, $origine);

        $this->modele->genererXml($data);

    	
    	
    }

    


    }


    

   



?>