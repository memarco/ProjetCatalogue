<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>.:: SCUIO-BAIP - Catalogue en ligne ::.</title>
  <meta name="description" content="">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.7/css/bootstrap-theme.min.css">
  <link href="<?php echo base_url();?>assets/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
    body{margin-top:50px;}
.glyphicon { margin-right:10px; }
.panel-body { padding:0px; }
.panel-body table tr td { padding-left: 15px }
.panel-body .table {margin-bottom: 0px; }
  </style>
  <!--<link rel="stylesheet" href="<?php /*echo base_url();*/?>/assets/css/bootstrap-responsive.min.css">-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



<script type="text/javascript">
$(function () {
    $("#btnPrint").click(function () {
        var contents = $("#container").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>Document</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="<?php echo base_url();?>assets/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"  rel="stylesheet">/>');
        frameDoc.document.write('<link href="<?php echo base_url();?>assets/bootstrap-3.3.7/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"  rel="stylesheet">/>');
        frameDoc.document.write('<link href="<?php echo base_url();?>assets/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet" type="text/css"  rel="stylesheet">/>');
        frameDoc.document.write('<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css" />');
        frameDoc.document.write('<link href="<?php echo base_url();?>assets/bootstrap/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });
});
</script>


</head>
<body onload="">
<div class="container" style="padding-top:15px;">
<span style="float:right">
        <button type="button" class="btn btn-default btn-sm" id="btnPrint">
          <span class="glyphicon glyphicon-print"></span> Imprimer
        </button>
</span>
</div>
