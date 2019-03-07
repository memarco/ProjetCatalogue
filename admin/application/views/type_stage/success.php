<div class="container"> 
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>
<!--endmenuleft-->
<style>
#success{
    position: fixed;
    /* center the element */
    right: 0;
    left: 20px;
    margin-right: auto;
    margin-left: auto;
    /* give it dimensions */
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 10px;
    width: 30%;
    height: auto;
	text-align:center;
}
</style>
<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>
              <div class="col-sm-9 col-md-6">
		<span id="success" >Enregistrement effecuté avec succès !</span>
              </div>
              <div class="col-sm-9 col-md-6" style="text-align:right">
		<a class="btn btn-info" href="<?php echo site_url('type_stage/'); ?>" role="button">Continuer >></a>
             </div>

	<br><br>

          </div>
        </div>

</div>
<!--endmaincontent-->
</div>


<?php $this->load->view('templates/footer') ?>
