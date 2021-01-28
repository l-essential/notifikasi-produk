<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta charset="utf-8" />
   <title>PT. L'ESSENTIAL</title>
   <meta name="description" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
   <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fusioncharts/assets/style.css" /> -->
    <!-- highcharts -->
   <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
   <script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
   <script src="<?php echo base_url(); ?>assets/highcharts/modules/data.js"></script>
   <script src="<?php echo base_url(); ?>assets/highcharts/modules/drilldown.js"></script>
   <!-- bootstrap & fontawesome -->   
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/font-awesome/4.2.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-select/main.min.css">

   <!-- text fonts -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/fonts/fonts.googleapis.com.css" />
   <!-- fullcalendar -->
   <link href='<?php echo base_url(); ?>assets/css/fullcalendar.min.css' rel='stylesheet' />
   <link href='<?php echo base_url(); ?>assets/fullcalendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
   <link href="<?php echo base_url(); ?>assets/fullcalendar/css/bootstrapValidator.min.css" rel="stylesheet" />
   <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/css/bootstrap-colorpicker.min.css" /> -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/css/bootstrap-timepicker.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/css/tooltip.css" > 
   <!-- ace styles -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/chosen.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/jquery-ui.custom.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/parsley/src/parsley.css" > 
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/jquery-ui.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/jquery-ui.custom.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/datepicker.min.css" />
   <link href="<?= base_url()?>assets/vendor/dist/css/select2.min.css" rel="stylesheet" />
   
   <!-- ace settings handler -->
   <link rel="stylesheet" href="<?php echo base_url('assets/css/merah.css')?>"> 
   <script src="<?php echo base_url(); ?>assets/template/js/ace-extra.min.js"></script>
   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/icon.png">
   <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-select-ajax/dist/css/ajax-bootstrap-select.min.css" rel="stylesheet">
   <script src="<?php echo base_url(); ?>assets/template/js/jquery.2.1.1.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/template/js/chosen.jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap-select-ajax/dist/js/ajax-bootstrap-select.min.js"></script> 
   <script src="<?php echo base_url(); ?>assets/js/jquery.chained.js"></script>
 <script type="text/javascript">
 	window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/template/js/jquery.min.js'>"+"<"+"/script>");
 </script>
 <script type="text/javascript">
 if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/template/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
 </script>
</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>