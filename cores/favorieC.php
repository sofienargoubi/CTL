<?php
class FavorieC{


    function ajouter($id_p,$id_u){
        $sql="insert into favories (id_Produit,id_user) values (:ID_Produit,:ID_User)";
        $DB = config::getConnexion();
        try{

            $req=$DB->prepare($sql);
            $req->bindValue(':ID_Produit',$id_p);
            $req->bindValue(':ID_User',$id_u);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }



    }

    function afficher($id){

        $sql="SELECT * FROM livre INNER JOIN favories ON livre.id=favories.id_Produit where favories.id_user='$id'";
        $DB = config::getConnexion();
        try{
            $liste=$DB->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function Verif($id){

        $sql="SELECT * FROM livre INNER JOIN favories ON livre.id=favories.id_Produit where favories.id_Produit='$id'";
        $DB = config::getConnexion();
        try{
            $liste=$DB->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function VerifUser($id){

        $sql="SELECT * FROM livre INNER JOIN favories ON livre.id=favories.id_Produit where favories.id_user='$id'";
        $DB = config::getConnexion();
        try{
            $liste=$DB->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function supprimer($ID){
        $sql="DELETE FROM favories where id_Produit='$ID'";

        $DB = config::getConnexion();
        $req=$DB->prepare($sql);


        try{
            $req->execute();


        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


}
?>