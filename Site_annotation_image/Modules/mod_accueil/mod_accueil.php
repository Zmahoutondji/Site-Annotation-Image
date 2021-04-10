<?php

include_once "cont_accueil.php";

class ModAccueil{

    private $contAccueil;

    public function __construct(){

        $this -> contAccueil = new ContAccueil();

        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
        } else {
            $action = "default";
        }
        
		switch ($action) {
            case 'upload':

        
$poids_max = 800000; // Poids max de l'image en octets (1Ko = 1024 octets)
$repertoire = 'img/'; // Repertoire d'upload

if (isset($_FILES['fichier']))
{
   
   // On vérifit le type du fichier
   if ($_FILES['fichier']['type'] != 'image/png' && $_FILES['fichier']['type'] != 'image/jpeg' && $_FILES['fichier']['type'] != 'image/jpg')
   {
      $erreur = 'Le fichier doit être au format *.jpeg ou *.png .';
   }
   
   // On vérifit le poids de l'image
   elseif ($_FILES['fichier']['size'] > $poids_max)
   {
      $erreur = 'L\'image doit être inférieur à ' . $poids_max/1024 . 'Ko.';
   }
   
   // On vérifit si le répertoire d'upload existe
   elseif (!file_exists($repertoire))
   {
      $erreur = 'Erreur, le dossier d\'upload n\'existe pas.';     
   }
   
   // Si il y a une erreur on l'affiche sinon on peut uploader
   if(isset($erreur))
   {
      echo '' . $erreur . '<br><a href="javascript:history.back(1)">Retour</a>';
   }
   else
   {
         
      // On définit l'extention du fichier puis on le nomme par le timestamp actuel
      if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpeg'; }
      if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpg'; }
      if ($_FILES['fichier']['type'] == 'image/png') { $extention = '.png'; }
      $nom_fichier = $_FILES['fichier']['name'];
             
      // On upload le fichier sur le serveur.
      if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier))
      {


       $URI_Image = 'img/'.$nom_fichier; 
       $nom_Image = $nom_fichier;

       $this -> contAccueil -> upload($URI_Image, $nom_Image);

       $this -> contAccueil -> imageAccueil();
         header('Location:index.php?module=accueil');
      }
      else
      {
         echo 'L\'image n\'a pas pu être uploadée sur le serveur.';
      }
     
   }
     
    }
            break;
        default:
            $this -> contAccueil -> contenueAccueil();
            $this -> contAccueil -> imageAccueil();
            break;
        }
    }
}


?>