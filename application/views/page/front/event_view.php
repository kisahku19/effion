<style>
.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
  background: #d4cfcf;
}
</style>
<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center;"><b>EVENT</b></h1><br>
    </div>
</div>
<?php 
foreach($all_event as $key=>$val){ 
    ?>
    <div class="kategori-title">
        <h4><?= $key?></h4>
    </div>
    <br>
    <div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
           <?php
           foreach ($val as $value) {?>
             <div class="folio-item col-md-3 isotope-item photography">
                <div class="folio-img">
					<img src="<?= base_url()?>foto_event/<?= $value['gambar']?>" alt="" style="width: 100%; height: 300px;"/>
					<div class="top-right"><a style="color: #5b5b5b;" href="<?= base_url()?>front/detail_event/<?= $value['id_event']?>#comment_section">Jumlah Komentar <?= $value['komen']?></a></div>
					<div class="folio-info"><br>
						<h4><a href="<?= base_url()?>front/detail_event/<?= $value['id_event']?>"><?= $value['nama_event']?></a></h4>
						<span class="folio-date"><?= date("d-m-Y", strtotime( $value['tanggal'])) ?></span>
					</div>
				</div>
			</div>
          <?php 
            }
           ?>

            </div>
        </div>
    </div>
</div>
<?php } ?>

             


