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
                <a href="<?= base_url()?>forum/form_forum/" class="btn btn-lg btn-primary pull-right">Tambah forum</a>
            </div>
            <table class="table table-responsive" id="table-forum">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NAMA
                        </th>
                        <th>
                            JUDUL FORUM
                        </th>
                        <th>
                            ISI FORUM
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
                    foreach ($list_forum as $value) { ?>
                      <tr>  <td><?= $i ?></td>
                        <td><?= $value->nama ?></td>
                        <td><strong><?= $value->judul_forum ?></strong></td>
                        <td><?php $limited_string = limit_words($value->isi_forum, 10);
                        echo $limited_string; ?></td>
                        <td><?= $value->tanggal ?></td>
                        <td><a href="<?= base_url() ?>foto_forum/<?= $value->gambar ?>"><img src="<?= base_url() ?>foto_forum/<?= $value->gambar ?>" class="img img-thumbnail" style="width:100px;"></a></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <a href="<?= base_url() ?>forum/form_forum/<?= $value->id_forum ?>" class="btn btn-primary"><i class="icon icon-pencil"></i></a>
                                <!-- <a href="<?= base_url() ?>forum/komentar/<?= $value->id_forum?>" class="btn btn-success"><i class="icon icon-comment"></i></a> -->
                                <button type="button" class="btn btn-danger hapus-forum" id="<?= $value->id_forum?>"><i class="icon icon-trash"></i></button>
                            </div>
                        </td></tr>
                    <?php $i++; }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>