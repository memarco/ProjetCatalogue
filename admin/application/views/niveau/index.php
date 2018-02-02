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

              <p><a class="btn btn-primary" href="<?php echo site_url('niveau/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;
                      <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a>
                       <span style="float:right; font-weight: ">Nombre de niveau : <?php echo $total_niveau;  ?>
              </p>

<table  class="table table-bordered">
    <thead>
				<tr>
					<th>Nom</th>
					<th>Action</th>
				</tr>
			</thead>

<?php foreach ($niveau as $niveau_item): ?>
        <tr>
            <td><?php echo $niveau_item['nom_niveau']; ?></td>
            <td>
                <a title="Afficher" href="<?php echo site_url('niveau/'.$niveau_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> |
                <a title="Modifier" href="<?php echo site_url('niveau/edit/'.$niveau_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> |
                <a title="Supprimer" href="<?php echo site_url('niveau/delete/'.$niveau_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
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
<!--endmaincontent-->
</div>


<?php $this->load->view('templates/footer') ?>
