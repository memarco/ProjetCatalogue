<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
<style>
    #table{
        margin: 0 auto;
        width: 100%;
        clear: both;
        border-collapse: collapse;
        table-layout: fixed; // ***********add this
    word-wrap:break-word; // ***********and this
    }
    th.action-col{
        width: 50px !Important;
    }

    .title-form {
        font: 500 1.15em "cabin", Arial, "Helvetica Neue", Helvetica, "Bitstream Vera Sans", sans-serif;
        line-height: 1.2;
        margin: 0 0 0.85em;
        border: solid 1px #ccc;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .modal {
        width: 100%;
        height: 100%;
        float: left;
        left: 50%;
        top: 50%;
        transform: translate(-55%, 2%);
    }
</style>
<?php $this->load->view('templates/header') ?>


<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <?php $this->load->view('templates/main_head') ?>
        <!--maincontent-->
        <div class="col-md-12 col-lg-12" style=" background-color: #f7f7f7; border-radius:0.7em; ;padding: 15px;">
                <span style="float:right; font-weight: ">Nombre de formations : <span
                            id="nbre_formation"><b><?php echo $total_formation ?></b></span></span>
            <h4>Recherche
                <small><a href="javascript:openSearch()">Affinez votre recherche </a>|
                    <a title="Ajouter une formation" href="<?php echo site_url('formation/create'); ?>"> &nbsp;Nouvelle
                        formation
                        <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a></small>
            </h4>
            <hr>
            <div id="search_form" style="display:none">
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
                            <select onchange="refreshTable()"
                                    name="id_domaine" class="form-control" id="id_domaine" style="width:210px">
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
                                <?php
                                foreach ($filiere as $filiere_item) {
                                    ?>
                                    <option value="<?php echo $filiere_item['id'] ?>"><?php echo $filiere_item['nom'] ?></option>
                                    <?php
                                }
                                ?>
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
                                    <option value="<?php echo $composante_item['id'] ?>"><?php echo $composante_item['nom'] ?></option>
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
                        <button class="btn btn-danger" id="btn_cancel" type="button"><i
                                    class="glyphicon glyphicon-remove"></i> Réinitialiser
                        </button>
                        <div class="form-group">
                            <input style="visibility: hidden" type="text" class="form-control" name="key" id="key_word"
                                   placeholder="Mot clé"
                                   onkeyup="refreshTable()">
                </form>
            </div>
        </div>
    </div>
    <a href="javascript:openSearch()" style="float:right"><span class="glyphicon glyphicon-chevron-down"
                                                                aria-hidden="true" id="chevron"
                                                                style="float:right"></span></a>

    <br/>
    <div id="filter"></div>
</div>
<div class="col-md-12 col-lg-12">
    <table id="table" class="table table-striped table-bordered" cellspacing="0"
           style="font-size: 11px; vertical-align: middle">
        <thead>
        <tr>
            <th>Mention</th>
            <th>Parcours/Filière</th>
            <th>Domaine d'étude</th>
            <th>Type de formation</th>
            <th>Diplôme</th>
            <th>Composante</th>
            <th class="action-col">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>

        <tfoot>
        <tr>
            <th>Mention</th>
            <th>Parcours/Filière</th>
            <th>Domaine d'étude</th>
            <th>Type de formation</th>
            <th>Diplôme</th>
            <th>Composante</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
</div>
</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_edit" role="dialog" style="width: 100%">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"  style="width: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Modifier une formation</h3>
            </div>
            <div>
                <iframe id="frame_form_edit" class="col-lg-12 col-md-12" style="min-height: 550px; border: 0px">

                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="close_edit_form()">Fermer</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<div class="modal fade" id="detailModal"  role="dialog"  style="width: 100%">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="width: 100%">
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
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>


<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var _data = [];

    function loadTable() {
        var id_type_formation = document.getElementById('id_type_formation').value;
        var id_domaine = document.getElementById('id_domaine').value;
        var id_composante = document.getElementById('id_composante').value;
        var id_filiere = document.getElementById('id_filiere').value;
        var id_diplome = document.getElementById('id_diplome').value;
        var id_site = document.getElementById('id_site').value;
        var key = document.getElementById('key_word').value;
        $.ajax({
            url: '<?php echo site_url('formation/get_formation')?>',
            type: 'POST',
            data: 'id_type_formation=' + id_type_formation + '&id_domaine=' + id_domaine + '&id_composante=' + id_composante + '' +
            '&id_filiere=' + id_filiere + '&id_diplome=' + id_diplome + '&id_site=' + id_site + '&key=' + key,
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
        loadTable();
    }

    $(document).ready(function () {

        $("#btn_cancel").click(function () {
            document.getElementById('form-horizontal').reset();
            loadTable();
        });
        loadTable();

        //datatables
        table = $('#table').DataTable({
            "searching": true,
            data: _data,
            //"dom": "ltip",  // Remove global search box
            "order": [], //Initial no order.
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
        $('#table tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Recherche ' + title + '" />');
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

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });

    function close_edit_form(){
        $("#modal_edit").modal('hide');
        refreshTable();
    }

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
                document.getElementById('detail_competence').innerHTML=data.data[0].skills;

                if(data.data[0].regex_alternance==''){
                    document.getElementById('id_group_detail_alternance').style.display="none";
                }
                if(data.data[0].detail_stage==''){
                    document.getElementById('id_group_detail_stage').style.display="none";
                }
            }
        });

    }
    function edit_formation(id_formation){
        document.getElementById('frame_form_edit').src = "<?php  echo base_url('index.php/formation/edit/')."/"?>"+id_formation;
        $("#modal_edit").modal('show');
    }
</script>

<?php $this->load->view('templates/footer') ?>
