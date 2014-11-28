<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Plataforma de periodismo de datos para transparentar el uso del dinero público en el Congreso de México">
	<base href="<?=base_url();?>">
	
	<link rel="shortcut icon" href="<?=base_url();?>images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=base_url();?>images/favicon.ico" type="image/x-icon">

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


	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-56506246-1', 'auto');
	  ga('send', 'pageview');
	</script>


	<?php
		$img = base_url().'images/QC.png';
		$title = $titlepage; 
		$desc  = 'Plataforma de periodismo de datos para transparentar el uso del dinero público en el Congreso de México';
		$url = "http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		if(isset($nota))
		{
			$nota= $nota[0];
			$img  = base_url().$nota['featured_image'];
			$title = $nota['title'];
			$desc = $nota['description'];
		}
	?>
	
	<meta property="og:url"   content="<?=$url?>">
	<meta property="og:title" content="<?=$title?>">
	<meta property="og:site_name" content="¿Quién Compró?"/>
	<meta property="og:description" content="<?=$desc?>">
	<meta property="og:image" content="<?=$img?>">


</head>

<body>
	
<header>
	<nav class="navbar navigation-fixed">
		<ul style="height: 5em;">
			<li class="menu"><a href="javascript:;"><img src="images/icons/glyphicons_113_justify.png" alt="Menu"></a>
				<ul>
					<li><a style="color:#fff;" href="<?=base_url()?>facturas">Facturas</a></li>
					<li><a style="color:#fff;" href="<?=base_url()?>notas">Notas</a></li>
				</ul>
			</li>
			<li class="logo">
				<a href="<?=base_url()?>"><img src="images/QC.png" alt="¿ Quien Compro ?"></a>
				<!-- <h1><span class="title1-1">¿Quién</span> <span class="title1-2">Compró?</span><h1> -->
			</li>
			
				<li class="divider"></li>
				
	   		     
	   		   		<li class="socialitem" ><a target="_blank" href="https://www.facebook.com/pages/Qui%C3%A9n-compr%C3%B3/1494986697404675?ref=hl"><img src="images/icons/facebook-256.png" width="45" alt="FaceBook" ></a></li>
					<li class="socialitem"><a target="_blank" href="https://twitter.com/QuienCompro"><img src="images/icons/twitter-256.png" width="45" alt="Twitter"></a></li>
					<li class="socialitem"><a target="_blank" href="https://www.youtube.com/channel/UC4VH5HkzrRMUYtas7xsEYEw"><img src="images/icons/youtube-256.png" width="45" alt="YouTube"></a></li>
					<li class="socialitem"><a target="_blank" href="https://plus.google.com/u/0/112929316167806049590/posts"><img src="images/icons/googleplus-256.png" width="45" alt="GooglePlus"></a></li>
				

		</ul>			
		
			
		<div class="units-row hiddenmobile" style="background: #333;
		color: whitesmoke;
		text-align: center;
		padding: 0.2em;
		width: 100%;">
    		Plataforma de periodismo de datos para transparentar el uso del dinero público en el Congreso de México.
    		<a style="width: 25px;display: inline;" href="https://es.scribd.com/doc/245963021/Quien-Compro" target="_blank"><img src="images/hand.png" alt="hand"></a>
		</div>
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

