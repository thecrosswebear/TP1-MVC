<?php
require_once('./controleur/DefaultAction.class.php');
require_once('./controleur/AfficherAction.class.php');
require_once('./controleur/AjouterAction.class.php');
require_once('./controleur/SupprimerAction.class.php');
require_once('./controleur/LoginAction.class.php');
require_once('./controleur/LogoutAction.class.php');
require_once('./controleur/InscrireAction.class.php');
require_once('./controleur/AcheterAction.class.php');
require_once('./controleur/ModifierAction.class.php');

class ActionBuilder{
	public static function getAction($nom){
		switch ($nom)
		{
			case "connecter" :
				return new LoginAction();
			break; 
			case "deconnecter" :
				return new LogoutAction();
			break; 
                    
                        case "modifier" :
                            return new ModifierAction();
                        break;
                    
                    
			case "afficher" :
				return new AfficherAction();
			break; 
			case "ajouter" :
				return new AjouterAction();
			break; 
			
                        case "acheter" :
				return new AcheterAction();
                        break;
                        case "inscription" :
                                return new InscrireAction();
			break; 
			default :
				return new DefaultAction();
		}
	}
}
?>
