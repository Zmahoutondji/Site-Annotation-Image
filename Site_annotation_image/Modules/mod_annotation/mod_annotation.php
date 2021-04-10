<?php

include_once "cont_annotation.php";

class ModAnnotation{

    private $contAnnotation;

    public function __construct(){

        $this -> contAnnotation = new ContAnnotation();

        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
        } else {
            $action = "default";
        }
        
		switch ($action) {
            case 'annoter':
            if (isset($_GET['id_Image'])){
            	$id_Image=$_GET['id_Image'];
           		$this -> contAnnotation -> contenueAnnotation($id_Image);
           	}
            break;
            case 'insererAnnotation':

                $description = htmlspecialchars($_POST['description']);
                $lieu = htmlspecialchars($_POST['lieu']);
                $date = $_POST['date'];
                $objet = htmlspecialchars($_POST['objet']);
                $zoneInteret = htmlspecialchars($_POST['zoneInteret']);
                $motsCle = htmlspecialchars($_POST['motsCle']);
                $categorie = $_POST['categorie'];
                $couleur = array();
                $couleur = $_POST['couleur'];
                $type = $_POST['type'];
                $origine = $_POST['origine'];

            if (isset($_GET['idImage'])){
                $id_Image=$_GET['idImage'];

                $this -> contAnnotation ->insererAnnotation($id_Image, $description, $lieu, $date, $objet, $zoneInteret, $motsCle, $categorie, $couleur, $type, $origine);


            } 

        default:
            
          
            break;
        }
    }
}


?>