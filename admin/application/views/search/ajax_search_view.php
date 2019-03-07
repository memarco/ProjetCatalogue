<?php $this->load->view('templates/header') ?>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

<div class="container">
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>
<!--endmenuleft-->

<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>
<style type="text/css">
	body {
		margin: 50px 0 0 20px;
	}

	#box {
		width: 500px;
		height: 200px;b
	}
	</style>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<script type="text/javascript">
	function searchFormation(){

				$("#listResult tr td").remove();
			var json = { "something_id" : document.getElementById('key_word').value,
			"id_type_formation" : document.getElementById('id_type_formation').value,
		"id_filiere" : document.getElementById('id_filiere').value,
	"id_composante" : document.getElementById('id_composante').value,
"id_domaine" : document.getElementById('id_domaine').value,
"id_site" : document.getElementById('id_site').value,
"id_diplome" : document.getElementById('id_diplome').value
};
			/* var id_type_formation = { "id_type_formation" : document.getElementById('id_type_formation').value};
			var id_filiere = { "id_filiere" : document.getElementById('id_filiere').value};
			var id_composante = { "id_composante" : document.getElementById('id_composante').value};
			var id_domaine = { "id_domaine" : document.getElementById('id_domaine').value};
			var id_site = { "id_site" : document.getElementById('id_site').value};*/
			var url = "<?php echo site_url('/search/get_something'); ?>";

			// You may also use the .post method without the extra error checking and flare of .ajax
			// $.post(url, json, function(data){
			// 	if (data){
			// 		$("#box").html(data.something);
			// 	}
			// });

			$.ajax({
				url: url,
				dataType: 'json',
				type: 'POST',
				data: json,
				success: function(data, textStatus, XMLHttpRequest)
				{
					var tr;
	        for (var i = 0; i < data.data_list.length; i++) {
						id = data.data_list[i].id.toString();
	            tr = $('<tr/>');
	            tr.append("<td>" + data.data_list[i].nbre_modif.toString() + "</td>");
	            tr.append("<td>" + data.data_list[i].libelle.toString() + "</td>");
	            tr.append("<td>" + data.data_list[i].nom_f.toString() + "</td>");
	            tr.append("<td>" + data.data_list[i].nom_do.toString() + "</td>");
	            tr.append("<td>" + data.data_list[i].nom_typ.toString() + "</td>");
	            tr.append("<td>" + data.data_list[i].nom_d.toString() + "</td>");
	            tr.append("<td>" + data.data_list[i].nom_c.toString() + "</td>");
	            tr.append("<td><a href=\"<?php echo site_url('formation/');?>/"+id+"\"><p title=\"Afficher\" class=\"glyphicon glyphicon-search text-primary\" aria-hidden=\"true\"></p></a>"
							+"<a title=\"Editer\" href=\"<?php echo site_url('formation/edit/');?>/"+id+"\"><p class=\"glyphicon glyphicon-pencil text-warning\" aria-hidden=\"true\"></p></a>"
+"<a title=\"Dupliquer\" href=\"<?php echo site_url('formation/duplicate/');?>/"+id+"\"><p class=\"glyphicon glyphicon-plus text-success\" aria-hidden=\"true\"></p></a>"
+"<a title=\"Supprimer\" href=\"<?php echo site_url('formation/delete/');?>/"+id+"\"><p class=\"glyphicon glyphicon-remove text-danger\" aria-hidden=\"true\"></p></a>"
							+"</td>");
	            $('#listResult').append(tr);
	        }
					$("#nbre_formation").html('<span class="text-primary"><b>'+data.data_list.length+'</b></span>');
					$("#box").html('');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
					// Error Message
					$("#box").html('Error connecting to:' + url);
				}
			});

			// Loading message
			$("#box").html('Chargement...');
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
         <button class="btn btn-primary" id="btn1" type="button"  title="Chercher">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		         <button class="btn btn-danger" id="btn_cancel" type="button" title="Réinitialiser">&nbsp;<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
     </div>
	 </div>
	</form>
</div>
	<a href="javascript:openSearch()"   style="float:right" ><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="chevron" style="float:right"></span></a>
</div>
<br/>
<table  id="listResult" class="table table-bordered" style="font-size: 11px; vertical-align: middle">
<thead>
<tr>
<th  style="vertical-align: middle">Nbre Modifs</th>
<th  style="vertical-align: middle">Mention</th>
<th  style="vertical-align: middle">Parcours/Filière</th>
<th  style="vertical-align: middle">Domaine d'étude</th>
<th  style="vertical-align: middle">Type formation</th>
<th  style="vertical-align: middle">Diplôme</th>
<th  style="vertical-align: middle">Composante</th>
<!--					<th>Site</th>-->
<th  style="vertical-align: middle">Action</th>
</tr>
</thead>

</table><br/>
<span id="box" style="padding:50px; width:100%;"></span>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>

<?php $this->load->view('templates/footer') ?>
