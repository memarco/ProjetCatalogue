<?php $this->load->view('templates/header') ?>

<div class="container"> 
<?php include 'templates/menu_top.php' ?>
<div class="row">
<!-- menuleft-->
<?php include 'templates/menu_left.php' ?>
<!--endmenuleft-->

<!--maincontent-->        
<?php $this->load->view('templates/main_head') ?> 
<h2>CATALOGUE DES STAGES ET ALTERNANCES</h2> </div>
          <div class="panel-body" style="margin:20px"> 
                <p class="lead text-justify">Le catalogue des stages est un outil à destination des professionnels qui souhaitent accueillir un stagiaire ou un alternant dans leurs établissements.

                    Il a pour vocation de faire connaître les formations de l’Université comportant un stage dans leur cursus par le biais des compétences associées aux formations. </p>
            </div>
        </div>
</div>
<!--endmaincontent-->
</div>
 
 
<?php $this->load->view('templates/footer') ?>