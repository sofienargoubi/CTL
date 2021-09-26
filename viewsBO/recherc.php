<?php
/*

require "../../config.php";

require '../../core/reclamationC.php';
*/

require '../include.php';
session_start();
$recl=new reclamationC();
$DB = new config();
?>

    <?php

    if ($_GET['q']!="")
            $listeReclamation = $recl->afficherReclamtion_tri($_GET['q']);
      else
            $listeReclamation = $recl->afficherReclamtion();
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
        <th>id</th>
        <th>nom</th>
        <th>mail</th>
        <th>Message</th>
        <th>Traitement</th>


        <th></th>
    </tr>
    </thead>
    <?php foreach($listeReclamation as $row):
    ?>


    <tbody>


    <tr class="tr-shadow">
        <td>
            <label class="au-checkbox">
                <input type="checkbox">
                <span class="au-checkmark"></span>
            </label>
        </td>
        <td><?PHP echo $row['id']; ?></td>
        <td><?PHP echo $row['nom']; ?></td>
        <td><?PHP echo $row['mail']; ?></td>
        <td><?PHP echo $row['msg']; ?></td>
        <td><?PHP if($row['traitement']=='non')echo"<span class=\"status--denied\">non</span>";
            else echo"<span class=\"status--process\">oui</span>";?></td>
        <td>
            <div class="table-data-feature">
                <button type="button" class="item"  name="bt" data-toggle="modal" data-target="#m<?PHP echo $row['id']; ?>" data-toggle="modal" data-target="#myModal" title="Repondre">                                                            <i class="zmdi zmdi-mail-send"></i>
                </button>


            </div>
        </td>


        <!-- Modal -->

        <!-- Modal -->
        <div id="m<?PHP echo $row['id']; ?>" class="modal fade"role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">
                        <p>Repondre a la reclamation de <strong><?PHP echo $row['nom']; ?></strong>:</p>
                        <form method="post" action="trait.php">
                            <div class="form-group">
                                <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                <input type="hidden" name="mail" value="<?PHP echo $row['mail']; ?>">

                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text" name="msg"></textarea>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="envoyer">envoyer message</button>
                            </div>

                        </form>


                    </div>

                </div>

            </div>
        </div>


        </div>







        </div>
    </tr>
    <tr class="spacer"></tr>

    <?php       endforeach;?>
    </tbody>

</table>
