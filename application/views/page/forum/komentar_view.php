<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    Detail Forum
                </h5>
            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <tr>
                        <td rowspan="6"><img src="<?= base_url() ?>foto_forum/<?= $detail_forum->gambar ?>" class="img img-responsive" style="width: 300px;"></td>
                        <td>
                            Judul Forum : <?= $detail_forum->judul_forum; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Di Buat Oleh : <?= $detail_forum->nama; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanggal : <?= $detail_forum->tanggal; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">
                            Isi Forum : <?= $detail_forum->isi_forum; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title ?>
                </h5>
            </div>
            <div class="panel-body">
                <?php foreach ($all_comment as $value) { ?>
                    <h4><?= $value->nama ?></h4>
                    <span>Waktu : </span><span class="text-mute">
                        <?= $value->waktu; ?>
                    </span>
                    <p>
                        <b>Komentar : </b> <?= $value->isi_komentar ?>
                        <br>
                        <a data-toggle="modal" href='#<?= $value->id_komentar_forum ?>'>Balas</a>
                    </p>
                    <form method="post" action="<?= base_url('forum/balas_komentar_forum/' . $value->id_komentar_forum) ?>">
                        <div class="modal fade" id="<?= $value->id_komentar_forum ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Balas Komentar <?= $value->nama ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_forum" value="<?= $detail_forum->id_forum ?>" />
                                        <textarea name="isi_komentar" class='form-control'></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Balas</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="line-block"></div>
                <?php } ?>
                <div class="col-md-5">
                    <form method="post" action="<?= base_url() ?>forum/buat_komentar/<?= $detail_forum->id_forum ?>">
                        <textarea name="komentar" id="" cols="10" rows="10" class="form-control"></textarea>
                        <p></p>
                        <button type="submit" class="btn btn-primary">Komentar</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>