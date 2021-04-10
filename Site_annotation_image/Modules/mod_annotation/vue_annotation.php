<?php
class VueAnnotation{

	public function __construct () {

	}

    function afficherContenueAnnotation($data, $colors, $metaData){
?>  
<!DOCTYPE html>
      <html>
      <head>
         <meta charset="utf-8">
      </head>
      <body>


  <form method="post" action="index.php?module=annotation&action=insererAnnotation&idImage=<?php echo $data['id_Image']?>" enctype="multipart/form-data" required>
            
      <div class="sectionAnnotImage mx-auto d-block">
        <div class="sectionGaucheElements">
            <div class="sectionGaucheElementsBis">
                <div class="txtIntro">
                    <p>Annotez votre image ici en remplissant le formulaire ci-dessous</p>
                </div>
                <!-- Description-->
                <div class="ensembleInput">
                <!-- Dimension-->
                 <p class="d-block w-100" name="width"> Largeur : <?php $w=getimagesize($data['URI_Image']); echo $w[0]?>  </p>
                  <p class="d-block w-100"  name="height"> Longueur : <?php $w=getimagesize($data['URI_Image']); echo $w[1]?>
                </p>
                <!-- Lieu -->
                <input class="d-block w-100" type="text" name="lieu" placeholder="Lieu*" required>
                <!-- Date -->
                <input class="d-block w-100" type="date" name="date" value="<?php echo @date('Y-m-d', strtotime($metaData['EXIF']['DateTimeOriginal'])); ?>" required>
                <!-- Objet -->
                <input class="d-block w-100" type="text" name="objet" placeholder="Objet*" required>
                <!-- Mots clés -->
                <input class="d-block w-100" type="text" name="motsCle" placeholder="Mots clés*" required>
                <!-- Zond d'intérêt -->
                <input class="d-block w-100" type="text" name="zoneInteret" placeholder="Zone d'intérêt*" required>
                </div>
                <div class="couleur">
                    <!-- Couleurs -->
                    <p>Couleur</p>
                    <div class="couleur">
                          <?php 
               $i = 0;
      
                 foreach($colors as $value){ 

                  ?> 
                        <div class="row">
                            <input class="col d-inline-block" type="color" id="<?php  echo $i ?>" name="couleur[]" value="<?php  echo "#".$colors[$i]; ?>">
                             <label for="<?php  echo $i ?>"> </label>     
                        </div>
                         <?php $i++;

               }

      
               ?>
                    </div>
                </div>

                <!-- Catégorie -->
                <div class="allRadios">
                    <p>Catégorie</p>
                    <div>
                        <input class="d-inline--block" type="radio" id="Dessin" name="categorie" value="Dessin"checked>
                        <label class="d-inline-block" for="Dessin">Dessin</label>
                    </div>
                    <div>
                        <input type="radio" id="Photographie" name="categorie" value="Photographie"checked>
                        <label for="Photographie">Photographie</label>
                    </div>
                    <div>
                        <input type="radio" id="Peinture" name="categorie" value="Peinture"checked>
                        <label for="Peinture">Peinture</label>
                    </div>
                </div>
                
                <div class="allRadios">
                    <!-- Type -->
                    <p>Type</p>
                    <div>
                        <input type="radio" id="Paysage" name="type" value="Paysage"checked>
                        <label for="Paysage">Paysage</label>
                    </div>
                    <div>
                        <input type="radio" id="Exterieur" name="type" value="Exterieur">
                        <label for="Exterieur">Exterieur</label>
                    </div>
                    <div>
                        <input type="radio" id="ExterieurFoule" name="type" value="Exterieur Foule">
                        <label for="ExterieurFoule">Exterieur Foule</label>
                    </div>
                    <div>
                        <input type="radio" id="Interieur" name="type" value="Interieur">
                        <label for="Interieur">Interieur</label>
                    </div>
                    <div>
                        <input type="radio" id="InterieurFoule" name="type" value="Interieur Foule">
                        <label for="InterieurFoule">Interieur Foule</label>
                    </div>
                </div>
                <div class="allRadios">
                    <!-- Origine -->
                    <p>Origine de l'image</p>
                    <div>
                        <input type="radio" id="Web" name="origine" value="Web"checked>
                        <label for="Web">Web</label>
                    </div>
                    <div>
                        <input type="radio" id="ReseauSociaux" name="origine" value="ReseauSociaux">
                        <label for="ReseauSociaux"> Réseau Sociaux</label>
                    </div>
                    <div>
                        <input type="radio" id="Proprietaire" name="origine" value="Proprietaire">
                        <label for="Proprietaire">Proprietaire</label>
                    </div>
                </div>

                  <textarea class="descInput d-block w-100" name="description" id="description" value="description" placeholder="Description*" required></textarea>

                <div class="btn-annuler d-inline-block">
                    <a href='index.php?module=accueil'>
                    <button type="button">Supprimer</button> </a>
                </div>
                <div class="btn-envoyer d-inline-block">
                    <input type="submit" value="Envoyer">
                </div>
            </div>
            <div class="sectionDroiteElementsBis"></div>
        </div>
        <div class="sectionDroiteImage">
            <img class="mx-auto d-block" heigth=600 width=700 src="<?php echo $data['URI_Image']; ?>">
        </div>
    </div>
   </form>

  

   


</body>
      </html>
    <?php    }


}
?> 