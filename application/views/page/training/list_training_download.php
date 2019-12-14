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
                            NO
                        </th>
                        <th>
                            ADMIN
                        </th>
                        <th>
                            TRAINING
                        </th>
                        <th>
                            TANGGAL
                        </th>
                        <th>
                            ISI TRAINING
                        </th>
                        <th>
                            GAMBAR
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_training as $value) { ?>
                        <tr>  <td><?= $i ?></td>
                          <td><?= $value->nama_admin ?></td>
                          <td><strong><?= $value->nama_training ?></strong></td>
                          <td><?= $value->tanggal ?></td>
                          <td><?=$value->isi_training?></td>
                          
                          <td><a href="<?= base_url() ?>foto_training/<?= $value->gambar ?>"><img src="<?= base_url() ?>foto_training/<?= $value->gambar ?>" class="img img-thumbnail" style="width:100px;"></a></td>
                        </tr>
                      <?php $i++; }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>