<?php $this->load->view('templates/header') ?>

<div class="container"> 
    <?php $this->load->view('templates/menu_top') ?>  
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>   
        <!--endmenuleft-->

        <!--maincontent-->        
        <div class="col-sm-9 col-md-9"> 
            <div style="margin: 20px; min-height: 500px;"> 
                <div class="title"><h4>Détail de la formation</h4> </div>
                <div class="title" style="float:right"><a href="<?php echo site_url('formation/'); ?>"> .: Retour :.</a> </div>
                <dl class="dl-horizontal" style="font-size: medium; "> 
                    <dt>Mention :</dt> 
                    <dd><?php echo '<b>'.$formation_item['libelle'].'</b>'; ?></dd> <br>
                    <dt>Domaine :</dt> 
                    <dd><?php echo $formation_item['nom_do']; ?></dd>  <br>
                    <dt>Filière :</dt> 
                    <dd><?php echo $formation_item['nom_f']; ?></dd> <br>
                    <dt>Diplôme préparé :</dt> 
                    <dd><?php echo $formation_item['nom_d']; ?></dd> <br>
                    <dt>Niveau :</dt> 
                    <dd><?php echo $formation_item['niveau']; ?></dd> <br>
                    <dt>Type de formation :</dt> 
                    <dd><?php echo $formation_item['nom_typ']; ?></dd> <br>
                    <dt>Composante :</dt> 
                    <dd><?php echo $formation_item['nom_c']; ?></dd> <br>
                    <dt>Site :</dt> 
                    <dd><?php echo $formation_item['nom_site']; ?></dd> <br>
                    <dt>Détail stage :</dt> 
                    <dd><?php echo $formation_item['detail_s']; ?></dd> <br>
                     
                </dl>
                    <div style="float: left"> 
                        <?php $prev=$formation_item['id']-1;
                        $next=$formation_item['id']+1; ?>
                        <a class="btn btn-info" href="<?php echo site_url('formation/'.$prev); ?>" role="button"><&LT; Précédente </a>
             </div>
                    <div style="float:right"> 
		<a class="btn btn-info" href="<?php echo site_url('formation/'.$next); ?>" role="button">Suivante >></a>
             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>   


