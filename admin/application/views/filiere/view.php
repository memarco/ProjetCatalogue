
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <div class="col-sm-9 col-md-9">
            <div style="margin: 20px; min-height: 500px;">
                <div class="title"><h4>Détail de la filière</h4> </div>
                <div class="title" style="float:right">
                    <a href="<?php echo site_url('filiere/'); ?>"> .: Retour :.</a> </div>

 <br/>
               <dl class="dl-horizontal" style="font-size: medium; ">
                   <dt>Domaine :</dt>
                   <dd><?php echo $filiere_item['nom_d']; ?></dd>  <br>

               </dl>
                <dl class="dl-horizontal" style="font-size: medium; ">
                    <dt>Libellé :</dt>
                    <dd><?php echo $filiere_item['nom_f']; ?></dd>  <br>

                </dl>
                        <?php
                        if(($filiere_item['id']-1)!=0){
                        $prev=$filiere_item['id']-1;
                        echo '<div style="float: left"> ';
                        echo '<a class="btn btn-info" href="'.site_url('filiere/'.$prev).'" role="button"><&LT; Précédente </a>';
                        echo '</div>';
                        //echo $total_domaine;
                        }
                        if($filiere_item['id']!=$total_filiere){
                        $next=$filiere_item['id']+1;

                        echo  '<div style="float:right">';
                        echo '<a class="btn btn-info" href="'.site_url('filiere/'.$next).'" role="button">  Suivante >></a>';
                         echo '</div>';
                        }
                        ?>


             </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
