


<div id="vue2">
	<h2></h2>
</div>

	
<?php

require_once('./modele/classes/Livre.class.php');
require_once('./modele/classes/Liste.class.php');
require_once('./modele/LivreDAO.class.php');



	if (ISSET($_REQUEST["global_message"]))
	   $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
	$u = "";
	if (ISSET($_REQUEST["numAModifier"]))
        {    
                //echo "oui numAModifier est set";
                $ldao = new LivreDAO();
                //echo "je suis dans la vue modifier";
                $num = $_REQUEST["numAModifier"];
                $x = $ldao->find($num);
                                
                //$x->setEtat(0);
                //$dao->update($x);
               

        }
        
        
?>	
	
        
        
        
        <div id="ModifierLivreForm">
	<h2>Entrez les informations a modifier:</h2>
	<form action="" method="post">

		<label for="titre">Titre :</label> <input name="titre" type="text" value="<?php echo $x->getTitre()?>" />
		<?php if (ISSET($_REQUEST["field_messages"]["titre"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["titre"]."</span>";
		?>
		<br />
                <label for="auteur">Auteur    :</label> <input name="auteur" type="text" value="<?php echo $x->getAuteur()?>"/>
		<?php if (ISSET($_REQUEST["field_messages"]["auteur"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["auteur"]."</span>";
		?>
                <br />
		<label for="issue">Issue (numero)   :</label> <input name="issue" type="text" value="<?php echo $x->getIssue()?>"/>
		<?php if (ISSET($_REQUEST["field_messages"]["issue"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["issue"]."</span>";
		?>
                <br />
                <label for="prix">Prix    :</label> <input name="prix" type="text" value="<?php echo $x->getPrix()?>" />
		<?php if (ISSET($_REQUEST["field_messages"]["prenom"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["prix"]."</span>";
		?>
                
                           
                
                
                
		<br />
		<input name="action" value="modifier" type="hidden" />
		<input value=" OK " type="submit" />
	</form>
	</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
	
</div>