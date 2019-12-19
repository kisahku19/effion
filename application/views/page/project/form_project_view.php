<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <div class="panel-body">
                <form method="post" action="<?= base_url() ?>project/simpan_project/<?php
                                                                                    if (!empty($detail_project)) {
                                                                                        echo $detail_project->id_project;
                                                                                    }
                                                                                    ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3">KANAL</label>
                        <div class="col-md-6">
                            <input type="text" name="nama_channel" id="" class="form-control" value="<?php
                                                                                                        if (!empty($detail_project)) {
                                                                                                            echo $detail_project->nama_channel;
                                                                                                        }
                                                                                                        ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">TANGGAL</label>
                        <div class="col-md-5">
                            <input type="text" placeholder="Masukan Tanggal Project" name="tanggal" id="tanggal" class="form-control" value="<?php
                                                                                                                                    if (!empty($detail_project)) {
                                                                                                                                        echo date("d-m-Y", strtotime($detail_project->tanggal));
                                                                                                                                    }
                                                                                                                                    ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">ISI PROJECT</label>
                        <div class="col-md-9">
                            <textarea name="isi_project" id="keterangan" cols="30" rows="10" class="form-control"><?php
                                                                                                                    if (!empty($detail_project)) {
                                                                                                                        echo $detail_project->isi_project;
                                                                                                                    }
                                                                                                                    ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">VIDEO</label>
                        <div class="col-md-5">
                            <?php
                            if (!empty($detail_project)) {
                                if (!empty($detail_project->video)) { ?>
                                    <iframe width="300" height="100" src="<?= $detail_project->video ?>"></iframe>
                                        <input type="text" class="form-control" name="video" value="<?= $detail_project->video?>">
                                    <?php } else { ?>
                                        <input type="text" name="video" id="" class="form-control">
                                    <?php }
                            } else { ?>
                                    <input type="text" name="video" id="" class="form-control">
                                <?php }
                            ?>
                        </div>
                    </div>
                    <div class="btn-group btn-group-lg">
                        <button type="submit" class="btn btn-info">Simpan Project</button>
                        <a href="<?= base_url() ?>project" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>