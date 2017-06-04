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
                
                <div class="title"><h4>Détail du Domaine</h4> </div>
                
                <div class="title" style="float:right"><a href="<?php echo site_url('domaine/'); ?>"> .: Retour :.</a> </div>
                
                <dl class="dl-horizontal" style="font-size: medium; "> 
                    <dt>Domaine :</dt> 
                    <dd><?php echo $domaine_item['nom'].'</b>'; ?></dd> <br>
                     
                </dl>
                    <div style="float: left"> 
                        <?php $prev=$domaine_item['id']-1;
                        $next=$domaine_item['id']+1; ?>
                        <a class="btn btn-info" href="<?php echo site_url('domaine/'.$prev); ?>" role="button"><&LT; Précédente </a>
             </div>
                    <div style="float:right"> 
		<a class="btn btn-info" href="<?php echo site_url('domaine/'.$next); ?>" role="button">Suivante >></a>
             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>   
