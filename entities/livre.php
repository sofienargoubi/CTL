<?php
class Livre 
{
	private $id;
	private $titre;
	private $categorie;
	private $nom_auteur;
	private $cover;
	private $prix;

	function __construct($id,$titre,$categorie,$nom_auteur,$cover,$prix)
	{
	   $this->id=$id;
	   $this->titre=$titre;
	   $this->categorie=$categorie;
	   $this->nom_auteur=$nom_auteur;
	   $this->cover=$cover;
	   $this->prix=$prix;
	}
	function getid(){
		return $this->id;
	}
	function getnom(){
		return $this->nom_auteur;
	}
	function gettitre(){
		return $this->titre;
	}
	function getcategorie(){
		return $this->categorie;
	}
	function getcover(){
		return $this->cover;
	}
	function getprix(){
		return $this->prix;
	}

	function setNom($nom){
		$this->nom_auteur=$nom;
	}
	function setid($id){
		$this->id=$id;
	}
	function settitre($titre){
		$this->titre=$titre;
	}
	function setcategorie($categorie){
		$this->categorie=$categorie;
	}
	function setcover($cover){
		$this->id=$cover;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	   
}

?>