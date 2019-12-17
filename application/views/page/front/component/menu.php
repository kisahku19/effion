<!-- Navmenu -->

<?php
if (isset($_SESSION['nama_anggota'])) { ?>

    <nav class="navbar navbar-default nav-main" role="navigation">
        <ul class="nav navbar-nav navbar-right main-header-menu">
            <li class="dropdown active">
                <a class="dropdown-toggle" href="./index.html">Home<span>home layouts</span></a>
            </li>
        </ul>
    </nav>
<?php } else { ?>
    <nav class="navbar navbar-default nav-main" role="navigation">
        <ul class="nav navbar-nav navbar-right main-header-menu">
            <li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front">Home</a>
            </li>
            <li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front/tentang_kami">Tentang Kami</a>
            </li>
            <li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front/event">Event</a>
            </li>
            <li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front/project">Project</a>
            </li>
            <li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front/training">Training</a>
            </li>
            <li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front/unggah_karya">Unggah Karya</a>
            </li>
            <!--li class="dropdown active">
                <a class="dropdown-toggle" href="<?= base_url()?>front/forum">Forum</a>
            </li-->
        </ul>
    </nav>
<?php }
?>

</div>
</div>
</header>
