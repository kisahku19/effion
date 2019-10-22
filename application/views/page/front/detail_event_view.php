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
<style>
.row-split {
  #max-width: 800px;
  margin: 0 auto;
  column-width: 35em;
}
</style>
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
            <h5>Tanggal : <?= date("d-F-Y", strtotime($detail_event->tanggal)) ?></h5>
            <h5>Dibuat Oleh : <?= $detail_event->nama_admin ?></h5>
            <h5>Kategori Event : <?= $detail_event->nama_kategori ?></h5>

        </div>
    </div>
</div>
<p></p>
<div class="row row-split">
    <div class="col-md-12">
        <div class="project-info-detail"><br>
            <h3>Isi Event</h3><br>
            <?= $detail_event->isi_event ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 no-padding comments">
        <div class="comment-head"><?= $jumlah_comment ?> Komentar</div>
        <?php if ($jumlah_comment > 0) { 
            $j=1;
            ?>
            <?php foreach ($list_comment as $value) { 
                if($j==4){ ?>
                    <div id="parshowhide" style="display:none">
                <?php }
                ?>
                    <div class="comment-content-main">
                        <div class="col-md-7 comment-content">
                            <div class="comment-meta">
                                <span class="comment-author"><?= $value->nama ?></span>
                                <span class="comment-date"><?= $value->waktu ?></span>
                            </div>
                            <div class="comment-excerpt">
                                <?= $value->isi_komentar ?><br>
                            </div>
                            <div>
                                <?php $balasan = $this->db->where(['id_forum' => $detail_forum->id_forum, 'id_parent_komentar_forum' => $value->id_komentar_forum])->order_by('waktu','desc')->get('komentar_forum'); ?>
                                <?php if ($balasan->num_rows() > 0) : ?>
                                    <br>
                                    <h5><b>Balasan:</h5></b>
                                    <hr>
                                    <?php 
                                    $i=1;
                                    $display='';
                                    foreach ($balasan->result() as $key => $balas) : 
                                        if($i==4) {
                                    ?>
                                        <div id="showhide-<?=$value->id_komentar_forum?>" style="display:none">
                                        <?php } ?>
                                        <div class="panel panel-success" style="margin-left:30px;">
                                            <div class="panel-body" style="vertical_align:middle;">
                                                <span style="font-size:21px;font-family:bitter;"><?= $balas->nama ?></span>
                                                <span style="color:#92a5a1;font-family: Open Sans; margin-left: 25px;"> <?= $balas->waktu ?> </span>
                                                <hr>
                                                <?= $balas->isi_komentar ?>
                                            </div>
                                        </div>
                                    <?php 
                                    $i++;
                                    endforeach; ?>
                                    <?php if($balasan->num_rows()>3) { ?>
                                    </div>
                                    <?php } ?>
                                <?php endif; ?>
                            </div>
                            <?php if($balasan->num_rows()>3) { ?>
                            <div class="col-md-7 comment-content" style="margin-left:18px;">
                                <span>
                                    <button class="button_style1" id="button_showhide-<?=$value->id_komentar_forum?>" onclick="showBalasan(<?=$value->id_komentar_forum?>)">Selengkapnya....</button>
                                </span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-5 comment-content">
                            <?php if (isset($_SESSION['username_anggota'])) { ?>
                            <span>
                                <a class="button_style2" data-toggle="modal" href='#<?= $value->id_komentar_forum ?>'>Balas</a>
                            </span>
                            <?php } else { ?>
                            <span>
                                <a class="button_style2"href='<?= base_url()?>front/login'>Balas</a>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                    <form method="post" action="<?= base_url('komentar/balas_komentar_event/' . $detail_event->id_event) ?>">
                        <div class="modal fade" id="<?= $value->id_komentar_forum ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Balas Komentar <?= $value->nama ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_forum" value="<?= $detail_forum->id_forum ?>" />
                                        <textarea name="isi_komentar" id="addComment" row="8" placeholder="balas komentar" class='form-control'></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Balas</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            <?php $j++; } ?>
            <?php if($jumlah_comment>3) { ?>
                                    </div>
                                    <?php } ?>
            <?php if($jumlah_comment>3) { ?>
                <div class="row">
            <div class="col-md-7 comment-content" style="margin-left:18px;">
                <span>
                    <button class="button_style1" id="button_parshowhide" onclick="showComment()">Selengkapnya....</button>
                </span>
            </div>
            </div><br>
            <?php } ?>
        <?php } 
        ?>
    </div>
    <!-- Post Comments-->

    <!-- Post Comment form -->
    <?php //if (isset($_SESSION['username_anggota'])) { ?>
    <div class="col-md-12 comment-form">
        <div class="comment-head">Tulis Komentar:</div>
        <form method="post" action="<?= base_url('front/buat_komentar_event/'. $detail_event->id_event) ?>">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" value="<?= $detail_forum->id_forum ?>" name="id_forum">
                    <textarea class="form-control" <?php if (!isset($_SESSION['username_anggota'])) { echo "disabled"; }?> id="addComment" rows="8" placeholder="your message" name="isi_komentar"></textarea>
                    <?php if (isset($_SESSION['username_anggota'])) { ?>
                        <button type="submit" class="button_style1">Kirim Komentar</button>
                    <?php } else { ?>
                        <button type="submit" href="<?= base_url()?>front/login" class="button_style1">Login</button>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
    <?php //} ?>
</div>
<script>
function showBalasan(id) {
  var x = document.getElementById("showhide-"+id);
  if (x.style.display === "none") {
    //x.style.display = "block";
    $("#showhide-"+id).show(2000);
    document.getElementById('button_showhide-'+id).innerText = 'Tutup';
  } else {
    //x.style.display = "none";
    $("#showhide-"+id).hide(2000);
    document.getElementById('button_showhide-'+id).innerText = 'Selengkapnya....';
  }
}
function showComment() {
  var x = document.getElementById("parshowhide");
  if (x.style.display === "none") {
    //x.style.display = "block";
    $("#parshowhide").show(2000);
    document.getElementById('button_parshowhide').innerText = 'Tutup';
  } else {
    //x.style.display = "none";
    $("#parshowhide").hide(2000);
    document.getElementById('button_parshowhide').innerText = 'Selengkapnya....';
  }
}
</script>