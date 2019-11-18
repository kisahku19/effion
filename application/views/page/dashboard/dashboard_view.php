<div class="row">
    <h5><b>LAPORAN</h5><b>
        <div class="col-md-3">
            <div class="panel bg-teal-400">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="<?= base_url() ?>anggota" class="btn btn-rounded btn-icon btn-hover text-white">
                                <i class="icon icon-users icon-3x"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-bold">
                                <a href="<?= base_url() ?>anggota" style="color:#fff">Anggota</a>
                            </div>
                            <div class="text-muted">
                                <a href="<?= base_url() ?>anggota" style="color:#fff"><?= $total_anggota; ?> Orang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel bg-blue-600">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="<?= base_url() ?>event" class="btn btn-rounded btn-icon btn-hover text-white">
                                <i class="icon icon-calendar icon-3x"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-bold">
                                <a href="<?= base_url() ?>event" style="color:#fff">Event</a>
                            </div>
                            <div class="text-muted">
                                <a href="<?= base_url() ?>event" style="color:#fff"><?= $total_event ?> Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel bg-danger-600">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="<?= base_url() ?>project" class="btn btn-rounded btn-icon btn-hover text-white icon-bordered">
                                <i class="icon icon-grid5 icon-3x"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-bold">
                                <a href="<?= base_url() ?>project" style="color:#fff">Project</a>
                            </div>
                            <div class="text-muted">
                                <a href="<?= base_url() ?>project" style="color:#fff"><?= $total_project ?> Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel bg-indigo-400">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="<?= base_url() ?>training" class="btn btn-rounded btn-icon btn-hover text-white">
                                <i class="icon icon-list icon-3x"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-bold">
                                <a href="<?= base_url() ?>training" style="color:#fff">Training</a>
                            </div>
                            <div class="text-muted">
                                <a href="<?= base_url() ?>training" style="color:#fff"><?= $total_training; ?> Training</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel bg-grey-400">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="<?= base_url() ?>unggah_karya" class="btn btn-rounded btn-icon btn-hover text-white">
                                <i class="icon icon-accessibility icon-3x"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-bold">
                                <a href="<?= base_url() ?>unggah_karya" style="color:#fff">Karya</a>
                            </div>
                            <div class="text-muted">
                                <a href="<?= base_url() ?>unggah_karya" style="color:#fff"><?= $total_karya; ?> karya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="col-md-3">
        <div class="panel bg-brown-300">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                        <a href="<?= base_url() ?>forum" class="btn btn-rounded btn-icon btn-hover text-white">
                            <i class="icon icon-users4 icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            <a href="<?= base_url() ?>forum" style="color:#fff">Forum</a>
                        </div>
                        <div class="text-muted">
                            <a href="<?= base_url() ?>forum" style="color:#fff"><?= $total_forum; ?> Forum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->
</div>
<p></p>

<!-- <div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">
                    Grafik Forum
                </h5>
            </div>
            <div class="panel-body">
                <div id="graph"></div>
            </div>
        </div>
    </div>
</div> -->
<script type="text/javascript">
    Morris.Bar({
        element: 'graph',
        data: <?php echo $graph; ?>,
        xkey: 'tanggal_asli',
        ykeys: ['total'],
        labels: ['Total']
    });
</script>