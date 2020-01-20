<div class="row">
    <div class="col-md-8">
        <div id="portfolio-slider" class="flexslider">
            <ul class="slides">
                <iframe style="width: 100%; height: 400px;" src="<?= $detail_unggah_karya->video ?>">
                </iframe>
            </ul>
        </div>
    </div>
    <!-- Portfolio single - Slider -->

    <!-- Project Info -->
    <div class="col-md-4">
        <div class="portfolio-meta">
            <h5>Dibuat Oleh : <?= $_SESSION['username_anggota'] ?></h5>
            <h5>Tanggal : <?= date("d-m-Y", strtotime($detail_unggah_karya->tanggal)) ?></h5>
        </div>
    </div>
</div>
<p></p>
<div class="row">
    <div class="project-info-detail col-md-12">
        <h3>Isi Karya</h3>
        <?= $detail_unggah_karya->isi_karya ?>
    </div>
</div>