<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2">
                            <img src="<?= base_url() ?>foto_anggota/<?= $d_anggota->gambar; ?>" class="img img-rounded img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NAMA LENGKAP :
                        </td>
                        <td><?= $d_anggota->nama_lengkap ?></td>
                    </tr>
                    <tr>
                        <td>
                            SUREL :
                        </td>
                        <td><?= $d_anggota->email ?></td>
                    </tr>
                    <tr>
                        <td>
                            NO HP :
                        </td>
                        <td><?= $d_anggota->no_hp ?></td>
                    </tr>
                    <tr>
                        <td>
                            DOMISILI :
                        </td>
                        <td><?= $d_anggota->domisili ?></td>
                    </tr>
                    <tr>
                        <td>
                            USERNAME :
                        </td>
                        <td><?= $d_anggota->username ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>