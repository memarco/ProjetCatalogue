<?php $this->load->view('templates/header') ?>

<div class="container"> 
<?php $this->load->view('templates/menu_top') ?>  
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>   
<!--endmenuleft-->

<!--maincontent-->        
<?php $this->load->view('templates/main_head') ?> 
               
              <p><a class="btn btn-primary" href="<?php echo site_url('type_formation/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a></p> 
<table  class="table table-bordered"> 
    <thead>
				<tr>
					<th>Nom</th>  
					<th>Action</th>
				</tr>
			</thead>
    
<?php foreach ($type_formation as $type_formation_item): ?>
        <tr>
            <td><?php echo $type_formation_item['nom']; ?></td> 
            <td>
                <a title="Afficher" href="<?php echo site_url('type_formation/'.$type_formation_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> | 
                <a title="Modifier" href="<?php echo site_url('type_formation/edit/'.$type_formation_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> | 
                <a title="Supprimer" href="<?php echo site_url('type_formation/delete/'.$type_formation_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
            </td>
        </tr>
<?php endforeach; ?>
</table>           
          </div>
        </div>

</div>
<!--endmaincontent-->
</div>
 
 
<?php $this->load->view('templates/footer') ?>   


