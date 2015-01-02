<div id="accueil">
<?php	
    
    if (!ISSET($_SESSION["connectee"]))
    {
    echo "<h2>Bonjour, bienvenue a ce super site de vente de bande dessinee!</h2>";
    echo "Vous devez vous connecter pour avoir acces aux fonctionnalites."; 
    }
    else
    {   echo "Bonjour ".$_SESSION["connectee"]." vous etes connectes. </br>";
        echo "Utilisez le menu pour acceder aux fonctionnalites.";
    }       
            
?>
</div>