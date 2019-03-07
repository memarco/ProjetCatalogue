 
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
                <br/>
                <dl class="dl-horizontal" style="font-size: medium; ">
                    <dt>Domaine :</dt>
                    <dd><?php echo $domaine_item['nom'].'</b>'; ?></dd> <br>
                    <dt>Libellé :</dt>
                    <dd><?php echo $domaine_item['nom']; ?></dd>  <br>

                </dl>
                        <?php
                        if(($domaine_item['id']-1)!=0){
                        $prev=$domaine_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('domaine/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';
                        //echo $total_domaine;
                        }
                        if($domaine_item['id']!=$total_domaine){
                        $next=$domaine_item['id']+1;

                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('domaine/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>


             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
