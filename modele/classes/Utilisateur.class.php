<?php

class Utilisateur {
	//private $username = "AAA111";
        private $username = "111";
	private $passwordComix = "";
        private $nom = "";
        private $prenom = "";
        private $type = "";

	public function __construct($n="XXX000")	//Constructeur
	{
		$this->username = $n;
	}
        
        public function getType()
	{
			return $this->type;
	}
	
	public function setType($value)
	{
			$this->type = $value;
	}
        
        public function getPrenom()
	{
			return $this->prenom;
	}
	
	public function setPrenom($value)
	{
			$this->prenom = $value;
	}
        
        public function getNom()
	{
			return $this->nom;
	}
	
	public function setNom($value)
	{
			$this->nom = $value;
	}
        
        public function getUsername()
	{
			return $this->username;
	}
	
	public function setUsername($value)
	{
			$this->username = $value;
	}
        
	
	
	public function getPasswordComix()
	{
			return $this->passwordComix;
	}
	
	public function setPasswordComix($value)
	{
			$this->passwordComix = $value;
	}

	public function __toString()
	{
		return "Utilisateur[".$this->username.",".$this->passwordComix."]";
	}
          
         
	public function affiche()
	{
		echo $this->__toString();
	}
        
         
	public function loadFromRecord($ligne)
	{
		$this->username = $ligne["username"];
		$this->passwordComix = $ligne["passwordcomix"];
                $this->nom = $ligne["nom"];
                $this->prenom = $ligne["prenom"];
                $this->type = $ligne["type"];
	}	
}
?>