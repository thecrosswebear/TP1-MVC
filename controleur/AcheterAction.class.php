<?php
require_once('./controleur/Action.interface.php');
class AcheterAction implements Action {
	public function execute(){
		/*if (!ISSET($_REQUEST["username"]))
			return "login";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "login";
		}
                 
                 

		require_once('./modele/LivreDAO.class.php');
		$ldao = new LivreDAO();
		$livre = $ldao->find($_REQUEST["numeroAAcheter"]);
                $nouveauUserId = $_SESSION["connectee"];
                echo "nouveauuserid Carlos: ".$nouveauUserId;
                $livre->setIdUser($nouveauUserId);
                //echo "Dans login action: ".$user;
		/*if ($livre == null)
			{
				$_REQUEST["field_messages"]["numeroAAcheter"] = "Livre inexistant.";	
				return "acheter";
			}
		else if ($user->getPasswordComix() != $_REQUEST["password"])
			{
                                echo "user->getPasswordComix(): ".$user->getPasswordComix(); 
                                echo "mot de passe dans REQUest: ".$_REQUEST["password"];
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "login";
			}
                 
                 
		if (!ISSET($_SESSION)) session_start();
		$_SESSION["connectee"] = $_REQUEST["username"];
		return "default";
	}
	public function valide()
	{
		$result = true;
		if ($_REQUEST['username'] == "")
		{
			$_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
			$result = false;
		}	
		if ($_REQUEST['password'] == "")
		{
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}	
		return $result;
	}
}
?>

*/
        }
        
}