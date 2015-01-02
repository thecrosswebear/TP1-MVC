<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evenement
 *
 * @author Labby
 */
class Evenement 
{
    
    
        private $id = "AAA111";
	private $nom = "";
        private $date = "";
        private $proprio = "";
        private $adresse="";
        
    
    
    public function __construct($n="XXX000")	//Constructeur
	{
		$this->id = $n;
	}
        
        public function getAdresse()
	{
			return $this->adresse;
	}
	
	public function setAdresse($value)
	{
			$this->adresse = $value;
	}
        
        
        
        
        public function getProprio()
	{
			return $this->proprio;
	}
	
	public function setProprio($value)
	{
			$this->proprio = $value;
	}
        
        
        
        public function getDate()
	{
			return $this->date;
	}
	
	public function setDate($value)
	{
			$this->date = $value;
	}
        
        
        
        public function getNom()
	{
			return $this->nom;
	}
	
	public function setNom($value)
	{
			$this->nom = $value;
	}
        
        
        
        public function getId()
	{
			return $this->id;
	}
	
	public function setId($value)
	{
			$this->id = $value;
	}
        
        
        
        public function __toString()
	{
		return "Evenement[".$this->id.",".$this->nom.",".$this->date.",".$this->proprio.",".$this->adresse."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromRecord($ligne)
	{
		$this->id = $ligne["id"];
		$this->nom = $ligne["nom"];
                $this->date = $ligne["date"];
                $this->proprio = $ligne["proprio"];
		$this->adresse = $ligne["adresse"];
	}	
    
}

?>
