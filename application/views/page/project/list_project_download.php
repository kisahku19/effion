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
  background-color: #dddddd;
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
            <table>
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
                    foreach ($list_project as $value) { ?>
                        <tr>
                            <td><?= $i;?></td>
                            <td><?= $value->nama_admin?></td>
                            <td><?= $value->nama_channel?></td>
                            <td><?= $value->tanggal?></td>
                            <td><?= $value->isi_project?></td>
                            <td><?= $value->video?>"></td>
                        </tr>
                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>