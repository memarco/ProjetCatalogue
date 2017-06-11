<?php $this->load->view('templates/header') ?>

<div class="container"> 
<?php $this->load->view('templates/menu_top') ?>  
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>   
<!--endmenuleft-->

<!--maincontent-->        
<?php $this->load->view('templates/main_head') ?> 
               
              <p><a class="btn btn-primary" href="<?php echo site_url('site/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;
                      <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a>
                      <span style="float:right; font-weight: ">Nombre de site : <?php echo $total_site;  ?></p>
<table  class="table table-bordered"> 
    <thead>
				<tr>
					<th>Nom</th> 
					<th>Adresse</th>
					<th>Code Postal & Ville</th> 
					<th>Action</th>
				</tr>
			</thead>
    
<?php foreach ($site as $site_item): ?>
        <tr>
            <td><?php echo $site_item['nom']; ?></td>
            <td><?php echo $site_item['adresse']; ?></td>
            <td><?php echo $site_item['cp_site']. '-' .$site_item['ville']; ?></td>
            <td>
                <a title="Afficher" href="<?php echo site_url('site/'.$site_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> | 
                <a title="Modifier" href="<?php echo site_url('site/edit/'.$site_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> | 
                <a title="Supprimer" href="<?php echo site_url('site/delete/'.$site_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
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


