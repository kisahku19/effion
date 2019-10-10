<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
                <a href="<?= base_url()?>kategori/form_kategori/" class="btn btn-lg btn-primary pull-right">Tambah Kategori</a>
            </div>
            <table class="table table-responsive" id="table-kategori">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NAMA KATEGORI
                        </th>
                        <!-- <th>
                            Created Date
                        </th>
                        <th>
                            Updated Date
                        </th> -->
                        <th>
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_kategori as $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value->nama_kategori ?></td>
                            <!-- <td><?= $value->created_at ?></td>
                            <td><?= $value->updated_at ?></td> -->
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="<?= base_url() ?>kategori/form_kategori/<?= $value->id_kategori ?>" class="btn btn-primary"><i class="icon icon-pencil"></i></a>
                                    <button type="button" class="btn btn-danger hapus-kategori" id="<?= $value->id_kategori ?>"><i class="icon icon-trash"></i></button>
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