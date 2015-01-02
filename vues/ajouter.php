


<div id="vue2">
	<h2></h2>


	
<?php

require_once('./modele/classes/Livre.class.php');
require_once('./modele/classes/Liste.class.php');
require_once('./modele/LivreDAO.class.php');

/*if (!ISSET($_SESSION))
                {    session_start();
                
                
                }*/

	if (ISSET($_REQUEST["global_message"]))
	   $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
	$u = "";
        /*echo "valeur de username dans ajouter: ".$_REQUEST["username"];*/
	if (ISSET($_REQUEST["username"]))
        {
		$u = $_REQUEST["username"];
                
        }
        
        
?>	
	<div id="NouveauLivreForm">
	<h2>Entrez les informations du livre a ajouter dans le formulaire</h2>
	<form action="" method="post">

		<label for="titre">Titre :</label> <input name="titre" type="text" value="<?php echo $u?>" />
		<?php if (ISSET($_REQUEST["field_messages"]["titre"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["titre"]."</span>";
		?>
		<br />
                <label for="auteur">Auteur    :</label> <input name="auteur" type="text" />
		<?php if (ISSET($_REQUEST["field_messages"]["auteur"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["auteur"]."</span>";
		?>
                <br />
		<label for="issue">Issue (numero)   :</label> <input name="issue" type="text" />
		<?php if (ISSET($_REQUEST["field_messages"]["issue"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["issue"]."</span>";
		?>
                <br />
                <label for="prix">Prix    :</label> <input name="prix" type="text" />
		<?php if (ISSET($_REQUEST["field_messages"]["prenom"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["prix"]."</span>";
		?>
                
               
                
		<br />
		<input name="action" value="ajouter" type="hidden" />
		<input value=" OK " type="submit" />
	</form>
	</div>
        
        
        
        
</div>