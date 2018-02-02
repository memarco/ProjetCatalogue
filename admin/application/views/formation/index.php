
<?php $this->load->view('templates/header') ?>

<div class="container">
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>
<!--endmenuleft-->

<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>
              <div><a class="btn btn-primary" href="<?php echo site_url('formation/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;
                      <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a>
                      <span style="float:right; font-weight: ">Nombre de formations : <?php echo $total_formation;  ?></span>
                      </div>

<br/>
<div class="table-responsive">
  <?php
  if($key_result !=''){
  echo "<span>Résultat pour : <span style=\"color:blue; font-style:italic;\">" .$key_result. "</span>";
  echo " | <a href=\"" .site_url('ajax_search_view')."\"><small>  Aller à la recherche avancée <span class=\"glyphicon glyphicon-share\"></span></small></a>";
  echo "</span>";
  }
   ?>
    <form class="navbar-form" style="float:right" action="<?php echo site_url('formation/'); ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
          <input type="text" class="form-control" name="key" id="key_word" placeholder="Recherche" >
        </div>
                          </form>
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

<?php foreach ($formation as $formation_item): ?>
        <tr>
            <td <?php if ($formation_item['nbre_modif']>0) {
                echo 'style="background-color: green; color:#fff; vertical-align:middle; text-algin:center"';
            }?>><?php echo $formation_item['nbre_modif']; ?></td>
            <td><?php echo $formation_item['libelle']; ?></td>
            <td><?php echo $formation_item['nom_f']; ?></td>
            <td><?php echo $formation_item['nom_do']; ?></td>
            <td><?php echo $formation_item['nom_typ']; ?></td>
            <td><?php echo $formation_item['nom_d']; ?></td>
            <td><abbr title="<?php echo $formation_item['nom_c']; ?>"><?php echo $formation_item['nom_s']; ?></abbr></td>
<!--            <td><?php //echo $formation_item['nom_site']; ?></td>-->
            <td>
                <a title="Afficher" href="<?php echo site_url('formation/'.$formation_item['id']); ?>"><p class="glyphicon glyphicon-search
                                                                                                          text-success" aria-hidden="true"></p></a> |
                <a title="Modifier" href="<?php echo site_url('formation/edit/'.$formation_item['id']); ?>"> <p class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></p></a> |
                <a title="Dupliquer" href="<?php echo site_url('formation/duplicate/'.$formation_item['id']); ?>"> <p class="glyphicon glyphicon-plus text-warning" aria-hidden="true"></p></a> |
                <a title="Supprimer" href="<?php echo site_url('formation/delete/'.$formation_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')">
                    <p class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></p></a>
            </td>
        </tr>
<?php endforeach; ?>
</table>
         <div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
</div>
              </div>
            </div>
        </div>

</div>
<!--endmaincontent-->
</div>
<script type="text/javascript">
$('#fmkey').submit(function(e) {
    var form = $(this);
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('formation/search'); ?>",
        data: 'key=' + $('#key_word').val(),
        success: function(response){
           $( "body" ).append(response);
        },
        error: function() { alert("Error posting feed."); }
   });

});
</script>

<?php $this->load->view('templates/footer') ?>
