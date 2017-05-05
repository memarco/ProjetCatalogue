<?php $this->load->view('templates/header') ?>

<div class="container"> 
<?php $this->load->view('templates/menu_top') ?>  
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>   
<!--endmenuleft-->

<!--maincontent-->        
<?php $this->load->view('templates/main_head') ?>   
               
              <p><a class="btn btn-primary" href="<?php echo site_url('formation/create'); ?>">AJOUTER &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a></p> 
              <div class="table-responsive">
              <table  class="table table-bordered" style="font-size: 11px;"> 
    <thead>
				<tr>
					<th>Mention</th>  
					<th>Niveau</th>
					<th>Filière</th>
					<th>Domaine d'étude</th>
					<th>Type formation</th>
					<th>Diplôme préparé</th>
					<th>Composante</th>
					<th>Site</th>
					<th>Action</th>
				</tr>
			</thead>
    
<?php foreach ($formation as $formation_item): ?>
        <tr>
            <td><?php echo $formation_item['mention']; ?></td> 
            <td><?php echo $formation_item['niveau']; ?></td>
            <td><?php echo $formation_item['nom_f']; ?></td>
            <td><?php echo $formation_item['nom_do']; ?></td>
            <td><?php echo $formation_item['nom_typ']; ?></td>
            <td><?php echo $formation_item['nom_d']; ?></td>
            <td><?php echo $formation_item['nom_c']; ?></td>
            <td><?php echo $formation_item['nom_site']; ?></td>
            <td>
                <a title="Afficher" href="<?php echo site_url('formation/'.$formation_item['id']); ?>"><span class="glyphicon glyphicon-align-justify text-success" aria-hidden="true"></span></a> | 
                <a title="Modifier" href="<?php echo site_url('formation/edit/'.$formation_item['id']); ?>"> <span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span></a> | 
                <a title="Supprimer" href="<?php echo site_url('formation/delete/'.$formation_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a>
            </td>
        </tr>
<?php endforeach; ?>
</table>           
         
              </div>
            </div>
        </div>

</div>
<!--endmaincontent-->
</div>
 
 
<?php $this->load->view('templates/footer') ?>   


