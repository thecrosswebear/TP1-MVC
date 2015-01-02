<?php
include_once('./modele/classes/Database.class.php'); 
include_once('./modele/classes/Livre.class.php'); 
//include_once('./modele/classes/ListeLivre.class.php');
include_once('./modele/classes/Liste.class.php');

class LivreDAO
{	
	public function create($x) {
/*		$request = "INSERT INTO `magasin`.`produit` (`NUM` ,`DESIGN` ,`PRIXUNIT`)".
				" VALUES ('".$x->getNum()."','".$x->getDesignation()."','".$x->getPrixUnit()."')";
*/		$request = "INSERT INTO livres (numero ,titre, auteur, issue, idUtilisateur, price)".
				" VALUES ('".$x->getNum()."','".$x->getTitre()."','".$x->getAuteur()."','".$x->getIssue()."','".$x->getIdUser()."','".$x->getPrix()."')";
		try
		{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public static function findAll()
	{
		try {
			//$liste = new ListeLivre();
                        $liste = new Liste();
		
			$requete = 'SELECT * FROM livres';
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
		    foreach($res as $row) {
				$p = new Livre();
				$p->loadFromRecord($row);
				$liste->add($p);
		    }
			$res->closeCursor();
		    $cnx = null;
			return $liste;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $liste;
		}	
	}	

	public static function find($id)
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM livres WHERE numero = :x");//requ�te param�tr�e par un param�tre x.
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$p = new Livre();

		if ($result)
		{
                    //livre (numero ,titre, auteur, issue, idUtilisateur, price)".
			$p->setNum($result->numero);
			$p->setTitre($result->titre);
                        $p->setAuteur($result->auteur);
                        $p->setIssue($result->issue);
                        $p->setIdUser($result->idUtilisateur);
			$p->setPrix($result->price);
                        $p->setEtat($result->etat);
                        $p->setTime($result->time);
			$pstmt->closeCursor();
			return $p;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($x) {
		/*$request = "UPDATE livres SET titre = '".$x->getTitre()."', idUtilisateur = '".$x->getIdUser()."'".
				" WHERE numero = '".$x->getNum()."'";*/
                 
                 
            
                 $request = "UPDATE livres SET titre = '".$x->getTitre()."', auteur = '".$x->getAuteur()."',issue = '".$x->getIssue()."', idUtilisateur = '".$x->getIdUser()."', price = '".$x->getPrix()."', etat = '".$x->getEtat()."', time ='".$x->getTime()."'".
				" WHERE numero = '".$x->getNum()."'";
		try
		{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	public function delete($x) {
		$request = "DELETE FROM livres WHERE numero = '".$x->getNum()."'";
		try
		{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	
}
?>