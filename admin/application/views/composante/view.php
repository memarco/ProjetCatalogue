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

                <div class="title" style="float:right"><a href="<?php echo site_url('composante/'); ?>"> .: Retour :.</a> </div>
                <br/>
                <dl class="dl-horizontal" style="font-size: medium; ">
                    <dt>Libellé :</dt>
                    <dd><?php echo $composante_item['nom'].'</b>'; ?></dd> <br>
                    <dt>Mail1:</dt>
                    <dd><?php echo $composante_item['mail1']; ?></dd>  <br>
                     <dt>Sigle:</dt>
                    <dd><?php echo $composante_item['sigle']; ?></dd>  <br>

                </dl>
                        <?php
                        if(($composante_item['id']-1)!=0){
                        $prev=$composante_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('composante/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';
                        //echo $total_composante;
                        }
                        if($composante_item['id']!=$total_composante){
                        $next=$composante_item['id']+1;

                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('composante/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>


             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
