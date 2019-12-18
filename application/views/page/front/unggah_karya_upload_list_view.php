<div class="row">
    <div class="col-md-10 col-md-offset-3">
        <form action="<?= base_url() ?>front/aksi_unggah_karya" method="post">
            <div class="form-group row">
                <label class="col-md-2">Nama Channel</label>
                <div class="col-md-5">
                    <input type="text" name="nama_channel" id="" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Tanggal</label>
                <div class="col-md-5">
                    <input type="date" data-date="" id="tanggal" data-date-format="dd-mm-YYYY" value="" name="tanggal" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Isi Karya</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="desc_karya" rows="8" placeholder="your message" name="isi_karya"></textarea>
                    <!-- <textarea class="form-control" id="desc_karya" name="isi_karya" required></textarea> -->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Video</label>
                <div class="col-md-5">
                    <input type="text" name="video" id="" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="btn-group btn-group-lg">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>
        </form>

    </div>
</div>
<p></p>
<h3>Karya yang telah dibuat</h3>
<div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
                <?php
                foreach ($all_karya as $value) { ?>
                    <div class="folio-item col-md-3 isotope-item photography">
                        <div class="folio-img">
                            <iframe style="width:100%; height: 200px;" src="<?= $value->video ?>">
                            </iframe>

                            <div class="folio-info"><br>
                                <h4><a href="<?= base_url() ?>front/detail_unggah_karya/<?= $value->id_karya ?>"><?= $value->nama_channel ?></a></h4>
                                <!-- <span class="folio-date"><?= $value->tanggal ?></span> -->
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
            </div>
        </div>
    </div>
</div>