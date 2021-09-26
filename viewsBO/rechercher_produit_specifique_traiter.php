<?php


require "../include.php";

session_start();
$recl=new produit_specifiqueC();
$DB = new config();
?>

<?php

if ($_GET['q']!="")
    $listeProduit_sp = $recl->afficher_Produit_specifique_traiter_recherche($_GET['q']);

else
    $listeProduit_sp = $recl->afficher_Produit_specifique_traiter();
?>

<table class="table table-data2">
    <thead>
    <tr>
        <th>
            <label class="au-checkbox">
                <input type="checkbox">
                <span class="au-checkmark"></span>
            </label>
        </th>
        <th>titre</th>
        <th>auteur</th>
        <th>categorie</th>
        <th>Autre information</th>
        <th>Adresse Email</th>
        <th>N°Tel</th>
        <th>Etat</th>



        <th></th>
    </tr>
    </thead>
    <?php foreach($listeProduit_sp as $row)
    : ?>
    <tbody>
    <tr class="tr-shadow">
        <td>
            <label class="au-checkbox">
                <input type="checkbox">
                <span class="au-checkmark"></span>
            </label>
        </td>
        <td><?PHP echo $row['Titre']; ?></td>
        <td><?PHP echo $row['auteur']; ?></td>
        <td><?PHP echo $row['categorie']; ?></td>
        <td><?PHP echo $row['autre_info']; ?></td>

        <td><?PHP echo $row['mail']; ?></td>
        <td><?PHP echo $row['telephone']; ?></td>
        <td><?PHP if($row['etat']=='non')echo"<span class=\"status--denied\">non</span>";
            else echo"<span class=\"status--process\">oui</span>";?></td>
        <td>
        <td>
            <div class="table-data-feature">

                <div class="table-data-feature">
                    <button class="item" data-toggle="modal" data-placement="top" title="Delete" data-target="#delete<?PHP echo $row['id']; ?>" data-toggle="modal" data-target="#myModal" title="Repondre">   >
                        <i class="zmdi zmdi-delete"></i>
                    </button>



                </div>
        </td>
        <div id="delete<?PHP echo $row['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="supprimerReclamation.php">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Suppression</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                    <div class="alert alert-danger">vous voulez suprimer ? </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </tr>
    <tr class="spacer"></tr>

    <?php       endforeach;?>
    </tbody>

</table>
