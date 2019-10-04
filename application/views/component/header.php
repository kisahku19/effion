<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
		<div class="navbar-header">
		<a class="navbar-brand logo-nav" href="<?= base_url() ?>dashboard"><img src="<?= base_url() ?>assets/images/logomin.png" alt="" style="width: 150px; height:40px;"></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url();?>assets/images/placeholder.jpg" alt="">
						<span><?= $this->session->userdata('username');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?= base_url()?>profile"><i class="icon-user-plus"></i> Profil</a></li>
						<li><a href="<?= base_url()?>login/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>