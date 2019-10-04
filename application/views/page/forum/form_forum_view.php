<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= base_url() ?>forum/simpan_forum/<?php
                 if (!empty($detail_forum)) {
                    echo $detail_forum->id_forum;
                }
                ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3">NAMA FORUM</label>
                        <div class="col-md-6">
                            <input type="text" name="nama" id="" class="form-control" value="<?php
                                                                                                    if (!empty($detail_forum)) {
                                                                                                        echo $detail_forum->nama;
                                                                                                    }else {
                                                                                                        echo $this->session->userdata('nama_lengkap');
                                                                                                    }
                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">JUDUL FORUM</label>
                        <div class="col-md-6">
                            <input type="text" name="judul_forum" id="" class="form-control" value="<?php
                                                                                                    if (!empty($detail_forum)) {
                                                                                                        echo $detail_forum->judul_forum;
                                                                                                    }
                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">ISI FORUM</label>
                        <div class="col-md-9">
                            <textarea name="isi_forum" id="keterangan" cols="30" rows="10" class="form-control"><?php
                                                                                                        if (!empty($detail_forum)) {
                                                                                                            echo $detail_forum->isi_forum;
                                                                                                        }
                                                                                                        ?></textarea>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">TANGGAL</label>
                        <div class="col-md-5">
                            <input type="text" placeholder="10 juni 1988" name="tanggal" id="tanggal" class="form-control" value="<?php
                                                                                                if (!empty($detail_forum)) {
                                                                                                    echo $detail_forum->tanggal;
                                                                                                }
                                                                                                ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">GAMBAR</label>
                        <div class="col-md-5">
                            <?php
                            if (!empty($detail_forum)) {
                                if (!empty($detail_forum->gambar)) { ?>
                                    <img src="<?= base_url() ?>foto_forum/<?= $detail_forum->gambar ?>" class="img img-thumbnail">
                                    <input type="file" class="form-control" name="gambar">
                                <?php } else { ?>
                                    <input type="file" name="gambar" id="" class="form-control">
                                <?php }
                        }else {?>
                            <input type="file" name="gambar" id="" class="form-control">
                       <?php }
                        ?>
                        </div>
                    </div>
                    <div class="btn-group btn-group-lg">
                        <button type="submit" class="btn btn-info">Simpan forum</button>
                        <a href="<?= base_url()?>forum" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>