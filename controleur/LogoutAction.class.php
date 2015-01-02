<?php
require_once('./controleur/Action.interface.php');
class LogoutAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
                
                
                require_once('./modele/LivreDAO.class.php');
		$ldao = new LivreDAO();
		//$x = $ldao->find($_REQUEST["username"]);
                
                
                if (ISSET($_SESSION["panier"]))
                {
                    foreach ($_SESSION["panier"] as $nLivre)
                    {
                        $x = $ldao->find($nLivre);
                        $x->setEtat(0);
                        //$x->setIdUser($user);
                        $ldao->update($x);
                        UNSET($_SESSION["panier"][$nLivre]);
	    
                    }
                    
                    
                }
                
		UNSET($_SESSION["connectee"]);
		session_destroy();
		return "default";
	}
}
?>