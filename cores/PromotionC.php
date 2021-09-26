<?php
//require  '../config.php';
$DB =new config();
class PromotionC{

    function modifierPromotion($Promotion){
        $sql="update promotion set prix_nouveau=:prix_nouveau,pourcentage=:pourcentage where id=:id";
        $DB = config::getConnexion();
        $req=$DB->prepare($sql);

        try{
            $id=$Promotion->getid();;
            $pn=$Promotion->getPrix_nouveau();
            $pr=$Promotion->getPourcentage();

            $req->bindValue(':id',$id);
            $req->bindValue(':prix_nouveau',$pn);
            $req->bindValue(':pourcentage',$pr);

            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

  function afficherPromotion(){

        $sql="SElECT * From promotion ";
        $DB = config::getConnexion();
        try{
            $liste=$DB->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherPromotionprod($ID){

        $sql="SElECT * From promotion where id ='$ID'";
        $DB = config::getConnexion();
        try{
            $liste=$DB->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function AjouterPromotion($Promotion){
        $sql="insert into Promotion (id,prix_ancien,prix_nouveau,pourcentage) values (:id, :prix_ancien, :prix_nouveau,:pourcentage) ";
        $DB = config::getConnexion();
        $req=$DB->prepare($sql);

        try{
            $id=$Promotion->getid();
            $pa=$Promotion->getPrix_ancien();
            $pn=$Promotion->getPrix_nouveau();
            $pr=$Promotion->getPourcentage();

            $req->bindValue(':id',$id);
            $req->bindValue(':prix_ancien',$pa);
            $req->bindValue(':prix_nouveau',$pn);
            $req->bindValue(':pourcentage',$pr);

            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerPromotion($ID){
        $sql="DELETE FROM Promotion where id ='$ID'";
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