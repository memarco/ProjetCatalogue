<!DOCTYPE html>
<html>
<head>
	<title>Import Data From Excel</title>
</head>
<body>
	<?php echo form_open_multipart('composante/upload'); ?>
		<input type="file" name="file"/>
    	<input type="submit" value="Upload file"/>
	</form>
</body>
</html>