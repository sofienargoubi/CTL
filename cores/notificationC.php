<?PHP
class NotificationC {

    function ajouterNotification($mail,$msgg ){
        //INSERT INTO `reclamation` (`id`, `nom`, `mail`, `msg`, `traitement`) VALUES ('444', 'ppp', '444', '444', 'non');
        $sql="INSERT INTO `notification` ( `mail` ,`message`) values (:mail,:msgg)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':msgg',$msgg);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }



    function afficherNotification($mail){
        $sql="SElECT * From notification where mail='$mail'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



    function supprimerNotification($id){
        $sql="DELETE FROM notification where id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function nbr_notif(){
        $dbh = new \PDO('mysql:host=localhost;dbname=web;charset=utf8', 'root', '');
        $sth = $dbh->prepare('SELECT count(*) as total from notification');
        $sth->execute();
        $x=$sth->fetchAll();
        foreach ($x as $b)
        {foreach ($b as $i)
            return $i+0;
        }

    }

}

?>

