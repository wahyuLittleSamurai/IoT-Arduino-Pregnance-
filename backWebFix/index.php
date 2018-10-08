<?php
	session_start();
	include "connect.php";
	if(!empty($_GET["logout"]) )
	{
		if($_GET["logout"] == "q")
		{
			session_destroy();
		}
	}
?>

<html>
	<head>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src = "js/jquery-3.1.1.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
		<script type="text/javascript">
			

		</script>
		<style>
		@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500);
			#sg-carousel {
				position: relative;
				height: 100vh;
			}
			#sg-carousel .carousel-inner .item {
				height: 100vh;
			}
			.carousel-caption{top:25%;}
			.carousel-caption h1 {
				font-size: 6em;
				font-weight: bold;
				margin: 0;
				padding: 0;
			}
			#sg-carousel .carousel-control.left {
				top: 48%;
			}
			#sg-carousel .carousel-control.right {
				top: 48%;
			}
			.uppr-txt {
				text-transform: uppercase;
				color: #fff;
				font-size: 35px;
			}
			#sg-carousel .carousel-control.left,
			#sg-carousel .carousel-control.right {
				background-image: none;
				background-repeat: no-repeat;
				opacity: 0;
				text-shadow: none;
				transition: all 0.8s ease 0s;
			}
			.carousel-control {
				bottom: 0;
				color: #fff;
				font-size: 20px;
				left: 0;
				opacity: 0;
				position: absolute;
				text-align: center;
				text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
				top: 0;
				width: auto;
				transition: all 0.8s ease 0s;
			}
			.carousel-inner {
				box-shadow: 2px 6px 21px;
			}
			.fa-angle-right,
			.fa-angle-left {
				font-size: 80px;
			}
			#sg-carousel:hover .carousel-control.left {
				left: 38px;
				transition: all .2s ease 0;
			}
			#sg-carousel:hover .carousel-control.right {
				right: 38px;
				transition: all .2s ease 0;
			}
			#sg-carousel:hover .carousel-control.left,
			#sg-carousel:hover .carousel-control.right {
				opacity: 1;
			}
			.carousel-inner > .item > a > img,
			.carousel-inner > .item > img,
			.img-responsive,
			.thumbnail a > img,
			.thumbnail > img {
				display: block;
				height: 98%;
				max-width: 100%;
				width: 100%;
			}
			.item.active img {
				transition: transform 5000ms linear 0s;
				transform: scale(1.05, 1.05);
			}
			.carousel-fade .carousel-inner .active {
				opacity: 1;
			}
			.carousel-fade .carousel-inner .next.left,
			.carousel-fade .carousel-inner .prev.right {
				opacity: 1;
			}
			.carousel-fade .carousel-control {
				z-index: 2;
				font-size: 80px;
			}
			.carousel-caption {
				left: 25%;
				padding-bottom: 5%;
				right: 0;
				text-align: center;
			}

			.carousel-caption h1 {
				font-family: 'Roboto', sans-serif;
				font-size: 100px;
				font-weight: 600;
				line-height: 18px;
				color: #ffff;
			}
			.carousel-caption > p {
				font-size: 35px;
				color: #ffff;
			}
			.carousel-caption > a {
				text-transform: uppercase;
				color: #ffff;
				background: #ffff;
				padding: 6px 12px;
			}
			.button--tamaya {
				border: 2px solid #ef5902 !important;
				border-radius: 0px;
				color: #7986cb;
				min-width: 0px;
				overflow: hidden;
				text-transform: uppercase;
				letter-spacing: 1px;
				left: 30.5%;
			}
			.button--border-thick {
				border: 3px solid;
			}
			.button {
				background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
				border: medium none;
				color: inherit;
				display: block;
				float: left;
				max-width: 230px;
				min-width: 0px;
				padding: 1em 4em;
				position: relative;
				vertical-align: middle;
				z-index: 1;
			}
			.button--tamaya::before {
				padding-top: 1em;
				top: 0;
			}
			.button--tamaya::before,
			.button--tamaya::after {
				background: #ef5902;
				color: #fff;
				content: attr(data-text);
				height: 50%;
				left: 0;
				overflow: hidden;
				position: absolute;
				transition: transform 0.3s cubic-bezier(0.2, 1, 0.3, 1) 0s;
				width: 100%;
			}
			.button--tamaya::after {
				bottom: 0;
				line-height: 0;
			}
			.button--tamaya:hover::before {
				transform: translate3d(0px, -100%, 0px);
			}
			.button--tamaya:hover::after {
				transform: translate3d(0px, 100%, 0px);
				color: #ef5902;
			}
			.button--tamaya:hover {
				color: #ef5902;
				font-weight: 600;
			}
			.carousel-indicators li {
				background-color: #b3b5b9;
				border-radius: 10px;
				cursor: pointer;
				display: inline-block;
				height: 12px;
				margin: 1px;
				text-indent: -999px;
				width: 12px;
				border: 0;
			}
			.carousel-indicators .active {
				background-color: #041132;
				height: 12px;
				margin: 0;
				width: 12px;
				border: 0;
			}
			#sg-carousel h1 {
				animation-delay: 1s;
				margin-bottom:25px;
			}
			#sg-carousel p {
				animation-delay: 2s;
			}
			#sg-carousel button {
				animation-delay: 3s;
				margin-top:25px;
			}
			@media all and (transform-3d),
			(-webkit-transform-3d) {
				.carousel-fade .carousel-inner > .item.next,
				.carousel-fade .carousel-inner > .item.active.right {
					opacity: 0;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
				.carousel-fade .carousel-inner > .item.prev,
				.carousel-fade .carousel-inner > .item.active.left {
					opacity: 0;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
				.carousel-fade .carousel-inner > .item.next.left,
				.carousel-fade .carousel-inner > .item.prev.right,
				.carousel-fade .carousel-inner > .item.active {
					opacity: 1;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
			}
		</style>

	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div id="sg-carousel" class="carousel slide carousel-fade" data-ride="carousel">
					
					<!-- Carousel items -->
					<div class="carousel-inner carousel-zoom">
						<div class="item active"><img class="img-responsive" src="images/Untitled design.png" alt="">
						  <div class="carousel-caption">
							<h1  data-animation="animated zoomInLeft" class="cap-txt ">-YUK-</h1>
							<p data-animation="animated bounceInDown">Sehatkan BUMIL!</p>
							<p data-animation="animated bounceInDown">Ibu sehat, generasi hebat</p>
							<div><span ><a style="color: #fff;" href="index.php">Home</a></span>
                			    || <span ><a style="color: #fff;" href="formDataBumil.php">Data BUMIL</a></span> ||
								<span ><a style="color: #fff;" href="formDataPengukuran.php">Data Pengukuran</a></span> ||
								<span ><a style="color: #fff;" href="tableRfidUkurBaru.php">Data Baru Masuk Pengukuran</a></span> ||
								<span ><a style="color: #fff;" href="uploadexcel.php">Upload</a></span> ||
                			    <?php
                
                			        if(!empty($_SESSION["admin"]))
                
                			        {
                			            ?>
                			            <span ><a style="color: #fff;" href="index.php?logout=q">Logout</a></span>
                
                			            <?php
                			        }
                
                			        else
                
                			        {
                			            ?>
                			            <span ><a style="color: #fff;" href="login.php">Login</a></span>
                			            <?php
                			        }
                			    ?>
                			</div>
						
							<button onclick="window.location.href='formRegister.php'" data-animation="animated bounceInUp" class="button button--tamaya button--border-thick" data-text="Daftar"><span>Daftar</span></button>
							<button onclick="window.location.href='formPengukuran.php'" data-animation="animated bounceInUp" class="button button--tamaya button--border-thick" data-text="Pengukuran"><span>Pengukuran</span></button>
							
							
						  </div>
						</div>
					  
					
				</div> 
			</div>
		</div>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
