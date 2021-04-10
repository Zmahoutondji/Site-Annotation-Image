<?php

include("connexion.php");
Connexion::init_connexion();

class ModeleDecouvrir extends Connexion{

	public function __construct(){		

	}

	function getImage($id_Image){
		$sql = 'Select * From image where id_Image = :id_Image ';
		$req = self::$bdd -> prepare($sql);
		$req -> bindParam(':id_Image', $id_Image);
		$req->execute();
		$img=$req->fetch();
		return $img; 

	}

	function getAnnotations($id_Image){
		$sql = 'Select * From annotation where id_Image=:id_Image';
		$req = self::$bdd -> prepare($sql);
		$req -> bindParam(':id_Image', $id_Image);
		$req->execute();
		$annotations=$req->fetchAll();
		
		
		return $annotations;


		

	}


		    
}

   
    



?>