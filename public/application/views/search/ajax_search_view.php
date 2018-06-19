<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
<style>
    .title-form {
        font: 500 1.15em "cabin", Arial, "Helvetica Neue", Helvetica, "Bitstream Vera Sans", sans-serif;
        line-height: 1.2;
        margin: 0 0 0.85em;
        border: solid 1px #ccc;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }
    table{
        margin: 0 auto;
        clear: both;
        border-collapse: collapse;
        table-layout: fixed; // ***********add this
        word-wrap:break-word; // ***********and this
    }

    th.action-col{
        width: 50px !Important;
    }

    .modal {
        width: 100%;
        height: 100%;
        float: left;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<?php $this->load->view('_partials/navbar'); ?>
<script type="text/javascript">
    function selectfiliere() {
        var id_domaine = $('#id_domaine').val();

        $.post('<?php echo base_url();?>index.php/search/filierebydomaine/',
            {
                id_domaine: id_domaine

            },
            function (data) {
                $('#id_filiere').html(data);
            });
        refreshTable();

    }

    var save_method; //for save method string
    var table;
    var _data = [];

    function loadTable(id_type_formation, id_domaine, id_composante, id_filiere, id_diplome, id_site, key,regex_alternance) {
        var id_type_stage = document.getElementById('id_type_stage').value;
        $.ajax({
            url: '<?php echo site_url('formation/get_formation')?>',
            type: 'POST',
            data: 'id_type_formation=' + id_type_formation + '&id_domaine=' + id_domaine + '&id_composante=' + id_composante + '' +
            '&id_filiere=' + id_filiere + '&id_diplome=' + id_diplome + '&id_site=' + id_site + '&key=' + key + '&id_rythme=' + regex_alternance + '&id_type_stage=' + id_type_stage,
            dataType: 'json',
            success: function (data) {
                _data = data.data;
                $('#table').dataTable().fnClearTable();
                if (_data.length > 0) {
                    $('#table').dataTable().fnAddData(_data);
                }
            }
        });
    }

    function refreshTable() {
        var type_formation=document.getElementById('id_type_formation').value;
        var domaine=document.getElementById('id_domaine').value;
        var composante=document.getElementById('id_composante').value;
        var filiere=document.getElementById('id_filiere').value;
        var diplome=document.getElementById('id_diplome').value;
        var site=document.getElementById('id_site').value;
        var key_word=document.getElementById('key_word').value;
        var regex_alternance=document.getElementById('id_rythme').value;
        loadTable(type_formation, domaine, composante, filiere, diplome, site, key_word,regex_alternance);
    }

    $(document).ready(function () {
        $("#btn1").click(function () {
            searchFormation()
        });
        $("#btn_cancel").click(function () {
            document.getElementById('form-horizontal').reset();
            loadTable(0, 0, 0, 0, 0, 0, '');
        });

        /*  var id_type_formation = document.getElementById('id_type_formation').value;
          var id_domaine = document.getElementById('id_domaine').value;
          var id_composante = document.getElementById('id_composante').value;
          var id_filiere = document.getElementById('id_filiere').value;
          var id_diplome = document.getElementById('id_diplome').value;
          var id_site = document.getElementById('id_site').value;
          var key = document.getElementById('key_word').value;
          var regex_alternance = document.getElementById('id_rythme').value;
          loadTable(id_type_formation, id_domaine, id_composante, id_filiere, id_diplome, id_site, key,regex_alternance);*/

        refreshTable();

        //datatables
        table = $('#table').DataTable({
            order: [ [ 0, "asc" ] ],
            "searching": true,
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [ {
                orderable: true,
                targets: -1
            } ],
            data: _data,
            //"dom": "ltip",  // Remove global search box
            "language": {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }
        });


        //We update the
        table.on('draw.dt', function () {
            $("#nbre_formation").html('<span class="text-primary"><b>' + JSON.stringify(table.page.info().recordsDisplay) + '</b></span>');
        });

        // Setup - add a text input to each footer cell
        $('#table tfoot th').each(function (i) {
            var title = $(this).text();
            if(i!=4){
                $(this).html('<input type="text" class="form-control" placeholder="Recherche ' + title + '" />');
            }
        });

        // Apply the search
        table.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

    });
</script>
<div class="container">
    <div class="row">

        <h2>Calendrier et Rythmes d'alternance</h2>
        <style type="text/css">

            #box {
                width: 500px;
                height: 200px;
            }
        </style>



        <div class="panel-body" style="background-color: #f7f7f7; border-radius:0.7em; ;padding: 15px;">
            <span style="float:right; font-weight: ">Nombre de formations : <span
                        id="nbre_formation"><b><?php echo $total_formation ?></b></span></span>
            <h4>Filtre</h4>
            <hr>
            <div id="search_form">
                <form class="form-horizontal" id="form-horizontal" method="post" accept-charset="utf-8">
                    <div class="form-inline" style="padding:10px;">
                        <div class="form-group" style="margin-right:20px;">
                            <label for="id_type_formation">Type formation</label>
                            <select onchange="refreshTable()"
                                    name="id_type_formation" class="form-control" id="id_type_formation">
                                <option value="0">- Choisir -</option>
                                <?php
                                foreach ($type_formation as $type_formation_item) {
                                    ?>
                                    <option value="<?php echo $type_formation_item['id'] ?>"><?php echo $type_formation_item['nom'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-right:20px;">
                            <label for="id_domaine">Domaine</label>
                            <select name="id_domaine" class="form-control" id="id_domaine" style="width:210px"
                                    onchange="selectfiliere()">
                                <option value="0">- Choisir -</option>
                                <?php
                                foreach ($domaine as $domaine_item) {
                                    ?>
                                    <option value="<?php echo $domaine_item['id'] ?>"><?php echo $domaine_item['nom'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_diplome">Diplôme</label>
                            <select onchange="refreshTable()"
                                    name="id_diplome" class="form-control" id="id_diplome" style="width:205px">
                                <option value="0">- Choisir -</option>
                                <?php
                                foreach ($diplome as $diplome_item) {
                                    ?>
                                    <option value="<?php echo $diplome_item['id'] ?>"><?php echo $diplome_item['nom'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Filière</label>
                        <div class="col-sm-10">
                            <select onchange="refreshTable()"
                                    name="id_filiere" class="form-control" id="id_filiere">
                                <option value="0">- Choisir -</option>
                            </select></div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Composante</label>
                        <div class="col-sm-10">
                            <select onchange="refreshTable()"
                                    name="id_composante" class="form-control" id="id_composante">
                                <option value="0">- Choisir -</option>
                                <?php
                                foreach ($composante as $composante_item) {
                                    ?>
                                    <option value="<?php echo $composante_item['id'] ?>"><?php echo $composante_item['nom'] . " - (" . $composante_item['sigle'] . ")" ?></option>
                                    <?php
                                }
                                ?>
                            </select></div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group" style="margin-right:20px;">
                            <label for="title" class="col-sm-2 control-label">Site</label>
                            <div class="col-sm-10">
                                <select onchange="refreshTable()"
                                        name="id_site" class="form-control" id="id_site">
                                    <option value="0">- Choisir -</option>
                                    <?php
                                    foreach ($site as $site_item) {
                                        ?>
                                        <option value="<?php echo $site_item['id'] ?>"><?php echo $site_item['nom'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input style="visibility: hidden" type="text" class="form-control" name="key" id="key_word"
                                   placeholder="Mot clé"
                                   onkeyup="refreshTable()">
                        </div>
                    </div>

                    <div id="stage" class="col-sm-8">
                        <div class="form-inline">
                            <h5 style="color:blue">STAGE</h5>
                            <hr>
                            <div class="form-group" style="margin-right:10px;">
                                <label for="title" class="col-sm-2 control-label" style="margin-right:5px;">Type</label>
                                <div class="col-sm-10">
                                    <select name="id_type_stage" class="form-control" id="id_type_stage" onchange="refreshTable()">
                                        <option value="0">- Choisir -</option>
                                        <?php
                                        foreach ($type_stage as $type_stage_item) {
                                            ?>
                                            <option value="<?php echo $type_stage_item['id'] ?>"><?php echo $type_stage_item['nom'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-right:10px;">
                                <label for="title" class="col-sm-2 control-label"
                                       style="margin-right:5px;">Début</label>
                                <div class="col-sm-10">
                                    <select name="id_debut_stage" class="form-control" id="id_debut_stage">
                                        <option value="0">- Choisir -</option>
                                        <?php
                                        $mois = array(1 => 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
                                        $i = 0;
                                        foreach ($mois as $site_item) {

                                            $i++;
                                            ?>
                                            <option value="<?php echo $i ?>"><?php echo $site_item ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="margin-right:10px;">
                                <label for="title" class="col-sm-2 control-label" style="margin-right:5px;">Fin</label>
                                <div class="col-sm-10">
                                    <select name="id_fin_stage" class="form-control" id="id_fin_stage">
                                        <option value="0">- Choisir -</option>
                                        <?php
                                        $i = 0;
                                        foreach ($mois as $site_item) {
                                            $i++;
                                            ?>
                                            <option value="<?php echo $i ?>"><?php echo $site_item ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div id="alternance" class="col-sm-4">
                        <div class="form-inline">
                            <h5 style="color:blue">ALTERNANCE</h5>
                            <hr>
                            <div class="form-group" style="margin-right:10px;">
                                <label for="id_debut_stage" class="col-sm-2 control-label" style="margin-right:5px;">Rythme</label>
                                <div class="col-sm-10">
                                    <select name="id_rythme" class="form-control" id="id_rythme" onchange="refreshTable()">
                                        <option value="0">- Choisir -</option>
                                        <?php
                                        foreach ($regex_alt as $regex_alt_item) {

                                            ?>
                                            <option value="<?php echo $regex_alt_item['regex_alternance'] ?>"><?php echo $regex_alt_item['regex_alternance'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> (Entreprise/Ecole)
                                </div>
                            </div>
                        </div>
                    </div>


                    <br/>
                    <hr>
                    <br/>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" id="btn1" type="button" title="Afficher">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </button>
                        <button class="btn btn-danger" id="btn_cancel" type="button" title="Réinitialiser">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </button>
                    </div>
                </form>
            </div>
            <a href="javascript:openSearch()" style="float:right"><span class="glyphicon glyphicon-chevron-down"
                                                                        aria-hidden="true" id="chevron"
                                                                        style="float:right"></span></a>
        </div>
        <br/>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="table"  class="display responsive table table-hover table-striped table-bordered"  cellspacing="0"
               style="font-size: 11px; vertical-align: middle">
            <thead>
            <tr>
                <th class="all">Mention</th>
                <th class="all">Domaine d'étude</th>
                <th class="all">Parcours/Filière</th>
                <th class="all">Accessible en</th>
              <!--  <th class="none">Diplôme</th>
                <th class="none">Composante</th>
                <th class="none">En entreprise</th>-->
                <th class="all action-col">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
                <th>Mention</th>
                <th>Domaine d'étude</th>
                <th>Parcours/Filière</th>
                <th>Accessible en</th>
              <!--  <th>Diplôme</th>
                <th>Composante</th>
                <th>En entreprise</th>-->
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
        <br/>
        <span id="box" style="padding:50px; width:100%;"></span>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Détail de la formation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php include 'view_detail.html' ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>
<!--endmaincontent-->
</div>

<script type="text/javascript">
  function getDetail(id_formation){
      document.getElementById('id_group_detail_alternance').style.display="block";
      document.getElementById('id_group_detail_stage').style.display="block";
      $.ajax({
          url: '<?php echo site_url('formation/get_formation_by_id')?>',
          type: 'POST',
          data: 'id_formation=' + id_formation,
          dataType: 'json',
          success: function (data) {
              document.getElementById('mention').innerHTML=(data.data[0].libelle).toUpperCase();
              document.getElementById('detail_type_formation').innerHTML =  (data.data[0].type_formation).join('<br>');
              document.getElementById('detail_domaine').innerHTML=data.data[0].nom_do;
              document.getElementById('detail_filiere').innerHTML=data.data[0].nom_f;
              document.getElementById('detail_diplome').innerHTML=data.data[0].nom_d;
              document.getElementById('detail_composante').innerHTML=data.data[0].nom_c;
              document.getElementById('detail_rythme').innerHTML=data.data[0].regex_alternance;
              document.getElementById('detail_type_stage').innerHTML=data.data[0].detail_stage;

              if(data.data[0].regex_alternance==''){
                  document.getElementById('id_group_detail_alternance').style.display="none";
              }
              if(data.data[0].detail_stage==''){
                  document.getElementById('id_group_detail_stage').style.display="none";
              }
          }
      });

  }
</script>
<?php $this->load->view('_partials/footer') ?>
