<table  id="listResult" class="table table-bordered" style="font-size: 11px; vertical-align: middle"> 
    <thead>
				<tr>
					<th>Nbre Modifs</th> 
					<th>Mention</th>   
					<th>Parcours/Filière</th>
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
            <td <?php if ($formation_item['nbre_modif']>0) {
                echo 'style="background-color: green; color:#fff; vertical-align:middle; text-algin:center"';
            }?>><?php echo $formation_item['nbre_modif']; ?></td>  
            <td><?php echo $formation_item['libelle']; ?></td>  
            <td><?php echo $formation_item['nom_f']; ?></td>
            <td><?php echo $formation_item['nom_do']; ?></td>
            <td><?php echo $formation_item['nom_typ']; ?></td>
            <td><?php echo $formation_item['nom_d']; ?></td>
            <td><?php echo $formation_item['nom_c']; ?></td>
            <td><?php echo $formation_item['nom_site']; ?></td>
            <td>
                <a title="Afficher" href="<?php echo site_url('formation/'.$formation_item['id']); ?>"><p class="glyphicon glyphicon-search
                                                                                                          text-success" aria-hidden="true"></p></a> | 
                <a title="Modifier" href="<?php echo site_url('formation/edit/'.$formation_item['id']); ?>"> <p class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></p></a> | 
                <a title="Supprimer" href="<?php echo site_url('formation/delete/'.$formation_item['id']); ?>" onClick="return confirm('Êtes-vous sûre de vouloir supprimer ?')">
                    <p class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></p></a>
            </td>
        </tr>
<?php endforeach; ?>
</table>