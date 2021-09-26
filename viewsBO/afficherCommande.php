<div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">Commandes Recu</h3>
                <form method="get" action="commande.php">
                    <div class="table-data__tool">
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option value="0">Today</option>
                                <option value="3">3 Days</option>
                                <option value="1">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <div class="input-group-btn">
                            <button  name="filtre" value="filtre" class="btn btn-primary">
                                <i class="fa fa-dot-circle-o"></i> Filters
                            </button>
                        </div>

                        <div class="input-group">
                            <div class="col col-sm-3">
                                <input name="nom" type="text" placeholder="Nom.." class="form-control">
                            </div>
                            <div class="input-group-btn">
                                <button  name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>

                        </div>

                    </div>
                </form>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>Adresse</th>
                            <th>date</th>
                            <th>status</th>

                        </tr>
                        </thead>
                        <?php foreach($list as $row){ ?>
                            <form method="post" action="modifierEtat.php?id=<?=$row['ID_Commande']?>">

                                <tbody>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td class="desc"><?= $row['Nom']?><?= $row['Prenom']?></td>
                                    <td ><?= $row['Adresse_Street']?></td>
                                    <td><?= $row['Date_Creation']?></td>
                                    <td>
                                        <div class="col-12 col-md-9">
                                            <select name="etat" id="SelectLm" class="form-control-sm form-control" onchange="this.form.submit()">
                                                <option value="En Cours"><?=$row['Etat_Commande']?></option>
                                                <option value="Invalid">Invalid</option>
                                                <option value="Valid">Valide</option>

                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button name="delete" class="item" data-toggle="tooltip" data-placement="top" data-target="#delete<?PHP echo $row['ID_Commande']; ?>" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>

                                            <button  name="more" class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>

                                        </div>
                                    </td>
                                    <div class="modal" id="delete<?= $row['ID_Commande']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Heading</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <?= $row['ID_Commande']?>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </tr>

                                </tbody>
                            </form>

                        <?php } ?>
                    </table>
                </div>

                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>

