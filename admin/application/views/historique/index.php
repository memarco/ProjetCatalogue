<?php $this->load->view('templates/header') ?>

<div class="container">
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>
<!--endmenuleft-->

<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>

              <p>
                       <span style="float:right; font-weight: ">Nombre de modifications : <?php echo $total_historique;  ?>
              </p>

<table  class="table table-bordered">
    <thead>
				<tr>
					<th>Entité</th>
					<th>Attribut</th>
					<th>Ancienne valeur</th>
					<th>Nouvelle valeur</th>
					<th>Date modification</th>
					<th>Libellé/Mention</th>
					<th>Modifié par</th>
				</tr>
			</thead>

<?php foreach ($historique as $historique_item): ?>
        <tr>
            <td><?php echo $historique_item['nom_table']; ?></td>
            <td><?php echo $historique_item['nom_champ']; ?></td>
            <td><?php echo $historique_item['old_value']; ?></td>
            <td><?php echo $historique_item['new_value']; ?></td>
            <td><?php echo $historique_item['date_modif']; ?></td>
            <td><?php echo $historique_item['libelle']; ?></td>
            <td><?php echo $historique_item['id_user']; ?></td>
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
