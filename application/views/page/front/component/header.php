<body>

	<!-- ////// HIDDEN PANEL VIWEABLE ONLY ON SMALLER SCREENS ////// -->
	<!--TOPBAR START-->
	<div class="topbar-hidden">
		<div class="topbar">
			<div class="container ">
				<div class="row">
					<nav>
						<ul class="nav-pills topbar-right">
							<li class="phone"><span>Call us</span> +3 8 032 654 321 98</li>
						</ul>
					</nav>

					<nav>
						<ul class="nav-pills topbar-right">

						</ul>

					</nav>

					<div class="language">
						<form class="custom">
							<div class="custom dropdown">
								<a href="#" class="current">
									<span><img src="images/lang/1.jpg" alt="" /></span><em>English</em></a>
								<a href="#" class="selector"></a>
								<ul>
									<li><span><img src="images/lang/1.jpg" alt="" /></span><em>English</em></li>
									<li><span><img src="images/lang/2.jpg" alt="" /></span><em>Germany</em></li>
									<li><span><img src="images/lang/3.jpg" alt="" /></span><em>Espanol</em></li>
									<li><span><img src="images/lang/4.jpg" alt="" /></span><em>France</em></li>
								</ul>
							</div>
						</form>
					</div>

					<div class="search">
						<form class="top-search">
							<input type="search" placeholder="Search">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<a href="#" class="topbar-btn"></a>
	</div>
	<!--TOPBAR END-->
	<!-- ////// HIDDEN PANEL VIWEABLE ONLY ON SMALLER SCREENS ////// -->

	<div class="body">

		<!-- Top wrap -->
		<div id="top-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-3">

						<!-- Social icons -->

					</div>

					<div class="col-md-9">

						<!-- Language -->


						<!-- Tobar contents -->
						<nav>
							<ul class="nav-pills topbar-right">
								<?php
								if (isset($_SESSION['username_anggota'])) { ?>
									<li class="account"><a href="<?= base_url() ?>front/logout">Logout</a> / <a href="<?= base_url() ?>front/member_area/<?= $_SESSION['username_anggota'] ?>"><?=$_SESSION['username_anggota'] ?></a></li>
								<?php	} else { ?>
									<li class="account"><a href="<?= base_url() ?>front/login">Login</a> / <a href="<?= base_url() ?>front/register">Registrasi</a></li>
								<?php	}
								?>


							</ul>
						</nav>

						<!-- Search -->

					</div>
				</div>
			</div>
		</div>
		<!-- Top wrap -->

		<!-- Header -->
		<header>
			<div class="container header_1">
				<div class="row">

					<!-- Logo -->
					<div class="logo">
						<a class="navbar-brand logo-nav" href="<?= base_url() ?>front"><img src="<?= base_url() ?>assets/images/logomin.png" alt="" style="width: 290px; height:100px;"></a>
					</div>