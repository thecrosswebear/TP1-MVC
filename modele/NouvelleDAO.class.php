<?php
include_once('./modele/classes/Database.class.php'); 
include_once('./modele/classes/Nouvelles.class.php'); 
include_once('./modele/classes/Liste.class.php'); 

class NouvelleDAO
{	
	public function create($x) {
         
            
            
		$request = "INSERT INTO news (id ,titre, description, proprio, date)".
				" VALUES ('".$x->getId()."','".$x->getTitre()."','".$x->getDescription()."','".$x->getProprio()."','".$x->getDate()."')";
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
			
                        $liste = new Liste();
                        
		
			$requete = 'SELECT * FROM news';
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
		    foreach($res as $row) {
				$p = new Nouvelles();
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

		$pstmt = $db->prepare("SELECT * FROM news WHERE id= :x");//requ�te param�tr�e par un param�tre x.
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$p = new Nouvelles();

		if ($result)
		{

			$p->setId($result->id);
			$p->setTitre($result->titre);
                        $p->setDescription($result->description);
                        $p->setProprio($result->proprio);
                        $p->setDate($result->date);
			
			$pstmt->closeCursor();
			return $p;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($x) {
            
            
                        
		$request = "UPDATE news SET titre = '".$x->getTitre()."', description = '".$x->getDescription()."', date = '".$x->getDate()."'".
				" WHERE id = '".$x->getId()."'";
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
		$request = "DELETE FROM news WHERE id = '".$x->getId()."'";
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