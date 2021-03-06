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

    // project yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
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
                url: "<?= base_url() ?>front/tambah_rating_project",
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

<style>
    .panel-body p {
        text-align: left;
    }
</style>
<div class="row">
    <div class="col-md-8">
        <div id="portfolio-slider" class="flexslider">
            <ul class="slides">
                <li data-thumb="demo/blog/1.jpg"><iframe width="800px" height="500px" src="<?= $detail_project->video ?>"></iframe></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portfolio-meta">
            <h5>Rating</h5>
            <input type='hidden' name='rating' id='rating' value='<?= $detail_project->rating ?>'>
            <!--ul onMouseOut="resetRating(<?= $detail_project->id_project ?>)">
                    <?php for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $detail_project->rating) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        } ?>
                        <li class='<?= $selected ?>' onmouseover="highlightStar(this,<?= $detail_project->id_project ?>)" onmouseout="removeHighlight(<?= $detail_project->id_project ?>);" onClick="addRating(this, <?= $detail_project->id_project ?>)">&#9733;</li>
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
                        <input type='hidden' name='rating' id='rating' value='<?= $detail_project->rating ?>'>
                        <ul>
                            <ul style="display:block" id='addRating'>
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <li onmouseover="highlightStar(this,<?= $detail_project->id_project ?>)" onmouseout="removeHighlight(<?= $detail_project->id_project ?>)" onClick="addRating(this, <?= $detail_project->id_project ?>)">&#9733;</li>
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
            <!-- <h5><?= floor($avg_rating) ?> dari <?= $total_rating ?></h5> -->
            <h5>Tanggal : <?= date("d-m-Y", strtotime($detail_project->tanggal)) ?></h5>
            <h5>Dibuat Oleh : <?= $detail_project->nama_admin ?></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="project-info-detail col-md-12">
        <h3>Isi Project</h3>
        <?= $detail_project->isi_project ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12 no-padding comments">
        <div class="comment-head"><?= $jumlah_comment ?> Komentar</div>
        <?php if ($jumlah_comment > 0) { ?>
            <?php foreach ($list_comment as $value) { ?>
                <div class="comment-content-main">
                    <div class="col-md-7 comment-content">
                        <div class="comment-meta">
                            <span class="comment-author"><?= $value->nama ?></span>
                            <span class="comment-date"><?= date("d-m-Y H:i:s", strtotime($value->waktu)) ?></span>
                        </div>
                        <div class="comment-excerpt">
                            <?= $value->isi_komentar ?><br>
                        </div>
                        <div>
                            <?php $balasan = $this->db->where(['id_project' => $detail_project->id_project, 'id_parent_komentar_project' => $value->id_komentar_project,'status_komentar'=>1])->get('komentar_project'); ?>
                            <?php if ($balasan->num_rows() > 0) : ?>
                                <br>
                                <h5><b>Balasan:</h5></b>
                                <hr>
                                <?php foreach ($balasan->result() as $key => $balas) : ?>
                                    <div class="panel panel-success" style="margin-left:30px;">
                                        <div class="panel-body" style="vertical_align:middle;">
                                            <span style="font-size:21px;font-family:bitter;"><?= $balas->nama ?></span>
                                            <span style="color:#92a5a1;font-family: Open Sans; margin-left: 25px;"> <?= date("d-m-Y H:i:s", strtotime($value->waktu)) ?> </span>
                                            <hr>
                                            <?= $balas->isi_komentar ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-5 comment-content">
                        <?php if (isset($_SESSION['username_anggota'])) { ?>
                            <span>
                                <a class="button_style2" data-toggle="modal" href='#<?= $value->id_komentar_project ?>'>Balas</a>
                            </span>
                        <?php } else { ?>
                            <span>
                                <a class="button_style2" href='<?= base_url() ?>front/login'>Balas</a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
                <form method="post" action="<?= base_url('komentar/balas_komentar_project/' . $value->id_komentar_project) ?>">
                    <div class="modal fade" id="<?= $value->id_komentar_project ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Balas Komentar <?= $value->nama ?></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_project" value="<?= $detail_project->id_project ?>" />
                                    <textarea name="isi_komentar" id="addComment" row="8" placeholder="balas komentar" class='form-control'></textarea>
                                    <!-- <textarea name="isi_komentar" class='form-control'></textarea> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Balas</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php  } ?>
        <?php } else { }
        ?>
    </div>
    <div class="col-md-12 comment-form">
        <div class="comment-head">Tulis Komentar:</div>
        <form method="post" action="<?= base_url() ?>front/buat_komentar_project">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" value="<?= $detail_project->id_project ?>" name="id_project">
                    <textarea class="form-control" id="addComment" rows="8"  placeholder="your message" name="isi_komentar"></textarea>
                    <?php if (isset($_SESSION['username_anggota'])) { ?>
                        <button type="submit" class="button_style1">Kirim Komentar</button>
                    <?php } else { ?>
                        <button type="submit" href="<?= base_url() ?>front/login" class="button_style1">Login</button>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>