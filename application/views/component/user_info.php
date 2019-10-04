<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?= base_url()?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
								<span class="media-heading text-semibold"><?= $this->session->userdata('nama_lengkap')?></span>
									<!-- <span class="media-heading text-semibold"><?= $this->session->userdata('username')?></span> -->
									<div class="text-size-mini text-muted">
										<i class="icon-user text-size-small"></i> &nbsp;<?= $this->session->userdata('nama_lengkap')?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										
									</ul>
								</div>
							</div>
						</div>
					</div>