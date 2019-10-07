<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= base_url() ?>kategori/simpan_kategori/<?php
                 if (!empty($detail_kategori)) {
                    echo $detail_kategori->id_kategori;
                }
                ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3">NAMA KATEGORI</label>
                        <div class="col-md-6">
                            <input type="text" name="nama" id="" class="form-control" value="<?php
                                                                                                    if (!empty($detail_kategori)) {
                                                                                                        echo $detail_kategori->nama_kategori;
                                                                                                    }
                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="btn-group btn-group-lg">
                        <button type="submit" class="btn btn-info">Simpan Kategori</button>
                        <a href="<?= base_url()?>forum" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>