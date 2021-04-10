<?php

include_once "cont_decouvrir.php";

class ModDecouvrir{

    private $contDecouvrir;

    public function __construct(){

        $this -> contDecouvrir = new ContDecouvrir();

        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
        } else {
            $action = "default";
        }
        
		switch ($action) {
            case 'decouvrir':
            if (isset($_GET['id_Image'])){
            	$id_Image=$_GET['id_Image'];
           		$this -> contDecouvrir -> contenueDecouvrir($id_Image);
           	}
           

        default:
            
          
            break;
        }
    }
}


?>