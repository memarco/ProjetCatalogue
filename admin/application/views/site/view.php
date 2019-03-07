 
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <div class="col-sm-9 col-md-9">
            <div style="margin: 20px; min-height: 500px;">

                <div class="title"><h4>Détail du site</h4> </div>

                <div class="title" style="float:right"><a href="<?php echo site_url('site/'); ?>"> .: Retour :.</a> </div>
                <br/>
                <dl class="dl-horizontal" style="font-size: medium; ">
                    <dt>Libellé :</dt>
                    <dd><?php echo $site_item['nom'].'</b>'; ?></dd> <br>
                    <dt>Adresse:</dt>
                    <dd><?php echo $site_item['adresse']; ?></dd>  <br>
                     <dt>Code Postal:</dt>
                    <dd><?php echo $site_item['cp_site']; ?></dd>  <br>

                </dl>
                        <?php
                        if(($site_item['id']-1)!=0){
                        $prev=$site_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('site/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';
                        //echo $total_site;
                        }
                        if($site_item['id']!=$total_site){
                        $next=$site_item['id']+1;

                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('site/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>


             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
