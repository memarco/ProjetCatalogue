 
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <div class="col-sm-9 col-md-9">
            <div style="margin: 20px; min-height: 500px;">
                <div class="title"><h4>Détail du diplome</h4> </div>
                <div class="title" style="float:right">
                    <a href="<?php echo site_url('diplome/'); ?>"> .: Retour :.</a> </div>

 <br/>
                <dl class="dl-horizontal" style="font-size: medium; ">
                    <dt>Libellé :</dt>
                    <dd><?php echo $diplome_item['nom']; ?></dd>  <br>

                </dl>
                        <?php
                        if(($diplome_item['id']-1)!=0){
                        $prev=$diplome_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('diplome/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';

                        }
                        if($diplome_item['id']!=$total_diplome){
                        $next=$diplome_item['id']+1;

                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('diplome/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>


             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
