<div class="row" style="padding-top: 30px;">
    <?php
    foreach ($all_event as $value) { ?>
        <div class="col-md-6">
            <div class="row"><br>
                <div class="col-md-6"><img src="<?= base_url() ?>foto_event/<?= $value->gambar ?>" alt="" class="img img-responsive" style="width: 120%; height: 240px;"></div>
                <div class="col-md-6">
                    <h2 class="title text-blue-400"><a href="<?= base_url()?>front/detail_event/<?= $value->id_event?>"><?= $value->nama_event?></a></h2><br>
                     
                    <div class="wy-text-large">
                        <?= date("d-m-Y", strtotime( $value->tanggal)) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
?>
</div>