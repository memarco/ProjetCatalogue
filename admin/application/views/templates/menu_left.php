<style>
   #accordion{
       position: fixed;
    }*/
    .fixgauche{
        z-index: 9999;
        position: fixed;
        top: 0;
        /* Mise en forme */
        width: 270px;
    }

</style>
<div class="col-md-2 col-lg-2"  >
            <div class="panel-group"  id="accordion">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Catalogue</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-duplicate"></span><a href="<?php echo site_url('formation/'); ?>">Formations</a> |
                                        <a href="<?php echo site_url('ajax_search_view'); ?>" title="Recherche"><span class="glyphicon glyphicon-search text-right" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-magnet text-success"></span><a href="<?php echo site_url('filiere/'); ?>">Parcours/Filières</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-transfer text-success"></span><a href="<?php echo site_url('type_formation/'); ?>">Types Formations</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-tasks text-info"></span><a href="<?php echo site_url('domaine/'); ?>">Domaines d'étude</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span><a href="<?php echo site_url('page/'); ?>">Pages</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-sunglasses text-info"></span><a href="<?php echo site_url('historique/'); ?>">Mouchard</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                 <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-education">
                            </span>Diplômes</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-folder-close"></span><a href="<?php echo site_url('diplome/'); ?>">Diplômes</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-level-up"></span><a href="<?php echo site_url('niveau/'); ?>">Niveaux</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                 <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <span class="glyphicon glyphicon-bookmark"></span>Stage & Alternance</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-random text-success"></span><a href="<?php echo site_url('type_periode/'); ?>">Rytmes d'alternance</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-tasks text-success"></span><a href="<?php echo site_url('type_stage/'); ?>">Types de stage</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-globe">
                            </span>Composantes</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-play-circle"></span><a href="<?php echo site_url('composante/'); ?>">Composantes</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-map-marker text-success"></span><a href="<?php echo site_url('site/'); ?>">Sites</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-user">
                            </span>Mon compte</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-edit"></span><a href="#">Mot de passe</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-flash"></span><a href="#">Notifications</a> <span class="label label-info">5</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <span class="glyphicon glyphicon-log-out"></span><a href="<?php echo base_url() ?>index.php/login/logout_user">Déconnexion</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
</div>
