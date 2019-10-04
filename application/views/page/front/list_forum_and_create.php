<div class="row">
    <div class="col-md-10 col-md-offset-3">
        <form action="<?= base_url() ?>front/aksi_buat_forum" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-md-2">Judul Forum</label>
                <div class="col-md-5">
                    <input type="text" name="judul_forum" id="" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Tanggal</label>
                <div class="col-md-5">
                    <input type="date" data-date="" id="tanggal" data-date-format="YYYY-mm-dd" value="" name="tanggal" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Isi Forum</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="desc_karya" rows="8" placeholder="your message" name="isi_forum"></textarea>
                    <!-- <textarea class="form-control" id="desc_karya" name="isi_forum" required></textarea> -->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Gambar</label>
                <div class="col-md-5">
                    <input type="file" name="file" id="" class="form-control" required>
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
<h3>Forum yang telah dibuat</h3>
<div class="row">
    <div class="col-md-12 no-padding">
        <div class="portfolio-inner nport">
            <div id="folio" class="isotope col-md-12 no-padding">
                <?php
                foreach ($all_forum as $value) { ?>
                    <div class="folio-item col-md-3 isotope-item photography">
                        <div class="folio-img">
                            <img src="<?= base_url() ?>foto_forum/<?= $value->gambar ?>" alt="" style="width: 100%; height: 200px;" />
                            <div class="folio-info"><br>
                                <?php
                                $diff = abs(strtotime(date('Y-m-d')) - strtotime($value->tanggal));

                                $years = floor($diff / (365 * 60 * 60 * 24));
                                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                                ?>
                                <?php if ($days > 20) { ?>
                                    <h4><?= $value->judul_forum ?></h4>
                                <?php } else { ?>
                                    <h4><a href="<?= base_url() ?>front/detail_forum/<?= $value->id_forum ?>"><?= $value->judul_forum ?></a></h4>
                                <?php } ?>
                                <span class="folio-date"><?= $value->tanggal ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div>
</div>