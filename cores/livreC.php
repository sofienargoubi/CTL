<?php
//include "../config.php";
class livreC{
    function ajouter_livre($livre){
        $iden=$livre->getid();
        $title=$livre->gettitre();
        $nom=$livre->getnom();
        $categorie=$livre->getcategorie();
        $cover=$livre->getcover();
        $prix=$livre->getprix();
        $c=new config();
        $bdd=$c->getConnexion();
        $sql = "insert into livre (titre,categorie,nom_auteur,cover,prix) values (:titre,:categorie,:nom_auteur,:cover,:prix)";

        try {
            $req = $bdd->prepare($sql);
            $req->bindValue(':titre', $title);
            $req->bindValue(':categorie', $categorie);
            $req->bindValue(':nom_auteur',$nom );
            $req->bindValue(':cover', $cover);
            $req->bindValue(':prix', $prix);
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
        //$bdd = new PDO('mysql:host=localhost;dbname=projet web;charset=utf8', 'root', '');
        //$rqt="insert into livre values('$iden','$title','$categorie','$nom','$cover','$prix')";
        //$bdd->exec($rqt);
    }
    function modifier_livre($livre){
        $iden=$livre->getid();
        $title=$livre->gettitre();
        $nom=$livre->getnom();
        $prix=$livre->getprix();
        $c=new config();
        $bdd=$c->getConnexion();
        $sql="UPDATE livre SET  titre=:titre,nom_auteur=:nom,prix=:prix WHERE id=:id";
        try {
            $req = $bdd->prepare($sql);
            $req->bindValue(':id', $iden);
            $req->bindValue(':titre', $title);
            $req->bindValue(':nom',$nom );
            $req->bindValue(':prix', $prix);
            $req->execute();

        }
        catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimer_livre($id){
        $sql="DELETE FROM livre where id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficher_livre($page,$nbr){
        $sql="SElECT * From livre limit $page,$nbr";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficher(){
        $sql="SElECT * From livre";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function nbr_page($nbr){
        $sql="SElECT * From livre";
        $db = mysqli_connect("localhost","root","","web");;
        $result=mysqli_query($db,$sql);
        //$liste=$db->query($sql);
        $n=mysqli_num_rows($result);
        $a=$n/$nbr;
        $b=ceil($a);
        return $b;
    }

    function findlivre($id){
        $sql="SElECT * From livre where id='$id'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function rechercher_livre($titre,$page){
        $sql="SELECT * from livre where titre = '$titre' limit $page,5";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercher_livre2($titre,$nom){
        $sql="SELECT * from livre where titre = '$titre' AND nom_auteur='$nom'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function trier_livre2($t,$p){
        $sql="SELECT * from livre order by $t,$p";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function trier_livre($titre,$page){
        $sql="SELECT * from livre order by $titre";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercher_livreid($id){
        $sql="SELECT * from livre where id = '$id' ";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function livre(){
        $sql="SELECT * from livre ";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercher_livrec($c){
        $sql="SELECT * from livre where categorie = '$c' limit 0,4";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function count_categorie($c){
        $sql=" SELECT * from livre where categorie = '$c' ";
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