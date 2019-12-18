<div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
           <?php
           foreach ($all_project as $value) {?>
             <div class="folio-item col-md-3 isotope-item photography">
				<div class="folio-img">
					<iframe width="270px" height="250px" src="<?= $value->video?>"></iframe>
				
					<div class="folio-info"><br>
						<h4><a href="<?= base_url()?>front/detail_project/<?= $value->id_project?>"><?= $value->nama_channel?></a></h4>
						<span class="folio-date"><?= date("d-m-Y", strtotime( $value->tanggal)) ?></span>
					</div>
				</div>
			</div>
          <?php }
           ?>

            </div>
        </div>
    </div>
</div>

