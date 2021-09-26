<?PHP

class NotifF
{
	function ajouterNotif($Notif,$Createur)
	{
		$sql="insert into Notificationsujet (Sujet,Createur,NotifType,Num) values (:Sujet,:Createur,:Type,:Num)";
		$db = config::getConnexion();
		try
		{
	        $req=$db->prepare($sql);
			
	        $Sujet=$Notif->getSujet();
	        $Type=$Notif->getType();
	        $Num=$Notif->getNum();

			$req->bindValue(':Sujet',$Sujet);
			$req->bindValue(':Createur',$Createur);
			$req->bindValue(':Type',$Type);
			$req->bindValue(':Num',$Num);
			
	        $req->execute();
        }
        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
	}
	
	function recuperernote($id,$type)
	{
		$sql="SElECT Num,count(*) as n From Notificationsujet where Sujet='$id' and NotifType='$type'";
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

	function recuperernotif($crea)
	{
		$sql="SElECT * From Notificationsujet where Createur='$crea'";
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

	function nbnotif($crea)
	{
		$sql="SElECT count(*) as n From Notificationsujet where Createur='$crea'";
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

	function afficherNotif($crea,$type)
	{
		$sql="SElECT * as nombre From Notificationsujet where type='$type' and Createur='$crea' group by Sujet";
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

	function modifierNotif($Sujet,$Type,$note)
	{
			$sql="update Notificationsujet set Num=:Note WHERE Sujet='$Sujet' and NotifType='$Type'";
			$db = config::getConnexion();
			try
			{		
		        $req=$db->prepare($sql);
				$req->bindValue(':Note',$note+1);
					
	            $s=$req->execute();
			}
	        catch (Exception $e)
	        {
	            echo " Erreur ! ".$e->getMessage();
	        }
	}

    function supp($Sujet,$Type)
    {
        $sql="delete from Notificationsujet WHERE Sujet='$Sujet' and NotifType='$Type'";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $s=$req->execute();
        }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
        }
    }
}


?>