<div id="accueil">
	
<?php
	if (ISSET($_REQUEST["global_message"]))
	   $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
	$u = "";
	if (ISSET($_REQUEST["username"]))
		$u = $_REQUEST["username"];
        
        //echo "dans inscription php de tp1";
?>	
	<div id="InscriptionForm">
	<h2>Entrez vos infos</h2>
	<form action="" method="post">

		<label for="username">Nom d'utilisateur :</label> <input name="username" type="text" value="<?php echo $u?>" />
		<?php if (ISSET($_REQUEST["field_messages"]["username"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
		?>
		<br />
                <label for="password">Mot de passe    :</label> <input name="password" type="password" />
		<?php if (ISSET($_REQUEST["field_messages"]["password"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
		?>
                <br />
		<label for="nom">Nom   :</label> <input name="nom" type="nom" />
		<?php if (ISSET($_REQUEST["field_messages"]["nom"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["nom"]."</span>";
		?>
                <br />
                <label for="prenom">Prenom    :</label> <input name="prenom" type="prenom" />
		<?php if (ISSET($_REQUEST["field_messages"]["prenom"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["prenom"]."</span>";
		?>
                <br />
                <label for="type">Type    :</label> <input name="type" type="type" />
		<?php if (ISSET($_REQUEST["field_messages"]["type"])) 
				echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["type"]."</span>";
		?>
                           
                
                
                
		<br />
		<input name="action" value="inscription" type="hidden" />
		<input value=" OK " type="submit" />
	</form>
	</div>
</div>