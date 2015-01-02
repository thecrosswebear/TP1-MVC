<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nouvelles
 *
 * @author Labby
 */
class Nouvelles {
        private $id = "AAA111";
	private $titre = "";
        private $description = "";
        private $proprio = "";
        private $date="";
            
    public function __construct($n="XXX000")	//Constructeur
	{
		$this->id = $n;
	}
        
        public function getId()
	{
			return $this->id;
	}
	
	public function setId($value)
	{
			$this->id = $value;
	}
        
        
        
        public function getDate()
	{
			return $this->date;
	}
	
	public function setDate($value)
	{
			$this->date = $value;
	}
        
        
        public function getProprio()
	{
			return $this->proprio;
	}
	
	public function setProprio($value)
	{
			$this->proprio = $value;
	}
        
        
        
        public function getDescription()
	{
			return $this->description;
	}
	
	public function setDescription($value)
	{
			$this->description = $value;
	}
        
        public function getTitre()
	{
			return $this->titre;
	}
	
	public function setTitre($value)
	{
			$this->titre = $value;
	}
        
        
        
                
        public function __toString()
	{
		return "Nouvelle[".$this->id.",".$this->titre.",".$this->description.",".$this->proprio.",".$this->date."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromRecord($ligne)
	{
		$this->id = $ligne["id"];
		$this->titre = $ligne["titre"];
                $this->description = $ligne["description"];
                $this->proprio = $ligne["proprio"];
		$this->date = $ligne["date"];
	}
        
        
        
}

?>
