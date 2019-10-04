<h2 style="text-align: center;">Registrasi Anggota</h2>

<div class="row">
    <div class="col-md-12 no-padding">
        <form method="post" action="<?= base_url() ?>front/aksi_register" enctype="multipart/form-data">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-user-tie"></i></span>
                <input type="text" class="form-control" placeholder="Nama" name="nama_lengkap" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-mail5"></i></span>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-phone"></i></span>
                <input type="text" class="form-control" placeholder="Handphone" name="phone" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-map"></i></span>
                <input type="text" class="form-control" placeholder="Domisili" name="domisili" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-user-check"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon icon-file-check"></i></span>
                <input type="file" class="form-control" name="file" required>
            </div>
            <button type="submit" class="c-btn">Registrasi</button>
        </div>
        </form>
    </div>
</div>