<?php
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    	if ($_FILES['image']['size'] <= 3000000) {
    		
    		$informationsImage = pathinfo($_FILES['image']['name']);//pour recuperer les info du fichier envoyer et s'assurer qu'il s'agit bien d'un fichier innofensif.
    		$extensionImage = $informationsImage['extension'];
    		$extensionArray = array('png', 'gif', 'png', 'jpeg', 'jpg' );

    		if (in_array($extensionImage, $extensionArray)){
    			
    			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().basename($_FILES['image']['name']));
    			    echo 'Envoi du fichier reussie';

    		}
    	}
    }

    echo '<form method="post" action="index.php" enctype="multipart/form-data">
                <p>
                   <h1>Formulaire</h1>
                   <input type="file" name="image"/><br/>
                   <input type="submit" value="Validez"/>  
                </p>
          </form>';

 // Envoi de fichier
   /* $_FILES['image']['name']//nom
    $_FILES['image']['type']//type image png
    $_FILES['image']['size']//taille du fichier
    $_FILES['image']['tmp_name'] //emplacement
    $_FILES['image']['error']//erreur*/