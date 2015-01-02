<?php
require_once('./controleur/Action.interface.php');
class ModifierAction implements Action {
	public function execute(){
            
            //////////vraiment pas sur de ca
            if (!ISSET($_REQUEST["numAModifier"]))
			return "modifier";  //PEUT ETRE A CHANGER
            
            if (ISSET($_REQUEST["new"]))
            {
                return "modifier";
                //return "afficher";
            }
            
            if (!$this->valide())
            {
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "modifier";  // PEUT ETRE A CHANGER
            }
                 
                 
           
                
            if (!ISSET($_SESSION)) session_start();
                
                
                
            require_once('./modele/LivreDAO.class.php');
            //$utili = $_SESSION["connectee"];
            
		$ldao = new LivreDAO();
                //$num = $_REQUEST["numeroAModifier"];
                $livre = $ldao->find($_REQUEST["numAModifier"]);
                              
                $livre->setTitre($_REQUEST["titre"]);
                $livre->setAuteur($_REQUEST["auteur"]);
                $livre->setIssue($_REQUEST["issue"]);
                //$livre->setIdUser($_REQUEST["username"]);
                $livre->setIdUser($_SESSION["connectee"]);
                $livre->setPrix($_REQUEST["prix"]);
                
                
                $ldao->update($livre);
                
                echo "on a fait un update dans modifier";
                
                
                
                
                
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
                
            
            
            
		//return "afficher";
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




