<div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
           <?php
           foreach ($all_forum as $value) {?>
             <div class="folio-item col-md-3 isotope-item photography">
				<div class="folio-img">
					<img src="<?= base_url()?>foto_forum/<?= $value->gambar?>" alt="" style="width: 100%; height: 200px;"/>
					
					<div class="folio-info"><br>
						<h4><a href="<?= base_url()?>front/detail_forum/<?= $value->id_forum?>"><?= $value->judul_forum?></a></h4>
						<span class="folio-date"><?= $value->tanggal?></span>
					</div>
				</div>
			</div>
          <?php }
           ?>

            </div>
        </div>
    </div>
</div>

