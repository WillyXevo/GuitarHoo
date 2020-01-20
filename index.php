<?php

//require('curl/simplehtmldom/simple_html_dom.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: x-access-header, Authorization, Origin, X-Requested-With, Content-Type, Accept");

include "curl/function.php";
require('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GuitarHoo</title>
	<link rel="shortcut icon" href="assets/img/GuitarHoo_Logo.png" type="image/x-icon"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
    <script src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<div class="nav-overlay"></div>
	<nav class="navbar navbar-inverse navbar-main">
  		<div class="container-fluid">
	    	<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		     	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse-left" data-target="#menu-left">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
		    </div>
	  	</div><!-- /.container-fluid -->
		
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="navbar-left-collapse" id="menu-left">
	      	<div class="container">
	      		<div class="img-nav">
					<img src="assets/img/GuitarHoo_Logo.png" alt="logo" class="img-responsive">
	      		</div>
		      	<ul class="nav navbar-nav">
		      		<?php
		      			if(isset($_GET['p'])){
		      				$mp = $_GET['p'];
		      				${$mp.'_menu'} = 'active'; 
						}else{
							$home_menu = 'active';		
						}
		      		?>
			        <li class="<?= isset($home_menu)?$home_menu:''; ?>"><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>
			        <li class="<?= isset($artist_menu)?$artist_menu:''; ?>"><a href="index.php?p=artist"> <i class="fa fa-user"></i> Artist </a></li>
			        <li class="<?= isset($chord_menu)?$chord_menu:''; ?>"><a href="index.php?p=chord"> <i class="fa fa-music"></i> Chord </a></li>
		      	</ul>
	      	</div>
    	</div><!-- /.navbar-collapse -->
	</nav>


	
	<div class="container-fluid body-main" id="body-main">
		<?php
			$d = "pages";
			$file = scandir("$d");

			unset($file[0], $file[1]);
			if(isset($_GET['p'])){
				$pa = $_GET['p'].".php";
				$p = $d."/".$_GET['p'].".php";
				if(in_array($pa, $file)){
					include $p;
				}else{
					echo "404 not found! $p";
				}
			}else{
				include "$d/home.php";
			}
		?>
	</div>
	<footer>
		<div class="container">
			&copy; 2020 GuitarHoo
		</div>
	</footer>
	<div class="toast">
		<div class="toast_msg">
			<p>Ini Toast</p>
		</div>
	</div>
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
			$(".navbar-toggle").click(function(){
				$(".nav-overlay").show(10, function(){
					$(".navbar-left-collapse").css('left', 0);
				});
			});
			$(".nav-overlay").click(function(){
				$(".nav-overlay").hide(10, function(){
					$(".navbar-left-collapse").css('left', '-285px');
				});
			});
	    });

	    setTimeout(function(){
	    	$(".toast").hide();
	    }, 3000);
	    
	    function show_toast(msg){
	    	$(".toast_msg").html("<p>"+msg+"</p>");
	    	$(".toast").show();
	    	setTimeout(function(){
		    	$(".toast").hide();
		    }, 3000);
	    }

	    $(function() {
	    	$(window).bind("load resize", function() {
	            var height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
	            var hcont = height - ($(".navbar-main").height() + $("footer").height() + 23);
	            //console.log(hcont);
	            $("#body-main").css("min-height", hcont+"px");
	            /*
	            var height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
	            var hcont = $(".navbar-main").height() + $(".body-main").height() + $("footer").height() + 20;
	            var mt = height-hcont;
	            console.log(height);
	    		console.log(hcont);
	    		console.log(mt);

	    		$("footer").css("margin-top", mt+"px");*/

	    	});
    	});
	</script>
</body>
</html>
