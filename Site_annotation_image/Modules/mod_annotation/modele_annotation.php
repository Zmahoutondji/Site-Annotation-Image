<?php

include("connexion.php");
Connexion::init_connexion();

class ModeleAnnotation extends Connexion{

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

	function inserationAnnotation($data, $description, $lieu, $date, $objet, $zoneInteret, $motsCle, $categorie, $couleur, $type, $origine){

		$id_Image = $data['id_Image'];
		$url_Fichier_Xml_Image = "/fichier_xml/".$data['id_Image'].".xml";

		$sql='INSERT INTO annotation(id_Annotation, id_Image, date_Image, lieu_Image, objets_Image, description_Image, couleur1_Image, couleur2_Image, couleur3_Image, mots_Cle_Image, zone_Interet_Image, categorie_Image, type_Image, origine_Image, url_Fichier_Xml_Image) values(default, :id_Image, :date_Image, :lieu_Image, :objets_Image, :description_Image, :couleur1_Image, :couleur2_Image, :couleur3_Image, :mots_Cle_Image, :zone_Interet_Image, :categorie_Image, :type_Image, :origine_Image, :url_Fichier_Xml_Image)';
		$req=self::$bdd->prepare($sql);	
		$req->bindParam(':id_Image', $id_Image);
		$req->bindParam(':date_Image', $date);
		$req->bindParam(':lieu_Image', $lieu);
		$req->bindParam(':objets_Image', $objet);
		$req->bindParam(':description_Image', $description);
		$req->bindParam(':mots_Cle_Image', $motsCle);
		$req->bindParam(':zone_Interet_Image', $zoneInteret);
		$req->bindParam(':categorie_Image', $categorie);
		$req->bindParam(':type_Image', $type);
		$req->bindParam(':origine_Image', $origine);
		$req->bindParam(':url_Fichier_Xml_Image', $url_Fichier_Xml_Image);
		$req->bindParam(':couleur1_Image', $couleur[0]);
		$req->bindParam(':couleur2_Image', $couleur[1]);
		$req->bindParam(':couleur3_Image', $couleur[2]);
		$req->execute();

		

		
		

			header("Location: index.php?module=accueil");


	}





	public function mainColors($data, $numColors, $image_granularity = 5){
       
        $image_granularity = max(1, abs((int)$image_granularity));
		$colors = array();
		// on récupère la taille de l’image 
		$size = getimagesize($data['URI_Image']);
		
		if(exif_imagetype($data['URI_Image']) == IMAGETYPE_PNG)
			$img = imagecreatefrompng($data['URI_Image']);

		if(exif_imagetype($data['URI_Image']) == IMAGETYPE_JPEG)
			$img = imagecreatefromjpeg($data['URI_Image']);

		//récupération des couleurs en RGB 
		for ($x = 0; $x < $size[0]; $x += $image_granularity)
		{
		for ($y = 0; $y < $size[1]; $y += $image_granularity)
		{
		$thisColor = imagecolorat($img, $x, $y);
		$rgb = imagecolorsforindex($img, $thisColor);
		$red = round(round(($rgb['red'] / 0x33)) * 0x33);
		$green = round(round(($rgb['green'] / 0x33)) * 0x33);
		$blue = round(round(($rgb['blue'] / 0x33)) * 0x33);
		$alpha = $rgb['alpha'];
		// On vérifie si la couleur est à 50% opaque ou moins, si oui elle est ignorée 

		if ($alpha < 125)
		{
		$thisRGB = sprintf('%02X%02X%02X', $red, $green, $blue);
		if (array_key_exists($thisRGB, $colors))
		$colors[$thisRGB]++;
		else
		$colors[$thisRGB] = 1;
		}
		}
		}
		arsort($colors);
		// Renvoi un tableau des couleurs les plus présentes sur l’image au format héxadécimal comme : #C0C0C0. 
		return array_slice(array_keys($colors), 0, $numColors);
	}

	public function getMetaData($data){

		$exif = exif_read_data($data['URI_Image'], 'EXIF', true);

		return $exif;
		
	}

	/* public function getObjet($data) {

			$imgUrl = 'http://localhost/Site_Annotation/img/'.$data['nom_Image'];
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "urls=".$imgUrl."");
			curl_setopt($curl, CURLOPT_HTTPHEADER, array("content-type: application/x-www-form-urlencoded", 'Authorization: Basic'.base64_encode("Zg9zyfJY2pJD6ftYXYBCZTF3cZ8R_JiX")));
			curl_setopt($curl, CURLOPT_URL, 'https://app.nanonets.com/api/v2/OCR/Model/4dbe041d-6eb2-40e8-b636-e804e62d5b15/LabelUrls/');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			$result = curl_exec($curl);
			if(!$result){die("Connection Failure");}
			curl_close($curl);

			return $result;

	} */

	public function genererXml($data){



		$sql='SELECT max(id_Annotation) from annotation';
		$req=self::$bdd->prepare($sql);	
		$req->execute();
		$id_Annotation=$req->fetch();

		$sql='SELECT * FROM annotation where id_Image=:id_Image ';
		$req=self::$bdd->prepare($sql);	
		//$req->bindParam(':id_Annotation', $id_Annotation[0]);
		$req->bindParam(':id_Image', $data['id_Image']);
		$req->execute();
		$tab=$req->fetchAll();

		

		var_dump($tab);
		
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';

		$xml .= '<annotations>';

		
		$i=0;
		foreach ($tab as $key => $value) {
			
		   
			$idAnnotationImage=$tab[$i]['id_Annotation'];
			$nomImage = $data['nom_Image'];
			$lieuImage=$tab[$i]['lieu_Image'];
			$dateImage=$tab[$i]['date_Image'];
			$objetsImage=$tab[$i]['objets_Image'];
			$descriptionImage=$tab[$i]['description_Image'];
			$motsCleImage=$tab[$i]['mots_Cle_Image'];
			$zoneInteretImage=$tab[$i]['zone_Interet_Image'];
			$categorieImage=$tab[$i]['categorie_Image'];
			$typeImage=$tab[$i]['type_Image'];
			$origineImage=$tab[$i]['origine_Image'];
			$urlFichierXmlImage=$tab[$i]['url_Fichier_Xml_Image'];	
			$couleur1=$tab[$i]['couleur1_Image'];
			$couleur2=$tab[$i]['couleur2_Image'];
			$couleur3=$tab[$i]['couleur3_Image'];
			

			
			
			
			$xml .= '<annotation>';
			$xml .= '<idannotation>'.$idAnnotationImage.'</idannotation>';
			$xml .= '<nom>'.$nomImage.'</nom>';
			$xml .= '<lieu>'.$lieuImage.'</lieu>';
			$xml .= '<date>'.$dateImage.' </date>'; 
			$xml .= '<objet>'.$objetsImage.'</objet>';
			$xml .= '<description>'.$descriptionImage.'</description>';
			$xml .= '<MotscleImage>'.$motsCleImage.'</MotscleImage>';
			$xml .= '<ZoneInteretImage>'.$zoneInteretImage.'</ZoneInteretImage>';
			$xml .= '<CategorieImage>'.$categorieImage.'</CategorieImage>';
			$xml .= '<TypeImage>'.$typeImage.'</TypeImage>';
			$xml .= '<OrigineImage>'.$origineImage.'</OrigineImage>';
			$xml .= '<CouleurImage>'.$couleur1." / ".$couleur2. " / ".$couleur3.'</CouleurImage>';
			$xml .= '<URLFichierXMLImage>'.$urlFichierXmlImage.'</URLFichierXMLImage>';
			$xml .= '</annotation>';
			
			$i++;	
		}

		$xml .= '</annotations>';
		
		 
		 
		// écriture dans le fichier

		$nom_fichier = 'fichier_xml/'.$data['id_Image'].'.xml';

		file_put_contents($nom_fichier, $xml);

	}

	

	    

		    
}

   
    



?>
