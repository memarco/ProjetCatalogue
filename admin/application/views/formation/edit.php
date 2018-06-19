<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

    <style>

        body {
            margin-top: 10px;
        }

        .glyphicon {
            margin-right: 10px;
        }

        .panel-body {
            padding: 0px;
        }

        .panel-body table tr td {
            padding-left: 15px
        }

        .panel-body .table {
            margin-bottom: 0px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
</head>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" style="min-height: 500px" >
            <div>
                <div class="panel-body" style="margin-left: 0px;background-color: #f7f7f7; border-radius:0.7em; ;padding: 15px;">


        <?php echo validation_errors(); ?>

        <?php echo form_open('formation/edit/' . $formation_item['id']); ?>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label"><abbr title="(Libellé de la formation)">Mention</abbr>
                <span class="h"></span></label>
            <div class="col-sm-10">
                <textarea   id="email" class="form-control" style="font-size: large"
                          name="mention"><?php echo $formation_item['libelle']; ?></textarea>
                <?php echo form_error('mention', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Type formation</label>
            <div class="col-sm-10">

                <select name="id_type_formation[]"   multiple="multiple" id="id_type_formation" >
                    <?php
                    foreach ($type_formation as $type_formation_item): ?>
                        <option value="<?php echo $type_formation_item['id']; ?>"
                            <?php
                            for($i=0;$i<count($type_formation_selected);$i++){
                            if ($type_formation_item['id'] == $type_formation_selected[$i]['id_type_formation']) {
                                echo 'selected';
                            }
                            }
                            ?>>
                            <?php echo $type_formation_item['nom']; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group" style="display: none;">
            <label for="title" class="col-sm-2 control-label">Alternance</label>
            <div class="col-sm-10">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default  <?php if (1 == $formation_item['est_alternance']) {
                        echo 'active';
                    }
                    ?>"><input type="radio" name="est_alternance" value="1" id="oui_alternance"
                            <?php if (1 == $formation_item['est_alternance']) {
                                echo 'checked';
                            }
                            ?>> OUI</label>
                    <label class="btn btn-default  <?php if (0 == $formation_item['est_alternance']) {
                        echo 'active';
                    }
                    ?>"><input type="radio" name="est_alternance" value="0" id="non_alternance"
                            <?php if (0 == $formation_item['est_alternance']) {
                                echo 'checked';
                            }
                            ?>> NON</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Domaine</label>
            <div class="col-sm-10">
                <select name="id_domaine" class="form-control">
                    <?php
                    foreach ($domaine as $domaine_item): ?>
                        <option value="<?php echo $domaine_item['id']; ?>"
                            <?php if ($domaine_item['id'] == $formation_item['id_domaine']) {
                                echo 'selected';
                            }
                            ?>>
                            <?php echo $domaine_item['nom']; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Filière</label>
            <div class="col-sm-10">
                <select name="id_filiere" class="form-control">
                    <?php
                    foreach ($filiere as $filiere_item): ?>
                        <option value="<?php echo $filiere_item['id']; ?>"
                            <?php if ($filiere_item['id'] == $formation_item['id_filiere']) {
                                echo 'selected';
                            }
                            ?>>
                            <?php echo $filiere_item['nom']; ?>
                        </option>
                    <?php endforeach ?>
                </select></div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Diplôme préparé</label>
            <div class="col-sm-10">
                <select name="id_diplome" class="form-control">
                    <?php
                    foreach ($diplome as $diplome_item): ?>
                        <option value="<?php echo $diplome_item['id']; ?>"
                            <?php if ($diplome_item['id'] == $formation_item['id_diplome']) {
                                echo 'selected';
                            }
                            ?>>
                            <?php echo $diplome_item['nom']; ?>
                        </option>
                    <?php endforeach ?>
                </select></div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Composante</label>
            <div class="col-sm-10">
                <select name="id_composante" class="form-control">
                    <?php
                    foreach ($composante as $composante_item): ?>
                        <option value="<?php echo $composante_item['id']; ?>"
                            <?php if ($composante_item['id'] == $formation_item['id_composante']) {
                                echo 'selected';
                            }
                            ?>>
                            <?php echo $composante_item['nom']; ?>
                        </option>
                    <?php endforeach ?>
                </select></div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Site</label>
            <div class="col-sm-10">
                <select name="id_site" class="form-control">
                    <?php
                    foreach ($site as $site_item): ?>
                        <option value="<?php echo $site_item['id']; ?>"
                            <?php if ($site_item['id'] == $formation_item['id_site']) {
                                echo 'selected';
                            }
                            ?>>
                            <?php echo $site_item['nom']; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>


        <div id="1" class='choix' style="display:block">
            <div class="page-header text-primary"><b>ALTERNANCE</b></div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><abbr title="(Entreprise/Ecole)">Rythme</abbr></label>
                <div class="col-sm-10">
                    <input type="input" id="email" class="form-control"
                           value="<?php echo $formation_item['regex_alternance']; ?>" name="regex_alternance"
                           placeholder="(Ent/Univ) ex: 2mois/2mois  ou 4 sem/4 sem.  ou 2j /3j ">
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><abbr title="Autre détail">Autre détail</abbr></label>
                <div class="col-sm-10">
                    <textarea type="input" id="autre_detail" class="form-control"
                              name="detail_alt"><?php echo $formation_item['detail_alt']; ?></textarea>
                </div>
            </div>
        </div>

        <div id="2" class='choix' style="display:block">
            <div class="page-header text-primary"><b>STAGE</b></div>
            <div class="form-group">
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><abbr title="4|SEM|1$1|OPT">Détail du stage</abbr>
                    <span class="h"></span></label>
                <div class="col-sm-10">
                    <input type="input" id="nbre_semaine" class="form-control" name="regex_stage"
                           placeholder="NBRE|TEMPS|SEMESTRE|OPT ex: 4|SEM|1$1|OPT"
                           value="<?php echo $formation_item['regex_stage']; ?>">

                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><abbr title="(Autres détails)">Commentaire</abbr>
                    <span class="h"></span></label>
                <div class="col-sm-10">
                    <textarea type="input" id="autre_detail" class="form-control"
                              name="detail_stage"><?php echo $formation_item['detail_stage']; ?></textarea>

                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><abbr title="(Mois de début du stage)">Début</abbr>
                    <span class="h"></span></label>
                <div class="col-sm-10">
                    <select name="debut_stage" class="form-control">
                        <option value="">-Choisir-</option>
                        <?php
                        // Tableau de mois
                        $arr = array('Janvier' => 'Janvier', 'Février' => 'Février', 'Mars' => 'Mars', 'Avril' => 'Avril', 'Mai' => 'Mai', 'Juin' => 'Juin', 'Juillet' => 'Juillet', 'Août' => 'Août', 'Septembre' => 'Septembre', 'Octobre' => 'Octobre', 'Novembre' => 'Novembre', 'Décembre' => 'Décembre');


                        foreach ($arr as $key => $value): ?>
                            <option value="<?php echo $key; ?>"
                                <?php if ($key == $formation_item['debut_stage']) {
                                    echo 'selected';
                                }
                                ?>>
                                <?php echo $key; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><abbr title="(Mois de fin du stage)">Fin</abbr> <span
                            class="h"></span></label>
                <div class="col-sm-10">
                    <select name="fin_stage" class="form-control">
                        <option value="">-Choisir-</option>
                        <?php
                        foreach ($arr as $key => $value): ?>
                            <option value="<?php echo $key; ?>"
                                <?php if ($key == $formation_item['fin_stage']) {
                                    echo 'selected';
                                }
                                ?>>
                                <?php echo $key; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class='choix' style="display:block">
            <div class="page-header text-primary"><b>COMPÉTENCE(S) VISÉE(S)</b></div>
            <div class="form-group">
                    <span class="h"></span></label>
                <div class="col-md-12 col-log-12 col-sm-12">
                    <textarea class="form-control text-left" name="skills">
                            <?php echo $formation_item['skills']; ?>
                    </textarea>

                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="col-md-4"></div>
            <div class="col-sm-offset-4 col-sm-4 col-md-4 col-lg-4">
                <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
            </div>
            <div class="col-md-4"></div>
        </div>
        </form>

    </div>
</div>

</div>
<!--endmaincontent-->
</div>
    <!-- Initialize the plugin: -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_type_formation').multiselect();
        });
    </script>