<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= base_url() ?>event/simpan_event/<?php
                 if (!empty($detail_event)) {
                    echo $detail_event->id_event;
                }
                ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3">NAMA EVENT</label>
                        <div class="col-md-6">
                            <input type="text" name="nama_event" id="" class="form-control" value="<?php
                                                                                                    if (!empty($detail_event)) {
                                                                                                        echo $detail_event->nama_event;
                                                                                                    }
                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">ISI EVENT</label>
                        <div class="col-md-9">
                            <textarea name="isi_event" id="keterangan" cols="30" rows="10" class="form-control"><?php
                                                                                                        if (!empty($detail_event)) {
                                                                                                            echo $detail_event->isi_event;
                                                                                                        }
                                                                                                        ?></textarea>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">KATEGORI</label>
                        <div class="col-md-5">
                            <select name="id_kategori">
                                <option value="">---Pilih Kategori---</option>
                                <?php 
                                    foreach ($kategori as $key=>$val){ ?>
                                        <option value="<?=$val->id_kategori?>" <?php
                                                                if (!empty($detail_event) && $detail_event->id_kategori == $val->id_kategori) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?=$val->nama_kategori?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">TANGGAL</label>
                        <div class="col-md-5">
                            <input type="text" placeholder="Masukan tanggal Event" name="tanggal" id="tanggal" class="form-control" value="<?php
                                                                                                if (!empty($detail_event)) {
                                                                                                    echo date("d-m-Y", strtotime($detail_event->tanggal));
                                                                                                }
                                                                                                ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">GAMBAR</label>
                        <div class="col-md-5">
                            <?php
                            if (!empty($detail_event)) {
                                if (!empty($detail_event->gambar)) { ?>
                                    <img src="<?= base_url() ?>foto_event/<?= $detail_event->gambar ?>" class="img img-thumbnail">
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
                        <button type="submit" class="btn btn-info">Simpan Event</button>
                        <a href="<?= base_url()?>event" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>