<h2 style="text-align: center;">Login Anggota</h2>

<div class="row">
    <div class="col-md-12 no-padding">
        <?php
        if (isset($_SESSION['error'])) {?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error')?></div>
      <?php  }
        ?>
        <form method="post" action="<?= base_url()?>front/aksi_login">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div class="input-group">
                <span class="input-group-addon"><img src="<?= base_url()?>assets/front/images/c-user.png" alt="" /></span>
                <input type="text" class="form-control" placeholder="Your Username" name="username">
            </div>

            <div class="input-group">
                <span class="input-group-addon"><img src="<?= base_url()?>assets/front/images/c-subject.png" alt="" /></span>
                <input type="password" class="form-control" placeholder="Your Password" name="password">
            </div>
            <button type="submit" class="c-btn">Login</button>
        </div>
        <!-- <a>Forgot Password</a> -->
        </form>
    </div>
</div>