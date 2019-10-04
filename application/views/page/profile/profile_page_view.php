<div class="row">
    <div class="col-md-8 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><?= $title ?></h4>
            </div>
            <div class="panel-body">
                <form action="<?= base_url()?>profile/simpan_profile" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3">Nama</label>
                        <div class="col-md-5">
                            <input type="text" id="" class="form-control" name="nama" value="<?= $detail_user->nama ?>">
                            <input type="hidden" id="" class="form-control" name="user_id" value="<?= $detail_user->user_id ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Username</label>
                        <div class="col-md-5">
                            <input type="text" id="" class="form-control" name="username" value="<?= $detail_user->username ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Edit Password</label>
                        <div class="col-md-5">
                            <input type="password" id="" class="form-control" name="password" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="" class="col-md-3">Foto</label> -->
                        <div class="col-md-5">
                            <?php
                            if (!empty($detail_user->foto)) {?>
                                <!-- <img src="<?= base_url()?>foto_admin/<?= $detail_user->foto?>" class="img img-rounded" style="width: 200px;"> -->
                           <?php }else {?>
                            <!-- <img src="<?= base_url()?>foto_admin/sample.jpg" class="img img-rounded" style="width: 200px;"> -->
                          <?php }
                            ?>
                            <!-- <input type="file" id="" class="form-control" name="foto" value=""> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>