<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <table class="table table-responsive" id="table-anggota">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NAMA LENGKAP
                        </th>
                        <th>
                            EMAIL
                        </th>
                        <th>
                            NO HANDPHONE
                        </th>
                        <th>
                            DOMISILI
                        </th>
                        <th>
                            USERNAME
                        </th>
                        <th>
                            GAMBAR
                        </th>
                        <th>
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_anggota as $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value->nama_lengkap ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->no_hp ?></td>
                            <td><?= $value->domisili ?></td>
                            <td><?= $value->username ?></td>
                            <td><img src="<?= base_url() ?>foto_anggota/<?= $value->gambar ?>" class="img img-thumbnail"></td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="<?= base_url() ?>anggota/detail_anggota/<?= $value->id_anggota ?>" class="btn btn-primary"><i class="icon icon-eye"></i></a>
                                    <button type="button" class="btn btn-danger hapus-anggota" id="<?= $value->id_anggota ?>"><i class="icon icon-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>