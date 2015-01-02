<?php

class Livre {
	private $num = "AAA111";
	private $titre = "";
        private $auteur = "";
        private $issue = "";
        private $idUser="";
        private $prix = 1.0;
        private $etat = 0;
        private $time =0;

	public function __construct($n="XXX000")	//Constructeur
	{
		$this->num = $n;
	}
        
        public function getTime()
        {
            return $this->time;
        }
        
        public function setTime($value)
        {
            $this->time = $value;
            
        }
        
        
        
        public function getEtat()
        {
            return $this->etat;
        }
        
        public function setEtat($value)
        {
            $this->etat = $value;
            
        }
        
        
        
        public function getIdUser()
	{
			return $this->idUser;
	}
	
	public function setIdUser($value)
	{
			$this->idUser = $value;
	}
        
        
        
        
        
        public function getAuteur()
	{
			return $this->auteur;
	}
	
	public function setAuteur($value)
	{
			$this->auteur = $value;
	}
        
        
        
        
        public function getIssue()
	{
			return $this->issue;
	}
	
	public function setIssue($value)
	{
			$this->issue = $value;
	}
        
        
        
        
        
        
        
	
	public function getNum()
	{
			return $this->num;
	}
	
	public function setNum($value)
	{
			$this->num = $value;
	}
        
	public function getTitre()
	{
			return $this->titre;
	}
	
	public function setTitre($value)
	{
			$this->titre = $value;
	}

	public function getPrix()
	{
			return $this->prix;
	}
	
	public function setPrix($value)
	{
			$this->prix = $value;
	}
	
	public function __toString()
	{
		return "Comic[".$this->num.",".$this->auteur.",".$this->titre.",".$this->idUser.",".$this->etat."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromRecord($ligne)
	{
		$this->num = $ligne["numero"];
		$this->titre = $ligne["titre"];
		$this->auteur = $ligne["auteur"];
                $this->issue = $ligne["issue"];
                $this->idUser = $ligne["idUtilisateur"];
                $this->prix = $ligne["price"];
                $this->etat = $ligne["etat"];
                $this->time = $ligne["time"];
	}
        
        /*private $num = "AAA111";
	private $titre = "";
        private $auteur = "";
        private $issue = "";
        private $idUser="";
        private $prix = 1.0;*/
        
        
}
?>