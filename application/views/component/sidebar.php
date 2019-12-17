<?php 
$data['uri'] = $this->uri->segment(1);
?>
<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">

							<!-- Main -->

							<li <?= ($data['uri'] == 'dashboard' ? 'class="active"' : '')?>><a href="<?=base_url();?>dashboard"><i class="icon-home7"></i><span>Beranda</span></a></li>
							<li <?= ($data['uri'] == 'anggota' ? 'class="active"' : '')?>><a href="<?=base_url();?>anggota"><i class="icon-users"></i><span>Anggota</span></a></li>
							<li>
								<a href="#"><i class="icon-calendar"></i><span>Event</span></a>
								<ul>
									<li <?= ($data['uri'] == 'event' ? 'class="active"' : '')?>><a href="<?=base_url();?>event"><i class="icon-calendar"></i><span>List Event</span></a></li>
									<li <?= ($data['uri'] == 'komentar' ? 'class="active"' : '')?>><a href="<?=base_url();?>komentar"><i class="icon-price-tags"></i><span>Komentar</span></a></li>
								</ul>
							</li>
							
							<!-- <li <?= ($data['uri'] == 'anggota' ? 'class="project"' : '')?>><a href="<?=base_url();?>project"><i class="icon-archive"></i><span>Project</span></a></li> -->
							<li <?= ($data['uri'] == 'anggota' ? 'class="training"' : '')?>><a href="<?=base_url();?>training"><i class="icon-lifebuoy"></i><span>Training</span></a></li>
							<li <?= ($data['uri'] == 'anggota' ? 'class="unggah_karya"' : '')?>><a href="<?=base_url();?>unggah_karya"><i class="icon-folder-upload"></i><span>Unggah Karya</span></a></li>
							<li <?= ($data['uri'] == 'kategori' ? 'class="active"' : '')?>><a href="<?=base_url();?>kategori"><i class="icon-price-tags"></i><span>Kategori</span></a></li>
															
							<!-- /page kits -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>