<div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
                <?php
                foreach ($all_karya as $value) { ?>
                    <div class="folio-item col-md-3 isotope-item photography">
                        <div class="folio-img">
                            <iframe style="width:100%; height: 250px;" src="<?= $value->video ?>">
                            </iframe>
                            <div class="folio-info">
                                <h4><a href="<?= base_url() ?>front/detail_unggah_karya/<?= $value->id_karya ?>"><?= $value->nama_channel ?></a></h4>
                                <span class="text-black">Dibuat Oleh <?= $value->nama ?></span>
                                <span class="folio-date"><?= $value->tanggal ?></span>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
            </div>
        </div>
    </div>
</div>