<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<base href="<?=base_url();?>">
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<title><?=$titlepage?></title>

	
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.form.min.js"></script>
	<script src="<?php echo base_url(); ?>js/global.js"></script>
	<link rel="stylesheet" href="css/kube.css">
	<script src="js/kube.js"></script>

	<link rel="stylesheet" href="css/global.css">
	<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
</head>
<body>
	
<header>
	<nav class="navbar navigation-fixed">
		<ul>
			<li class="menu"><a href="#"><img src="images/icons/glyphicons_113_justify.png" alt=""></a>
				<ul>
					<li>Facturas</li>
					<li>Notas</li>
				</ul>
			</li>
			<li class="logo" style="margin:0;">
				<a href="<?=base_url()?>"><img src="images/QC.png" alt="¿ Quien Compro ?" ></a>
				<!-- <h1><span class="title1-1">¿Quién</span> <span class="title1-2">Compró?</span><h1> -->
			</li>
			
				<li class="divider"></li>
					
				<li class="socialitem" ><a href="https://www.facebook.com/pages/Qui%C3%A9n-compr%C3%B3/1494986697404675?ref=hl"><img src="images/icons/facebook-256.png" width="45" alt="" margin="10"></a></li>
				<li class="socialitem"><a href="https://twitter.com/QuienCompro"><img src="images/icons/twitter-256.png" width="45" alt=""></a></li>
				<li class="socialitem"><a href="https://www.youtube.com/channel/UC4VH5HkzrRMUYtas7xsEYEw"><img src="images/icons/youtube-256.png" width="45" alt=""></a></li>
				<li class="socialitem"><a href="https://plus.google.com/u/0/112929316167806049590/posts"><img src="images/icons/googleplus-256.png" width="45" alt=""></a></li>
					
		</ul>
	</nav>
</header>

<script>
	$("header nav .menu > a").click(function(){
		if($("header nav .menu > ul").is(":visible"))
			$("header nav .menu > ul").slideUp();
		else
			$("header nav .menu > ul").slideDown();
	});
</script>