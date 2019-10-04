<?php
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
?>
<?php 
    if (!empty($this->session->flashdata('pesan'))) {
        echo '<div class="alert alert-info">'. $this->session->flashdata('pesan') .'</div>';
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title; ?>
                </h5>
                <a href="<?= base_url()?>event/form_event/" class="btn btn-lg btn-primary pull-right">Tambah Event</a>
            </div>
            <table class="table table-responsive" id="table-event">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            ADMIN
                        </th>
                        <th>
                            EVENT
                        </th>
                        <th>
                            AGENDA EVENT
                        </th>
                        <th>
                            TANGGAL
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
                    foreach ($list_event as $value) { ?>
                      <tr>  <td><?= $i ?></td>
                        <td><?= $value->nama_admin ?></td>
                        <td><strong><?= $value->nama_event ?></strong></td>
                        <td><?php $limited_string = limit_words($value->isi_event, 10);
                        echo $limited_string; ?></td>
                        <td><?= $value->tanggal ?></td>
                        <td><a href="<?= base_url() ?>foto_event/<?= $value->gambar ?>"><img src="<?= base_url() ?>foto_event/<?= $value->gambar ?>" class="img img-thumbnail" style="width:100px;"></a></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                            <!-- <a href="<?= base_url() ?>event/detail_event/<?= $value->id_event ?>" class="btn btn-primary"><i class="icon icon-eye"></i></a> -->
                                <a href="<?= base_url() ?>event/form_event/<?= $value->id_event ?>" class="btn btn-primary"><i class="icon icon-pencil"></i></a>
                                <button type="button" class="btn btn-danger hapus-event" id="<?= $value->id_event?>"><i class="icon icon-trash"></i></button>
                            </div>
                        </td></tr>
                    <?php $i++; }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>