<?php
require_once('./controleur/Action.interface.php');
class LoginAction implements Action {
	public function execute(){
		if (!ISSET($_REQUEST["username"]))
			return "login";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "login";
		}

		require_once('./modele/UtilisateurDAO.class.php');
		$udao = new UtilisateurDAO();
		$user = $udao->find($_REQUEST["username"]);
                //echo "userDans login action: ".$user;
		if ($user == null)
			{
				$_REQUEST["field_messages"]["username"] = "Utilisateur inexistant.";	
				return "login";
			}
		else if ($user->getPasswordComix() != $_REQUEST["password"])
			{
                                echo "user->getPasswordComix(): ".$user->getPasswordComix(); 
                                echo "mot de passe dans REQUest: ".$_REQUEST["password"];
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "login";
			}
		if (!ISSET($_SESSION))
                {    session_start();
                
                
                }
		$_SESSION["connectee"] = $_REQUEST["username"];
                $_SESSION['start'] = time(); // taking now logged in time
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ; // ending a session in 1 min 
                
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