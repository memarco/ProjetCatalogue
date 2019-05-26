<?php $this->load->view('_partials/navbar'); ?>
<div class="container">
    <div  style="border: solid 1px #c1002a; height: auto">

        <div class="row" >
          <div class="col-md-12" style="padding-left: 45px; padding-right: 45px">
              <h2>Les composantes de l'UPEC</h2>
                    <?php
                     foreach ($domaine as $domaine_item):
                       ?>
                       <div class="bs-callout bs-callout-info" id="callout-helper-context-color-specificity">
                         <h4><?php echo $domaine_item['nom'], ' (',$domaine_item['sigle'],')';?></h4>
                         <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo $domaine_item['mail1'];?><?php echo ' | ', $domaine_item['mail2'];?>
                       </div>

                    <?php endforeach; ?>

              </div>
          </div>


        </div>

</div>
<?php include '_base/foot.php'; ?>
