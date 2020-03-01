<h2 style="text-align: center;">Anggota Area</h2>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-responsive">
            <tr>
                <td rowspan="6"><img src="<?= base_url() ?>foto_anggota/<?= $detail_info->gambar ?>" class="img img-rounded" width="250px"></td>
                <td>
                    Nama Lengkap : <?= $detail_info->nama_lengkap ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email : <?= $detail_info->email ?>
                </td>
            </tr>
            <tr>
                <td>
                    Handphone : <?= $detail_info->no_hp ?>
                </td>
            </tr>
            <tr>
                <td>
                    Domisili : <?= $detail_info->domisili ?>
                </td>
            </tr>
            <tr>
                <td>
                    Username : <?= $detail_info->username ?>
                </td>
                <!-- <a href="<?= base_url()?>front/form_edit_karya/<?= $value->id_karya?>" class="btn btn-primary">Update Karya</a> -->
            </tr>
        </table>
    </div>
</div>

<h2 style="text-align: center;">Karya</h2>

<div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
           <?php
           foreach ($all_karya as $value) {?>
             <div class="folio-item col-md-3 isotope-item photography">
				<div class="folio-img">
                <iframe style="width:100%; height: 200px;"
src="<?= $value->video?>">
</iframe>
					
					<div class="folio-info">
						<h4><a href="<?= base_url()?>front/detail_unggah_karya/<?= $value->id_karya?>"><?= $value->nama_channel?></a></h4>
						<span class="folio-date"><?= $value->tanggal?></span>
					</div>
                </div>
                <p>
                    
                </p>
                <div class="btn-group">
                    <a href="<?= base_url()?>front/form_edit_karya/<?= $value->id_karya?>" class="btn btn-primary">Update Karya</a>
                    <!-- <a href="<?= base_url()?>front/hapus_karya/<?= $value->id_karya?>" class="btn btn-danger">Hapus</a> -->
                </div>
			</div>
          <?php }
           ?>
            </div>
        </div>
    </div>
</div>