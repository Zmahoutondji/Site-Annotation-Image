<?php
class VueDecouvrir{

	public function __construct () {

	}

    function afficherDecouvrir($data, $annotations){
?>  
<!DOCTYPE html>
      <html>
      <head>
         <meta charset="utf-8">
      </head>
      <body>


   <div class="container-xxl">
        <div class="sectionFullPage">
            <div class="row">
                <div class="col-4 sectionAllAnnotGauche">
                    <p>Retrouvez ici toutes les annotations sur<br>cette image</p>
                    <img src="<?php echo $data['URI_Image']?>">

                     <a href='fichier_xml/' download="<?php echo $data['id_Image'].'.xml'; ?>">
                            <button type="button">Annotation XML</button> </a>

                </div>
               
               

                <div class="col-8 sectionAllAnnotDroite">
                     <?php  $i=0;
                 foreach($annotations as $key => $value){ ?>
                    <div class="sectionAnnotDescription">
                        <div class="description">
                            <p class="titre">
                                Description
                            </p>
                            <p class="text">
                               <?php echo $annotations[$i]['description_Image'] ?>
                            </p>
                        </div>
                        <div class="lieu">
                            <p class="titre">
                                Lieu
                            </p>
                            <p class="text">
                                <?php echo $annotations[$i]['lieu_Image'] ?>
                            </p>
                        </div>
                        <div class="date">
                            <p class="titre">
                                Date
                            </p>
                            <p class="text">
                               <?php echo $annotations[$i]['date_Image']; ?>
                            </p>
                        </div>
                        <div class="objet">
                            <p class="titre">
                                Objet
                            </p>
                            <p class="text">
                                <?php echo $annotations[$i]['objets_Image']; ?>
                            </p>
                        </div>
                        <div class="motsCles">
                            <p class="titre">
                                Mots clés
                            </p>
                            <p class="text">
                                 <?php echo $annotations[$i]['mots_Cle_Image']; ?>
                            </p>
                        </div>
                        <div class="zoneInteret">
                            <p class="titre">
                                Zone d'intérêt
                            </p>
                            <p class="text">
                                <?php echo $annotations[$i]['zone_Interet_Image']; ?>
                            </p>
                        </div>
                        <div class="categorie">
                            <p class="titre">
                                Catégorie
                            </p>
                            <p class="text">
                                 <?php echo $annotations[$i]['categorie_Image']; ?>
                            </p>
                        </div>
                        <div class="couleur">
                            <p class="titre">
                                Couleur
                            </p>
                            <div class="text">
                                <input class="col d-inline-block" type="color" id="" name="couleur[]" value="<?php echo $annotations[$i]['couleur1_Image']; ?>">
                                <input class="col d-inline-block" type="color" id="" name="couleur[]" value="<?php echo $annotations[$i]['couleur2_Image']; ?>">
                                <input class="col d-inline-block" type="color" id="" name="couleur[]" value="<?php echo $annotations[$i]['couleur3_Image']; ?>">
                            </div>
                        </div>
                        <div class="OrigineImage">
                            <p class="titre">
                                Origine de l'image
                            </p>
                            <p class="text">
                                 <?php echo $annotations[$i]['origine_Image']; ?>
                            </p>
                        </div>
                    </div>   
                    <?php 
                        $i++; 
                    }
                        ?> 
                </div> 
                  

            </div>
        </div>
    </div>

  
    <?php    }

     function afficherDecouvrirNull($data){
        ?> 

         <div class="container-xxl">
        <div class="sectionFullPage">
            <div class="row">
                <div class="col-4 sectionAllAnnotGauche">
                    <p>Retrouvez ici toutes les annotations sur<br>cette image</p>
                    <img src="<?php echo $data['URI_Image']?>">

                    
                </div>


                

                 <div class="col-8 sectionAllAnnotDroite">
                     <p>Aucune annotation</p>
                </div>
            </div>
        </div>

    <?php    }



}
?> 

</body>
      </html>