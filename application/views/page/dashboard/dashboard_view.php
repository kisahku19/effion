<div class="row">
    <h5><b>LAPORAN</h5><b>
    <div class="col-md-3">
        <div class="panel bg-teal-400">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                        <a class="btn btn-rounded btn-icon btn-hover text-white">
                            <i class="icon icon-users icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            Anggota
                        </div>
                        <div class="text-muted">
                            <?= $total_anggota; ?> Orang
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
                        <a class="btn btn-rounded btn-icon btn-hover text-white">
                            <i class="icon icon-calendar icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            Event
                        </div>
                        <div class="text-muted">
                            <?= $total_event ?> Event
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
                        <a class="btn btn-rounded btn-icon btn-hover text-white icon-bordered">
                            <i class="icon icon-grid5 icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            Project
                        </div>
                        <div class="text-muted">
                            <?= $total_project ?> Project
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
                        <a class="btn btn-rounded btn-icon btn-hover text-white">
                            <i class="icon icon-list icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            Training
                        </div>
                        <div class="text-muted">
                            <?= $total_training; ?> Training
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
                        <a class="btn btn-rounded btn-icon btn-hover text-white">
                            <i class="icon icon-accessibility icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            Karya
                        </div>
                        <div class="text-muted">
                            <?= $total_karya; ?> karya
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel bg-brown-300">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                        <a class="btn btn-rounded btn-icon btn-hover text-white">
                            <i class="icon icon-users4 icon-3x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-bold">
                            Forum
                        </div>
                        <div class="text-muted">
                            <?= $total_forum; ?> Forum
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
<div class="row">
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
</div>
<script type="text/javascript">
    Morris.Bar({
        element: 'graph',
        data: <?php echo $graph; ?>,
        xkey: 'tanggal_asli',
        ykeys: ['total'],
        labels: ['Total']
    });
</script>