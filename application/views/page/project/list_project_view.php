<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>
<?php
if (!empty($this->session->flashdata('pesan'))) {
    echo '<div class="alert alert-info">' . $this->session->flashdata('pesan') . '</div>';
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
                <a href="<?= base_url()?>project/form_project/" class="btn btn-lg btn-primary pull-right">Tambah Project</a>
                <a href="<?= base_url()?>project/download_project/" class="btn btn-lg btn-primary pull-right" style="margin-right: 10px;">Cetak</a>
            </div>
            <table class="table table-responsive" id="table-project">
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
                        <th>
                            AKSI
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
                            <td><?php $limit = limit_words($value->isi_project, 10);
                            echo $limit?></td>
                            <td>
                                <iframe width="100px" height="100px" src="<?= $value->video?>"></iframe>
                            </td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="<?= base_url()?>project/form_project/<?= $value->id_project?>" class="btn btn-primary"><i class="icon icon-pencil"></i></a>
                                    <button type="button" class="btn btn-danger hapus-project" id="<?= $value->id_project?>"><i class="icon icon-trash"></i></button>
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