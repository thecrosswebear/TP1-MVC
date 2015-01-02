<div id="vue1">
	<!--<h2>Liste des livres dans afficher.php</h2>-->
<?php
require_once('./modele/classes/Livre.class.php');
require_once('./modele/classes/Liste.class.php');
require_once('./modele/LivreDAO.class.php');
$dao = new LivreDAO();

if (ISSET($_REQUEST["numAEnlever"]))
{
        
    //echo "je suis dans supprimerPanier";
        $numLivre = $_REQUEST["numAEnlever"];
	$x = $dao->find($numLivre);
        echo "le livre x a enlever: ".$x;
        $x->setEtat(0);
	$dao->update($x);
        
        $_SESSION["panier"][$numLivre] = $numLivre;    
        
        
        if (ISSET($_SESSION["panier"][$numLivre]))
		 UNSET($_SESSION["panier"][$numLivre]);
    
}

if (ISSET($_REQUEST["numAEnlever"]))
{
        
    //echo "je suis dans supprimerPanier";
        $numLivre = $_REQUEST["numAEnlever"];
	$x = $dao->find($numLivre);
        echo "le livre x a enlever: ".$x;
        $x->setEtat(0);
	$dao->update($x);
        
        $_SESSION["panier"][$numLivre] = $numLivre;    
        
        
        if (ISSET($_SESSION["panier"][$numLivre]))
		 UNSET($_SESSION["panier"][$numLivre]);
    
}




if (ISSET($_REQUEST["numASupprimer"]))
{
        $x = $dao->find($_REQUEST["numASupprimer"]);
        echo "Le livre a ete suivant est maintenant supprime: ".$x;
	$dao->delete($x);
        
        
}

if (ISSET($_REQUEST["numAVendre"]))
{
    $x = $dao->find($_REQUEST["numAVendre"]);
    echo "Le livre suivant est maintenant disponible dans la boutique: ".$x;
    $x->setEtat(0);
    $dao->update($x);
    
    
}





 

if (ISSET($_REQUEST["checkout"]))
{
        
	$user = $_SESSION["connectee"];
        if (ISSET($_SESSION["panier"]))
        {
        //$T = $_SESSION["panier"];
            foreach ($_SESSION["panier"] as $nLivre)
            {
                
                   
                $x = $dao->find($nLivre);
                if ((time() - $x->getTime()) < 120)
                {
                    $x->setEtat(2);
                    $x->setIdUser($user);
                    $dao->update($x);
                    UNSET($_SESSION["panier"][$nLivre]);
                    echo "Le livre suivant a ete achete: ".$x;
                    echo "</br>";
                }
                
                else
                {
                    echo "Vous avez depasse votre temps alloue de 5 minutes, le livre suivant n'a pu etre achete: ".$x;
                    $x->setEtat(0);
                    
                    $dao->update($x);
                    UNSET($_SESSION["panier"][$nLivre]);
                }
                

            }
          
          //echo "<a href=?action=afficher&checkout=checkout".">checkout</a><br>";
        }
      else	
        echo "Votre panier est vide.<br>";
    
   
        
        
}



//////////////////////////////////////////////AFFICHER PANIER LE VRAI ICI
if (ISSET($_SESSION["connectee"]) && ISSET($_REQUEST["afficherpanier"])) //afficher le PANIER seulement
{
    echo "<h2>Mon Panier</h2>";
    
    //echo "oN ENTRE DANS LA BOUCLE PORU AFFIchier panier";
    //echo "<br>"; 
    //echo "panier est set: ".ISSET($_SESSION["panier"]);
    //echo "count panier: ".count($_SESSION["panier"]);
    if (ISSET($_SESSION["panier"]) && ((count($_SESSION["panier"])) >0))
    {
      //$liste = $dao->find($nLivre);
      //$T = $_SESSION["panier"];
        //echo "panier + que ZERO";
        //echo "<br>"; 
        
      foreach ($_SESSION["panier"] as $numlivre)
	  {
            $livre = $dao->find($numlivre);
            
               if ($livre!=null)
                {

                    
                    if ($livre->getEtat() == 1)
                    {
                       

                        if ((time() - $livre->getTime()) < 120)
                        {
                            //echo "<tr><td>".$p."</td><td><a href='?action=afficher&numAAcheter=".$p->getNum()."'>ajouter au panier</a></td></tr>";
                            echo "<tr><td>".$livre."</td><td><a href='?action=afficher&numAEnlever=".$livre->getNum()."'>enlever du panier</a></td></tr>";
                            echo "<br>";

                        }
                        else
                        {
                            $livre->setEtat(0);
                        }
                    }    
                }
          
          
          
          
	  }
          echo "<br>";
          echo "<a href=?action=afficher&checkout=checkout".">checkout</a><br>";
    }
  else	
    echo "Votre panier est vide.<br>";
}


if (ISSET($_REQUEST["numAAcheter"]))  // livre dans panier
{
    
    
    if (!ISSET($_SESSION["panier"]))
        {
        $_SESSION["panier"] = array();
        }
    //$num = $_REQUEST["numAAcheter"];	 
    $livre = $dao->find($_REQUEST["numAAcheter"]);
    //echo "affichier le livre a ajouter au panier: ".$livre;
    
    //$x = $dao->find($_REQUEST["numAAcheter"]);
        //echo " valeur de la session connectee: ".$_SESSION["connectee"];
        //echo " le livre en question a acheter: ".$livre;
       
	//$x = new Livre();
	//$x->setIdUser($_REQUEST["username"]);
        //$x->setIdUser($_SESSION["connectee"]);
        $livre->setEtat(1);
        $livre->setTime(time());
        $dao->update($livre);
        //echo " \n le livre UNE FOIS ACHETE: ".$livre;
    
        //$nc = $_GET["numCours"];
        $numLivre = $_REQUEST["numAAcheter"];
  
        //$_SESSION["panier"][$nc] = $nc;
    
    
    
    
  
    //$_SESSION["panier"]["livre"] = $livre;
        $_SESSION["panier"][$numLivre] = $numLivre;
        echo "Le livre suivant sera dans votre panier pour les 5 prochaines minutes: ".$livre;
     //echo "count dans acheter panier: ".count($_SESSION["panier"]);
    
  
  
  
        
	//$dao->delete($x);
}







if (ISSET($_REQUEST["username"])) // afficher seulement ses livres a vendre et pas a vendre
{
        echo "<h2>Mes livres</h2>";
    echo "<table id='listeLiv'>";
    $liste = $dao->findAll();
    
    while ($liste->next())
    {
            //$p = new Livre();
            $p = $liste->getCurrent();
            
            
            if ($p!=null && ($p->getIdUser() == $_SESSION["connectee"]))
            {
                
                if ($p->getEtat() == 2)
                echo "<tr><td>".$p."</td><td><a href='?action=afficher&numAVendre=".$p->getNum()."'>Vendre</a></td><td><a href='?action=modifier&numAModifier=".$p->getNum()."&new=new'>Modifier</a></td><td><a href='?action=afficher&numASupprimer=".$p->getNum()."'>Supprimer</a></td></tr>";
                else 
                  echo "<tr><td>".$p."</td><td><a href='?action=modifier&numAModifier=".$p->getNum()."&new=new'>Modifier</a></td></tr>";
            }    
            /*if ($p!=null)
            {
                    echo "<tr><td>".$p."</td><td><a href='?action=afficher&numAEnlever=".$p->getNum()."'>acheter</a></td></tr>";
            }
             */
             
    }
    echo "</table>";
}




if (ISSET($_REQUEST["boutique"]))
{
    $liste = $dao->findAll();
   //$liste = $dao->findAll();
    echo "<h2>Boutique</h2>";
    echo "<table id='listeLiv'>";
    while ($liste->next())
    {
            $p = $liste->getCurrent();
            
            // si plus que 5 minutes dans un panier alors on retire du panier)  300 secondes
            // test avec 30 secondes
            
            //$temps = (time() - $p->getTime());
             //   echo "temp dans boutique: ".$temps;
            if  ($p!=null && $p->getEtat() == 1 && ((time() - $p->getTime()) > 120)     )
            {
                $p->setEtat(0);
                $dao->update($p);
                //echo "reset etat d'un livre dans panier a DISPONIBLE: ".$p->getEtat()."/n";
            }
            
            if ($p!=null && ($p->getIdUser() != $_SESSION["connectee"])&& ($p->getEtat() ==0 ) )
            {       
                /*?>
                <tr>
		<th>titre</th>
		<th>auteur</th>
		<th>numero</th>
                </tr>
                <?php  
                  */
                
                
                    echo "<tr><td>".$p."</td><td><a href='?action=afficher&numAAcheter=".$p->getNum()."'>ajouter au panier</a></td></tr>";
                    
                 /*   
                   <h3>Voici la liste des cours :</h3>
	<div id="listeCours">
	<table>
	  <tr>
		<th>Numéro</th>
		<th>Nom</th>
		<th>Durée</th>
	  </tr>
	<?php
	while ($ligne=mysql_fetch_array($resultatRequete))
	 {
	  echo "<tr>";
	  echo "<td>".$ligne["num"]."</td>";
	  echo "<td>".$ligne["nom"]."</td>";
	  echo "<td>".$ligne["duree"]."</td>";
	  echo "</tr>";
	 }
	 mysql_Close();
	 echo "</table>";
	 echo "</div>";
}
?>

<hr />
</div>
                    
                    
      */          
                    
                    
                    
                    
                    
                    
                    
                    
            }
    }
    echo "</table>";
}
?>	
</div>