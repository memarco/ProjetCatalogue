<?php $this->load->view('templates/header') ?>

<div class="container">
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>
<!--endmenuleft-->

<!--maincontent-->

<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>

              <p><a class="btn btn-primary" href="<?php echo site_url('filiere/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;
                      <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a>
                       <span style="float:right; font-weight: ">Nombre de composante : <?php echo $total_filiere;  ?></p>
<table  class="table table-bordered">
    <thead>
				<tr>
					<th>Nbre modifs.</th>
					<th>Nom</th>
					<th>Domaine</th>
					<th>Action</th>
				</tr>
			</thead>

<?php foreach ($filiere as $filiere_item): ?>
        <tr>
               <td <?php if ($filiere_item['nbre_modif']>0) {
                echo 'style="background-color: green; color:#fff; vertical-align:middle; text-algin:center"';
            }?>><?php echo $filiere_item['nbre_modif']; ?></td>
            <td   style="width: 75% !Important;"><?php echo $filiere_item['nom_f']; ?></td>
            <td   style="width: 75% !Important;"><?php echo $filiere_item['nom_d']; ?></td>
            <td>
                <a title="Afficher" href="<?php echo site_url('filiere/'.$filiere_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> |
                <a title="Modifier" href="<?php echo site_url('filiere/edit/'.$filiere_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> |
                <a title="Supprimer" href="<?php echo site_url('filiere/delete/'.$filiere_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
            </td>
        </tr>
<?php endforeach; ?>
</table>

      <div id="pagination">
        <ul class="tsc_pagination">

        <!-- Show pagination links -->
        <?php

        foreach ($links as $link) {
        echo "<li>". $link."</li>";
        } ?>
     </div>

          </div>
        </div>

</div>
<!--endmaincontent-->
</div>


<?php $this->load->view('templates/footer') ?>
