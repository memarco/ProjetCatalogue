  <div style="float: left"> 
                        <?php $prev=$domaine_item['id']-1;
                        $next=$domaine_item['id']+1; ?>
                        <a class="btn btn-info" href="<?php echo site_url('domaine/'.$prev); ?>" role="button"><&LT; Précédente </a>
             </div>
                    <div style="float:right"> 
		<a class="btn btn-info" href="<?php echo site_url('domaine/'.$next); ?>" role="button">Suivante >></a>
             </div>