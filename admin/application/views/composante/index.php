<?php $this->load->view('templates/header') ?>

<div class="container">
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>
<!--endmenuleft-->

<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>

              <p><a class="btn btn-primary" href="<?php echo site_url('composante/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;
                      <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a>
                      <span style="float:right; font-weight: ">Nombre de composante : <?php echo $total_composante;  ?></p>

<table  class="table table-bordered" style="font-size: 11px;">
    <thead>
				<tr>
					<th>Nom</th>
					<th>Mail 1</th>
					<th>Mail 2</th>
					<th>Sigle</th>
					<th>Action</th>
				</tr>
			</thead>

<?php foreach ($composante as $composante_item): ?>
        <tr>
            <td><?php echo $composante_item['nom']; ?></td>
            <td><?php echo $composante_item['mail1']; ?></td>
            <td><?php echo $composante_item['mail2']; ?></td>
            <td><?php echo $composante_item['sigle']; ?></td>
            <td>
                <a title="Afficher" href="<?php echo site_url('composante/'.$composante_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> |
                <a title="Modifier" href="<?php echo site_url('composante/edit/'.$composante_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> |
                <a title="Supprimer" href="<?php echo site_url('composante/delete/'.$composante_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
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
