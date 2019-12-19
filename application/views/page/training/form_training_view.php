<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= base_url() ?>training/simpan_training/<?php
                                                                                    if (!empty($detail_training)) {
                                                                                        echo $detail_training->id_training;
                                                                                    }
                                                                                    ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3">TRAINING</label>
                        <div class="col-md-6">
                            <input type="text" name="nama_training" id="" class="form-control" value="<?php
                                                                                                    if (!empty($detail_training)) {
                                                                                                        echo $detail_training->nama_training;
                                                                                                    }
                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">TANGGAL</label>
                        <div class="col-md-5">
                            <input type="text" placeholder="Masukan Tanggal Pelatihan" name="tanggal" id="tanggal" class="form-control" value="<?php
                                                                                                                                    if (!empty($detail_training)) {
                                                                                                                                        echo date("d-m-Y", strtotime($detail_training->tanggal));
                                                                                                                                    }
                                                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">ISI TRAINING</label>
                        <div class="col-md-9">
                            <textarea name="isi_training" id="keterangan" cols="30" rows="10" class="form-control"><?php
                                                                                                                if (!empty($detail_training)) {
                                                                                                                    echo $detail_training->isi_training;
                                                                                                                }
                                                                                                                ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">GAMBAR</label>
                        <div class="col-md-5">
                            <?php
                            if (!empty($detail_training)) {
                                if (!empty($detail_training->gambar)) { ?>
                                    <img src="<?= base_url() ?>foto_training/<?= $detail_training->gambar ?>" class="img img-thumbnail">
                                    <input type="file" class="form-control" name="gambar">
                                <?php } else { ?>
                                    <input type="file" name="gambar" id="" class="form-control">
                                <?php }
                        } else { ?>
                                <input type="file" name="gambar" id="" class="form-control">
                            <?php }
                        ?>
                        </div>
                    </div>
                    <div class="btn-group btn-group-lg">
                        <button type="submit" class="btn btn-info">Simpan training</button>
                        <a href="<?= base_url() ?>training" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>