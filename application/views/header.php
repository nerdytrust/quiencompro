<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<title><?=$titlepage?></title>

	<base href="<?=base_url();?>">
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>

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
			<li class="logo">
				<!--<img src="images/quienc_small_logo.png" alt="">-->
				<h1><span class="title1-1">¿Quién</span> <span class="title1-2">Compró?</span><h1>
			</li>
			
				<li class="divider"></li>
					
				<li class="socialitem" ><a href="#"><img src="images/icons/facebook-256.png" width="45" alt="" margin="10"></a></li>
				<li class="socialitem"><a href="#"><img src="images/icons/twitter-256.png" width="45" alt=""></a></li>
				<li class="socialitem"><a href="#"><img src="images/icons/youtube-256.png" width="45" alt=""></a></li>
				<li class="socialitem"><a href="#"><img src="images/icons/googleplus-256.png" width="45" alt=""></a></li>
					
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