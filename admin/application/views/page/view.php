 
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <div class="col-sm-9 col-md-9">
            <div style="margin: 20px; min-height: 500px;">

                <div class="title"><h4>Détail du Niveau</h4> </div>

                <div class="title" style="float:right"><a href="<?php echo site_url('niveau/'); ?>"> .: Retour :.</a> </div>
                <br/>
                <dl class="dl-horizontal" style="font-size: medium; ">
                    <dt>Niveau :</dt>
                    <dd><?php echo $niveau_item['nom_niveau'].'</b>'; ?></dd> <br>

                </dl>
                        <?php
                        if(($niveau_item['id']-1)!=0){
                        $prev=$niveau_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('niveau/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';
                        //echo $total_niveau;
                        }
                        if($niveau_item['id']!=$total_niveau){
                        $next=$niveau_item['id']+1;

                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('niveau/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>


             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
