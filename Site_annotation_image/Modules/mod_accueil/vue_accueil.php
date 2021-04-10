<?php
class VueAccueil{

	public function __construct () {

	}

    function afficherContenueAccueil(){
?>  
<!DOCTYPE html>
      <html>
      <head>
         <meta charset="utf-8">
      </head>
      <body>


   <form method="post" action="index.php?module=accueil&action=upload" enctype="multipart/form-data" >
       <div class="container-xxl"> 

        <!-- Section drag-drop image -->  
        <div class="sectionTelechargement mx-auto">
            <div class="sectionTelechargementInterieur">
                <img class="mx-auto d-block" src="image/photoIcon.png" width="54" height="54">
                <input type="hidden" name="MAX_FILE_SIZE" value="poid">
                <input class="mx-auto d-block my-2" type="file" name="fichier">
                <input class="mx-auto d-block btn-telecharger" type="submit" value="Télécharger">
            </div>
        </div>
   </form>


</body>
      </html>
    <?php    }

  
  function afficherImageAccueil($data){  

     ?>
        <?php  $i=0;
                 foreach($data as $key => $value){ ?>
         <div class="sectionImages">
            <div class="row">
           
                <div class="col sectionImage mx-auto">
                    <div class="containerImg">
                        <img class="mx-auto d-block" src="<?php echo $data[$i]['URI_Image']; ?>">
                        <div class="btn-annoter mt-4">
                          <a href='index.php?module=annotation&action=annoter&id_Image=<?php echo $data[$i]['id_Image']; ?>'>
                            <button type="button">Annoter</button></a>
                        </div>
                        <div class="btn-decouvrir">
                          <a href='index.php?module=decouvrir&action=decouvrir&id_Image=<?php echo $data[$i]['id_Image']; ?>'>
                            <button type="button">Découvrir</button>
                        </div>
                    </div>    
                </div>        
            </div>
            
        </div>

        <?php 
                        $i++; 
                    }
                        ?>
    
                <?php 
                  

              
  }  

}
?> 