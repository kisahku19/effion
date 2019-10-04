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
            url: "<?= base_url() ?>front/tambah_rating_event",
            data: 'id=' + id + '&rating=' + $('#rate-0 #rating').val(),
            type: "POST"
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
                <img src="<?= base_url() ?>foto_event/<?= $detail_event->gambar?>" alt="" style="width: 80%; height: 600px;"/>
            </ul>
        </div>
    </div>
    <!-- Portfolio single - Slider -->

    <!-- Project Info -->
    <div class="col-md-4">
        <div class="portfolio-meta">
            <h5>Rating</h5>
            <div id='rate-0'>
                <input type='hidden' name='rating' id='rating' value='<?= $detail_event->rating ?>'>
                <ul onMouseOut="resetRating(<?= $detail_event->id_event ?>)">
                    <?php for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $detail_event->rating) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        } ?>
                        <li class='<?= $selected ?>' onmouseover="highlightStar(this,<?= $detail_event->id_event ?>)" onmouseout="removeHighlight(<?= $detail_event->id_event ?>);" onClick="addRating(this, <?= $detail_event->id_event ?>)">&#9733;</li>
                    <?php    }
                echo "</ul>";
                ?>
            </div>
            <h5>Tanggal : <?= $detail_event->tanggal ?></h5>
            <h5>Dibuat Oleh : <?= $detail_event->nama_admin ?></h5>

        </div>
    </div>
</div>
<p></p>
<div class="row">
    <div class="col-md-12">
        <div class="project-info-detail"><br>
            <h3>Isi Event</h3><br>
            <?= $detail_event->isi_event ?>
        </div>
    </div>

</div>