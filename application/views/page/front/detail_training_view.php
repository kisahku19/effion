<script>
    function highlightStar(obj, id) {
        removeHighlight(id);
        $('#rate-0 li').each(function(index) {
            $(this).addClass('highlight');
            if (index == $('#rate-' + id + ' li').index(obj)) {
                return false;
            }
        });
    }

    // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
    function removeHighlight(id) {
        $('#rate-0 li').removeClass('selected');
        $('#rate-0 li').removeClass('highlight');
    }

    function addRating(obj, id) {
        $('#rate-0 li').each(function(index) {
            $(this).addClass('selected');
            $('#rate-0 #rating').val((index + 1));
            if (index == $('#rate-0 li').index(obj)) {
                return false;
            }
        });
        $.ajax({
                url: "<?= base_url() ?>front/tambah_rating_training",
                data: 'id=' + id + '&rating=' + $('#rate-0 #rating').val(),
                type: "POST"
            })
            .done(function(data) {
                alert('Berhasil memberi rating');
                window.location.reload();
            });
    }

    function resetRating(id) {
        if ($('#rate-0 #rating').val() != 0) {
            $('#rate-0 li').each(function(index) {
                $(this).addClass('selected');
                if ((index + 1) == $('#rate-0 #rating').val()) {
                    return false;
                }
            });
        }
    }
</script>

<div class="row">
    <div class="col-md-8">
        <div id="portfolio-slider" class="flexslider">
            <ul class="slides"><center>
                <img src="<?= base_url() ?>foto_training/<?= $detail_training->gambar ?>" alt="" style="width: 70%; height: 600px;"/>

            </ul>
        </div>
    </div>
    <!-- Portfolio single - Slider -->

    <!-- Project Info -->
    <div class="col-md-4">
        <div class="portfolio-meta">
            <h5>Rating</h5>
            <input type='hidden' name='rating' id='rating' value='<?= $detail_training->rating ?>'>
            <!--ul onMouseOut="resetRating(<?= $detail_training->id_training ?>)">
                    <?php for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $detail_training->rating) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        } ?>
                        <li class='<?= $selected ?>' onmouseover="highlightStar(this,<?= $detail_training->id_training ?>)" onmouseout="removeHighlight(<?= $detail_training->id_training ?>);" onClick="addRating(this, <?= $detail_training->id_training ?>)">&#9733;</li>
                    <?php    } ?>
                </ul-->
            <ul>
                <li class='selected' style='font-size:30px'>&#9733;</li><span style='font-size:25px'><?= $avg_rating ?></span>(<?= $total_rating ?>)
            </ul>
            <?php if (isset($_SESSION['username_anggota'])) {
                if ($cek_rating == 1) { ?>
                    <ul>
                        <ul style="display:block" id='addRating'>
                            <?php for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= floor($avg_rating)) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                        ?>
                                <li class="<?= $selected ?>" title="Anda sudah memberikan rating">&#9733;</li>
                            <?php    } ?>
                        </ul>
                    </ul>
                <?php
                    } else {
                        ?>
                    <div id='rate-0'>
                        <input type='hidden' name='rating' id='rating' value='<?= $detail_training->rating ?>'>
                        <ul>
                            <ul style="display:block" id='addRating'>
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <li onmouseover="highlightStar(this,<?= $detail_training->id_training ?>)" onmouseout="removeHighlight(<?= $detail_training->id_training ?>)" onClick="addRating(this, <?= $detail_training->id_training ?>)">&#9733;</li>
                                <?php    } ?>
                            </ul>
                        </ul>
                    </div>
                <?php
                    }
                } else { ?>
                <ul>
                    <a href="<?= base_url() ?>front/login">Silahkan login untuk memberi rating</a>
                    <ul style="display:block" id='addRating'>
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <a href="<?= base_url() ?>front/login">
                                <li>&#9733;</li>
                            </a>
                        <?php    } ?>
                    </ul>
                </ul>
            <?php } ?>

            <h5><?= floor($avg_rating) ?> dari <?= $total_rating ?></h5>
            <h5>Tanggal : <?= date("d-m-Y", strtotime($detail_training->tanggal)) ?></a></h5>
            <h5>Dibuat Oleh : <?= $detail_training->nama_admin ?></a></h5>
        </div>
    </div>
    
</div>
<div class="row">
<div class="project-info-detail col-md-12"><br>
            <h3>Isi Training</h3><br>
            <?= $detail_training->isi_training ?>
           <center><a href="https://api.whatsapp.com/send?phone=62895610840047&text=Hello,%20saya%20mau%20Ikut%20%20Training%20Dong..." class="btn btn-info">Daftar Whatsapp</a>
             
        </div>
</div>