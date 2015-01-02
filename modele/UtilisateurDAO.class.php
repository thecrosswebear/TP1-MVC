<?php
include_once('./modele/classes/Database.class.php'); 
include_once('./modele/classes/Utilisateur.class.php'); 

class UtilisateurDAO
{	
	public static function find($id)
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM utilisateur WHERE username = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$p = new Utilisateur();

		if ($result)
		{
			$p->setUsername($result->username);
			$p->setPasswordComix($result->passwordcomix);
                        $p->setNom($result->nom);
                        $p->setPrenom($result->prenom);
                        $p->setType($result->type);
			$pstmt->closeCursor();
			return $p;
		}
		$pstmt->closeCursor();
		return null;
	}
        
        
        // A MODIFIER POUR INSERER NOUVEL UTILISATEUR
        //id, passowrdcomix nom prenom type
        public function create($x) {
/*		$request = "INSERT INTO `magasin`.`produit` (`NUM` ,`DESIGN` ,`PRIXUNIT`)".
				" VALUES ('".$x->getNum()."','".$x->getDesignation()."','".$x->getPrixUnit()."')";
*/		$request = "INSERT INTO utilisateur (username ,passwordcomix, nom, prenom, type)".
				" VALUES ('".$x->getUsername()."','".$x->getPasswordComix()."','".$x->getNom()."','".$x->getPrenom()."','".$x->getType()."')";
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