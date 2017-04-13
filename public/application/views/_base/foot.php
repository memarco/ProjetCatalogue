<div class="footer" style="margin-top: 5px">
	<div class="container"> 
			<p class="pull-right text-muted"> 
				Elapsed Time: <strong>{elapsed_time}</strong> seconds, 
				Memory Usage: <strong>{memory_usage}</strong>
			</p> 
		<p class="text-muted">&copy; <strong><?php echo date('Y'); ?></strong> Tout droit reservé.</p>
	</div>
</div>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
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
</script>
</body>
</html>
