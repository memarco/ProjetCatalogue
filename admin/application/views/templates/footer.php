
<div class="footer">
	<div class="container"  style="margin-top: 5px; border-top: solid 2px #ccc;padding-top: 3px">
			<p class="pull-right text-muted">
				SCUIO-BAIP -  <strong>UPEC</strong>
			</p>
		<p class="text-muted">&copy; <strong><?php echo date('Y'); ?></strong> Tout droit reservé.</p>
	</div>
</div><!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php //echo base_url();?>/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<script src="<?php //echo base_url();?>/assets/js/vendor/bootstrap.min.js"></script>

<script src="<?php //echo base_url();?>/assets/js/main.js"></script>-->
<script>
$(function() {
        $('#entrepselector').change(function(){
            $('.choix').hide();
            $('#' + $(this).val()).show();
        });
    });
function openSearch(){
    if(document.getElementById("chevron").className == "glyphicon glyphicon-chevron-down"){
        document.getElementById("chevron").className = "glyphicon glyphicon-chevron-up";
                $('#search_form').show();
    }else{
        document.getElementById("chevron").className = "glyphicon glyphicon-chevron-down";
                $('#search_form').hide();
    }

}
</script>
</body>
</html>
