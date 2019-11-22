<?php
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
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
                            ADMIN
                        </th>
                        <th>
                            EVENT
                        </th>
                        <th>
                            AGENDA EVENT
                        </th>
                        <th>
                            KATEGORI EVENT
                        </th>
                        <th>
                            TANGGAL
                        </th>
                        <th>
                            GAMBAR
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
                        <td><?= $value->nama_kategori ?></td>
                        <td><?= $value->tanggal ?></td>
                        <td><a href="<?= base_url() ?>foto_event/<?= $value->gambar ?>"><img src="<?= base_url() ?>foto_event/<?= $value->gambar ?>" class="img img-thumbnail" style="width:100px;"></a></td>
                      </tr>
                    <?php $i++; }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>