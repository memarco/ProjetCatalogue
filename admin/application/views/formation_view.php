
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <?php $this->load->view('templates/header') ?>

    <div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
    <!-- menuleft-->
    <?php $this->load->view('templates/menu_left') ?>
    <!--endmenuleft-->

    <!--maincontent-->
    <?php $this->load->view('templates/main_head') ?>
    <div class="container">
      <div class="panel-body" style="margin-left: 20px;background-color: #f7f7f7; border-radius:0.7em; ;padding: 15px;">
    		<span style="float:right; font-weight: ">Nombre de formations : <span id="nbre_formation"><b><?php echo $total_formation ?></b></span></span>
    		<h4>Recherche <small><a href="javascript:openSearch()">Affinez votre recherche </a>|
    			<a   title="Ajouter une formation"  href="<?php echo site_url('formation/create'); ?>"> &nbsp;Nouvelle formation
    						<span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a></small></h4><hr>
    		<div id="search_form"  style="display:none">
    		  <form class="form-horizontal" id="form-horizontal"  method="post" accept-charset="utf-8">
    			<div class="form-inline" style="padding:10px;">
      		<div class="form-group" style="margin-right:20px;">
    			 <label for="id_type_formation">Type formation</label>
    			<select name="id_type_formation" class="form-control"  id="id_type_formation" >
    					<option value="0">- Choisir -</option>
    					<?php
    					foreach($type_formation as $type_formation_item)
    					{
    							?>
    							<option value="<?php echo $type_formation_item['id']?>"><?php echo $type_formation_item['nom'] ?></option>
    							<?php
    					}
    					?>
    					</select>
    				</div>
      		<div class="form-group" style="margin-right:20px;">
    			<label for="id_domaine">Domaine</label>
    		 	<select name="id_domaine" class="form-control" id="id_domaine" style="width:210px">
    				 <option value="0">- Choisir -</option>
    				 <?php
    				 foreach($domaine as $domaine_item)
    				 {
    						 ?>
    						 <option value="<?php echo $domaine_item['id']?>"><?php echo $domaine_item['nom'] ?></option>
    						 <?php
    				 }
    				 ?>
    				 </select>
    			 </div>
    			 <div class="form-group">
    			 <label for="id_diplome">Diplôme</label>
    				<select name="id_diplome" class="form-control" id="id_diplome" style="width:205px">
    						<option value="0">- Choisir -</option>
    						<?php
    						foreach($diplome as $diplome_item)
    						{
    								?>
    								<option value="<?php echo $diplome_item['id']?>"><?php echo $diplome_item['nom'] ?></option>
    								<?php
    						}
    						?>
    				</select>
    			</div>
    		 </div>
    		 <div class="form-group">
    		 <label for="title" class="col-sm-2 control-label">Filière</label>
    		 <div class="col-sm-10">
    		<select name="id_filiere" class="form-control" id="id_filiere">
    				<option value="0">- Choisir -</option>
    				<?php
    				foreach($filiere as $filiere_item)
    				{
    						?>
    						<option value="<?php echo $filiere_item['id']?>"><?php echo $filiere_item['nom'] ?></option>
    						<?php
    				}
    				?>
    				</select></div>
    		</div>
    		 <div class="form-group">
    		 <label for="title" class="col-sm-2 control-label">Composante</label>
    		 <div class="col-sm-10">
    		<select name="id_composante" class="form-control" id="id_composante">
    				<option value="0">- Choisir -</option>
    				<?php
    				foreach($composante as $composante_item)
    				{
    						?>
    						<option value="<?php echo $composante_item['id']?>"><?php echo $composante_item['nom'] ?></option>
    						<?php
    				}
    				?>
    				</select></div>
    		</div>
    	 <div class="form-inline">
    		<div class="form-group" style="margin-right:20px;">
    		 <label for="title" class="col-sm-2 control-label">Site</label>
    		 <div class="col-sm-10">
    		<select name="id_site" class="form-control" id="id_site">
    				<option value="0">- Choisir -</option>
    				<?php
    				foreach($site as $site_item)
    				{
    						?>
    						<option value="<?php echo $site_item['id']?>"><?php echo $site_item['nom'] ?></option>
    						<?php
    				}
    				?>
    		</select>
    		 </div>
    		</div>
     		<div class="form-group">
     		 <input type="text" class="form-control" name="key" id="key_word" placeholder="Mot clé" >
              <button class="btn btn-default" onclick="reload_table()" type="button"><i class="glyphicon glyphicon-refresh"></i> Raffraîchir</button>
               <button class="btn btn-danger" id="btn_cancel" type="button"><i class="glyphicon glyphicon-remove"></i> Réinitialiser</button>
         </div>
    	 </div>
    	</form>
    </div>
    	<a href="javascript:openSearch()"   style="float:right" ><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="chevron" style="float:right"></span></a>
    </div>
        <br />
        <div style="width:100%" id="filter"></div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0"  style="font-size: 11px; vertical-align: middle">
            <thead>
                <tr>
                    <th>Mention</th>
                    <th>Parcours/Filière</th>
                    <th>Domaine d'étude</th>
                    <th>Type de formation</th>
                    <th>Diplôme</th>
                    <th>Composante</th>
                    <th style="width:175px;">Action</th>
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

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {


    //datatables
    table = $('#table').DataTable({
        "searching": true,
        //"dom": "ltip",  // Remove global search box
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "language": {
                        "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Rechercher&nbsp;:",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {
                        "sFirst":      "Premier",
                        "sPrevious":   "Pr&eacute;c&eacute;dent",
                        "sNext":       "Suivant",
                        "sLast":       "Dernier"
                        },
                        "oAria": {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                 },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('formation_ajax/ajax_list')?>",
            "type": "POST",
						"data":function(data) {
							data.from = document.getElementById('id_type_formation').value;
						    data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
						},
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //We update the
    table.on( 'draw.dt', function () {
    $("#nbre_formation").html('<span class="text-primary"><b>'+JSON.stringify(table.page.info().recordsDisplay)+'</b></span>');
} );


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
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('formation/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var lib_typ;
          if(data.est_alternance == 1){
            lib_typ=data.nom_typ + ", Formation en alternance";
          }else{
            lib_typ=data.nom_typ;
          }
            $('[name="libelle"]').val(data.libelle);
            $('[name="nom_do"]').val(data.nom_do);
            $('[name="nom_f"]').val(data.nom_f);
            $('[name="nom_site"]').val(data.nom_site);
            $('[name="nom_d"]').val(data.nom_d);
            $('[name="nom_s"]').val(data.nom_s);
            $('[name="nom_typ"]').val(lib_typ);
            $('[name="nom_c"]').val(data.nom_c);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail de la formation'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    var id_type_formation=document.getElementById('id_type_formation').value;
  //  table.ajax.reload(null,false); //reload datatable ajax
    table.search( 1 ? ''+id_type_formation+'' : '', true, false ).draw();

}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('person/ajax_add')?>";
    } else {
        url = "<?php echo site_url('person/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('person/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}


$(document).ready(function()
{
  $("#btn1").click(function(){
    searchFormation()
  });
    $("#btn_cancel").click(function(){
      document.getElementById('form-horizontal').reset();
    });
});
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail de la formation</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Mention</label>
                            <div class="col-md-9">
                                <input name="libelle" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Composante</label>
                            <div class="col-md-9">
                                <input name="nom_c" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Filière</label>
                            <div class="col-md-9">
                                <input name="nom_f" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Type formation</label>
                            <div class="col-md-9">
                                <input name="nom_typ" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Diplôme</label>
                            <div class="col-md-9">
                                <input name="nom_d" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Domaine</label>
                            <div class="col-md-9">
                                <input name="nom_do" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Site</label>
                            <div class="col-md-9">
                                <textarea name="nom_site" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</div></div></div></div>
<?php $this->load->view('templates/footer') ?>
