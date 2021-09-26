<?php
//include "../config.php";
class InfoF{
    function ajouterinfo($info){
        $sql="insert info Info (ID,Discussion) values (:ID,:Discussion)";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            
            $ID=$info->getID();
            $Discussion=$info->getDiscussion();
           
            $req->bindValue(':ID',$ID);
            $req->bindValue(':Discussion',$Discussion);
            
            $req->execute();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getid($mail)
    {
        $sql="SElECT * From users where Email='$mail'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getidd($mail)
    {
        $sql="SElECT * From users where Nom='$mail'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierinfo($ID,$disc)
    {
        $sql="update info SET Discussion=:disc  WHERE ID='$ID'";
            $db = config::getConnexion();
            try
            {       
                $req=$db->prepare($sql);
                $req->bindValue(':disc',$disc);
                    
                $s=$req->execute();
            }
            catch (Exception $e)
            {
                echo " Erreur ! ".$e->getMessage();
            }
    }

    function afficherinfo($id){
        $sql="SElECT * From Info where ID='$id'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
?>