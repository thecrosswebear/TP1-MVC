
<html>

<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<!--<link rel="stylesheet" href="./css/style.css" type="text/css" />-->
<!--<link rel="sytlesheet" href="bootstrap/css/bootstrap.css"/>-->
<title>Page d'accueil Comix</title>

<SCRIPT LANGUAGE="javascript">

function TestLogin()
{
    //result = true;
    if  (document.formLogin.username.value === "")
    {
        alert("Veuillez entrer un nom d'usager");
        return false;
    }
    if (document.formLogin.password.value === "")
    {   
        alert("Veuillez entrer un mot de passe");
        return false;
    }

    return true;
    //alert("allo");

}

</SCRIPT>


</head>
 <br />
 
 
 
 
 <div id = "bonjour">
    <?php
    
    if (!ISSET($_SESSION)) 
            session_start();
    
    
    
    if (ISSET($_SESSION["connectee"]))
    {    
    ?>
    
    <?php    
        echo "Utilisateur: ".$_SESSION["connectee"]; 
    }
    else
    {

       echo "<a href='?action=connecter'>se connecter</a>"; 
        
    }
    ?>
    </div>
    
    
    
	<div id="banner">
		<h2>Comix</h2>
	</div>
	<div id="menu">
		<ul class='nav nav-pills'>
			<li><a href="">Accueil</a></li>
<?php
	
	if (ISSET($_SESSION["connectee"]))
	{
            
            $utilisa = $_SESSION["connectee"];
            
            
           
            
            
            $nombreDansPanier =0;
            if (ISSET($_SESSION["panier"]))
                $nombreDansPanier =count($_SESSION["panier"]);
            
           
            
            
            
?>                      
                        
			<li><a href="?action=afficher">Nouvelles</a></li>
                        
                        <li><a href="?action=afficher">Evenements</a></li>
                        <li><a href="?action=afficher&boutique=boutique">Boutique</a></li>
                        <?php echo "<li><a href='?action=afficher&username=".$utilisa."'>Mes Livres</a></li>"; ?>
                        <li><a href="?action=afficher&afficherpanier=afficherpanier">Mon panier </a> <?php echo "($nombreDansPanier)"; ?></li>
                        
                        <li><a href="?action=ajouter">Ajouter livre a vendre</a></li>
                        
			<li><a href="?action=deconnecter">se deconnecter</a></li>
<?php	
        

	}
	else
	{
?>
			<li><a href="?action=connecter">se connecter</a></li>
                        <li><a href="?action=inscription">s'inscrire</a></li>
<?php	
	}
?>			
		</ul>
	</div>
	<div id="content">
	<?php
	include $vue.".php";
	?>
	</div>
 
        <hr id="hrbas" />
	<div id="footer">
		&copy; 2013 Auteur Barry Allen. Tous droits reserves.
	</div>

</body>
</html>
