<?php

include("connexion.php");
Connexion::init_connexion();

class ModeleAccueil extends Connexion{

	public function __construct(){		

	}

	function upload($URI_Image, $nom_Image){
    	$sql = 'INSERT INTO image (id_Image, nom_Image, URI_Image) values(default, :nom_Image, :URI_Image)';
		$req = self::$bdd -> prepare($sql);
		$req -> bindParam(':URI_Image', $URI_Image);
		$req -> bindParam(':nom_Image', $nom_Image);
		$req -> execute();
		header("Location: index.php?module=accueil");
	}

	function getImage(){
		$sql = 'Select * From image order by id_Image DESC';
		$req = self::$bdd -> prepare($sql);
		$req->execute();
		$list=$req->fetchAll();
		return $list; 

	}

    
    
    }

   
    



?>