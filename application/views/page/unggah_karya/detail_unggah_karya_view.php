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
                        <td>
                            Anggota :
                        </td>
                        <td><?= $d_unggah_karya->nama_lengkap ?></td>
                    </tr>
                    <tr>
                        <td>
                            Channel :
                        </td>
                        <td><?= $d_unggah_karya->nama_channel ?></td>
                    </tr>
                    <tr>
                        <td>
                            Tanggal :
                        </td>
                        <td><?= $d_unggah_karya->tanggal ?></td>
                    </tr>
                    <tr>
                        <td>
                            Isi :
                        </td>
                        <td><?= $d_unggah_karya->isi_karya ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <iframe width="400" height="200" src="<?= $d_unggah_karya->video ?>"></iframe>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>