<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  #background-color: #dddddd;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
        <div class="panel-heading">
                <h2 class="panel-title">
                    <?= $title; ?>
                </h5>
            </div>
            <table id="table-anggota" border="0.5">
                    <tr>
                        <th>
                            NO
                        </th>
                        <th>
                            NAMA LENGKAP
                        </th>
                        <th>
                            SUREL
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
                    </tr>
                    <?php $i = 1;
                    foreach ($list_anggota as $value) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value->nama_lengkap ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->no_hp ?></td>
                            <td><?= $value->domisili ?></td>
                            <td><?= $value->username ?></td>
                            <td><img src="<?= base_url() ?>foto_anggota/<?= $value->gambar ?>" width="100px"></td>
                            
                        </tr>
                        <?php $i++;
                    }
                    ?>
            </table>
        </div>
    </div>
</div>