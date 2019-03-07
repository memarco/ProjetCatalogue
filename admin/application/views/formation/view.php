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
                   <!-- <dt>Niveau :</dt>
                    <dd><?php echo $formation_item['niveau']; ?></dd> <br>-->
                    <dt>Type de formation :</dt>
                    <dd><?php for($i=0;$i<count($nom_typ);$i++){ echo $nom_typ[$i]['nom_type']." <br/>";}; ?></dd> <br>
                    <dt>Composante :</dt>
                    <dd><?php echo $formation_item['nom_c']; ?></dd> <br>
                    <dt>Site :</dt>
                    <dd><?php echo $formation_item['nom_site']; ?></dd> <br>
                    <dt>Détail stage :</dt>
                    <dd><?php echo $formation_item['detail_stage']; ?></dd> <br>

                </dl>

                    <?php
                        if(($formation_item['id']-1)!=0){
                        $prev=$formation_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('formation/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';}
                        if($formation_item['id']!=$total_formation){
                        $next=$formation_item['id']+1;
                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('formation/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


