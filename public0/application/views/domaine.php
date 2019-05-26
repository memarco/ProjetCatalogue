<?php $this->load->view('_partials/navbar'); ?>
<div class="container">
    <div  style="border: solid 1px #c1002a; height: auto">

        <div class="row" >
          <div class="col-md-12" style="padding-left: 45px; padding-right: 45px">
              <h2>Domaines d'études</h2>

              <div class="text-center lead medium" >
                  <div class="color-swatches">
                    <?php
                    $style=  array(1 => 'primary', 'success', 'info', 'warning', 'danger');
                     $i = 0;
                     foreach ($domaine as $domaine_item):
                          $i++;
                       ?>

                              <div class="color-swatch brand-<?php echo $style[$i] ?>"><span style="width:100%; /* largeur de la zone de texte */
                                padding:10px; /* aération interne de la zone de texte */
                                vertical-align:middle;
                                display:inline-block;
                                line-height:1.2; /* on rétablit le line-height */ "><a href="#">
                                <?php echo $domaine_item['nom'];?></a></span>
                              </div>
                    <?php endforeach; ?>
              </div>
              </div>
          </div>

        </div>

    </div>
</div>
<?php include '_base/foot.php'; ?>
