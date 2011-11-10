<!DOCTYPE html>
<html lang="en">
	<head>
    
        <title>Peruvian Sweaters</title>
        
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Christian Ramón @cramonn" />
		<meta name="robots" content="all ,follow, index" />
		<meta name="generator" content="Sublime Text 2" />		
		<link href='http://fonts.googleapis.com/css?family=Fjord+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url() ?>application/site_media/css/css.css" type="text/css" charset="utf-8" media="screen"/>	
	
       	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js" type="text/javascript"></script>-->
		<script src="<?php echo base_url() ?>application/site_media/js/mainscript.js"></script>

		
	</head>

	<body>
        <header>
        	<div id="sesion">
	        	<?php if($this->session->userdata('is_logged')) {?>
	        	<?php $username = $this->session->userdata('username') ?>
	        	<?php echo $username ?> | 
	        	<?php echo anchor('user/logout', 'Salir') ?>
	        	<?php } ?>
        	</div>
        	
            <h1>Peruvian Sweaters</h1>            
        </header>