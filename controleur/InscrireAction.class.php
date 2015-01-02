<?php
require_once('./controleur/Action.interface.php');
class InscrireAction implements Action {
	public function execute(){
		if (!ISSET($_REQUEST["username"]))
			return "inscrire";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "inscrire";
		}

		require_once('./modele/UtilisateurDAO.class.php');
		$udao = new UtilisateurDAO();
                
                $user = new Utilisateur($_REQUEST["username"]);
                $user->setPasswordComix($_REQUEST["password"]);
                $user->setNom($_REQUEST["nom"]);
                $user->setPrenom($_REQUEST["prenom"]);
                $user->setType($_REQUEST["type"]);
                
                $udao->create($user);
                
                
                
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
                if ($_REQUEST['nom'] == "")
		{
			$_REQUEST["field_messages"]["nom"] = "Nom obligatoire";
			$result = false;
		}
                if ($_REQUEST['prenom'] == "")
		{
			$_REQUEST["field_messages"]["prenom"] = "Prenom obligatoire";
			$result = false;
		}
                if ($_REQUEST['type'] == "")
		{
			$_REQUEST["field_messages"]["type"] = "Type obligatoire";
			$result = false;
		}
		return $result;
	}
}
?>