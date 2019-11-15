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
            <form method="post" action="">
                <div class="datatable-header">
                    <div class="col-md-4 dataTables_filter">
                        <select name="filter_date" class="form-control select2" onchange="this.form.submit()">
                            <option value="">Pilih Waktu</option>
                            <option value="1" <?=(isset($filter)&&$filter==1)?'selected' : '' ?>>Daily</option>
                            <option value="2" <?=(isset($filter)&&$filter==2)?'selected' : '' ?>>Weekly</option>
                            <option value="3" <?=(isset($filter)&&$filter==3)?'selected' : '' ?>>Monthly</option>
                            <option value="4" <?=(isset($filter)&&$filter==4)?'selected' : '' ?>>Yearly</option>
                        </select>
                    </div>
                </div>
            </form>
            <table class="table table-responsive" id="table-unggah-karya">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            ANGGOTA
                        </th>
                        <th>
                            CHANNEL
                        </th>
                        <th>
                            TANGGAL
                        </th>
                        <th>
                            ISI TRAINING
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
                    foreach ($list_unggah_karya as $value) { ?>
                      <tr>  <td><?= $i ?></td>
                        <td><?= $value->nama_lengkap ?></td>
                        <td><strong><?= $value->nama_channel ?></strong></td>
                        <td><?= $value->tanggal ?></td>
                        <td><?php $limited_string = limit_words($value->isi_karya, 10);
                        echo $limited_string; ?></td>
                        
                        <td><a href="<?= base_url() ?>foto_unggah_karya/<?= $value->video ?>"><iframe width="100" height="100"
src="<?= $value->video?>">
</iframe></a></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <a href="<?= base_url() ?>unggah_karya/detail_unggah_karya/<?= $value->id_karya ?>" class="btn btn-primary"><i class="icon icon-eye"></i></a>
                                <button type="button" class="btn btn-danger hapus-unggah_karya" id="<?= $value->id_karya?>"><i class="icon icon-trash"></i></button>       
                            </div>
                        </td></tr>
                    <?php $i++; }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>