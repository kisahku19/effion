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
            </div>
            <table class="table table-responsive" id="table-event">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NAMA
                        </th>
                        <th>
                            ISI KOMENTAR
                        </th>
                        <th>
                            WAKTU
                        </th>
                        <th>
                            STATUS
                        </th>
                        <th>
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($all_comment as $value) { ?>
                      <tr>  <td><?= $i ?></td>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->isi_komentar ?></td>
                        <td><?= date("d-m-Y H:i:s", strtotime($value->waktu)) ?></td>
                        <td><?= ($value->status_komentar==1)?'Aktif':'Tidak Aktif' ?></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <?php if ($value->status_komentar==1) { ?>
                                <a href="<?= base_url() ?>komentar/update_status/<?= $value->id_komentar_event ?>/0" class="btn btn-primary" alt="Tolak"><i class="icon icon-cross"></i></a>
                                <?php } else { ?>
                                <a href="<?= base_url() ?>komentar/update_status/<?= $value->id_komentar_event ?>/1" class="btn btn-primary" alt="Terima"><i class="icon icon-checkmark"></i></a>
                                <?php } ?>
                                <button type="button" class="btn btn-danger hapus-komentar" id="<?= $value->id_komentar_event?>" alt="Hapus"><i class="icon icon-trash"></i></button>
                            </div>
                        </td></tr>
                    <?php $i++; }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>