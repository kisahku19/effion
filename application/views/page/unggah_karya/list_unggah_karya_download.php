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
                            DIBUAT
                        </th>
                        <th>
                            KANAL
                        </th>
                        <th>
                            TANGGAL
                        </th>
                        <th>
                            ISI PROJECT
                        </th>
                        <th>
                            VIDEO
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_unggah_karya as $value) { ?>
                        <tr>  <td><?= $i ?></td>
                          <td><?= $value->nama_lengkap ?></td>
                          <td><strong><?= $value->nama_channel ?></strong></td>
                          <td><?= date("d-m-Y", strtotime($value->tanggal)); ?></td>
                          <td><?=$value->isi_karya?></td>
                          <td><?= $value->video?>></td>
                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>