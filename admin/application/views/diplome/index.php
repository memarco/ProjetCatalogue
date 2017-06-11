<?php $this->load->view('templates/header') ?>

<div class="container"> 
<?php $this->load->view('templates/menu_top') ?>  
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>   
<!--endmenuleft-->

<!--maincontent-->        
<?php $this->load->view('templates/main_head') ?> 
               
              <p><a class="btn btn-primary" href="<?php echo site_url('diplome/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a></p>
                      <span style="float:right; font-weight: ">Nombre de diplome : <?php echo $total_diplome;  ?></span></p>
<table  class="table table-bordered"> 
    <thead>
				<tr>
					<th>Noms</th>  
					<th>Niveaux</th>  
					<th>Action</th>
				</tr>
			</thead>
    
<?php foreach ($diplome as $diplome_item): ?>
        <tr>
            <td><?php echo $diplome_item['nom']; ?></td> 
            <td><?php echo $diplome_item['nom_niveau']; ?></td> 
            <td>
                <a title="Afficher" href="<?php echo site_url('diplome/'.$diplome_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> | 
                <a title="Modifier" href="<?php echo site_url('diplome/edit/'.$diplome_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> | 
                <a title="Supprimer" href="<?php echo site_url('diplome/delete/'.$diplome_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
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


