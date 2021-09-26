<?PHP

class CommantaireF
{
	function ajouterCommantaire($Commantaire)
	{
		$sql="insert into Commentaire (Sujet,Createur,Texte) values (:Sujet,:Createur,:Texte)";
		$db = config::getConnexion();
		try
		{
	        $req=$db->prepare($sql);
			
	        $Sujet=$Commantaire->getSujet();
	        //$Date=$Commantaire->getDate();
	        $Createur=$Commantaire->getCreateur();
	        $Texte=$Commantaire->getTexte();

			$req->bindValue(':Sujet',$Sujet);
			//$req->bindValue(':Date',$Date);
			$req->bindValue(':Createur',$Createur);
			$req->bindValue(':Texte',$Texte);

	        $req->execute();       
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
	}
	
	function afficherCommantaires($id)
	{
		$sql="SElECT * From Commentaire where Sujet='$id'";
		$db = config::getConnexion();
		try
		{
			$liste=$db->query($sql);
			return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerCommantaireS($Sujet)
	{
		$sql="delete FROM Commentaire where Sujet=:Sujet";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':Sujet',$Sujet);
		try
		{
            $req->execute();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function supprimerCommantaire($Sujet,$id)
	{
		$sql="delete FROM Commentaire where Sujet=:Sujet AND ID=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':Sujet',$Sujet);
		$req->bindValue(':id',$id);
		try
		{
            $req->execute();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierCommantaire($id,$Texte2)
	{
		$sql="update commentaire SET Texte=:Texte2, Date=CURRENT_TIMESTAMP where ID='$id'";
		$db = config::getConnexion();
		try
		{
	        $req=$db->prepare($sql);

			$req->bindValue(':Texte2',$Texte2);
            $s=$req->execute();
		}
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
        }
	}
}

?>