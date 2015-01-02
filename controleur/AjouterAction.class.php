<?php
require_once('./controleur/Action.interface.php');
class AjouterAction implements Action {
	public function execute(){
            
            if (!ISSET($_REQUEST["titre"]))
			return "ajouter";  //PEUT ETRE A CHANGER
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "ajouter";  // PEUT ETRE A CHANGER
		}
            if (!ISSET($_SESSION)) session_start();
                
                
                
            require_once('./modele/LivreDAO.class.php');
            //$utili = $_SESSION["connectee"];
            
		$ldao = new LivreDAO();
                
                $livre = new livre();
                $livre->setTitre($_REQUEST["titre"]);
                $livre->setAuteur($_REQUEST["auteur"]);
                $livre->setIssue($_REQUEST["issue"]);
                //$livre->setIdUser($_REQUEST["username"]);
                $livre->setIdUser($_SESSION["connectee"]);
                $livre->setPrix($_REQUEST["prix"]);
                
                $ldao->create($livre);
                
                
                
		//$user = $udao->find($_REQUEST["username"]);
		/*if ($user == null)
			{
				$_REQUEST["field_messages"]["username"] = "Utilisateur inexistant.";	
				return "inscrire";
			}
		else if ($user->getPassword() != $_REQUEST["password"])
			{
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "inscrire";
			}*/
		
                
                /*if (!ISSET($_SESSION)) session_start();
		$_SESSION["connectee"] = $_REQUEST["username"];
		return "default";
                 * 
                 */
                
            
            
            
		return "afficher";
	}
        
        public function valide()
	{
		$result = true;
		if ($_REQUEST['titre'] == "")
		{
			$_REQUEST["field_messages"]["titre"] = "Donnez un titre";
			$result = false;
		}	
		if ($_REQUEST['auteur'] == "")
		{
			$_REQUEST["field_messages"]["auteur"] = "Donnez un auteur";
			$result = false;
		}
                if ($_REQUEST['issue'] == "")
		{
			$_REQUEST["field_messages"]["issue"] = "Issue obligatoire";
			$result = false;
		}
                if ($_REQUEST['prix'] == "")
		{
			$_REQUEST["field_messages"]["prix"] = "Prix obligatoire";
			$result = false;
		}
                
		return $result;
	}
}
?>



