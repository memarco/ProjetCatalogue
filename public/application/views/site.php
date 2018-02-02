<?php $this->load->view('_partials/navbar'); ?>
<div class="container">
    <div  style="border: solid 1px #c1002a; height: auto">

        <div class="row" >
          <div class="col-md-12" style="padding-left: 45px; padding-right: 45px">
              <h2>Les sites de l'UPEC</h2>
                    <?php
                     foreach ($domaine as $domaine_item):
                       ?>
                       <div class="bs-callout bs-callout-info" id="callout-helper-context-color-specificity">
                         <h4><?php echo $domaine_item['nom'];?></h4>
                         <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                         <?php echo $domaine_item['adresse'];?><?php echo ' | ', $domaine_item['cp_site'], ' - ', $domaine_item['ville'];?>
                       </div>

                    <?php endforeach; ?>

              </div>
          </div>


        </div>

</div>
<?php include '_base/foot.php'; ?>
