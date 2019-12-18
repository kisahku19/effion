<div class="row">
    <div class="col-md-10 col-md-offset-3">
        <form action="<?= base_url() ?>front/simpan_unggah_karya_front" method="post">
            <div class="form-group row">
                <label class="col-md-2">Nama Channel</label>
                <div class="col-md-5">
                    <input type="text" name="nama_channel" id="" class="form-control" value="<?= $record->nama_channel?>">
                    <input type="hidden" name="id_karya" id="" class="form-control" value="<?= $record->id_karya?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Tanggal</label>
                <div class="col-md-5">
                    <input type="date" data-date="" id="tanggal" data-date-format="dd-mm-YYYY" value="<?= $record->tanggal?>" name="tanggal" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Isi Karya</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="desc_karya" name="isi_karya"><?= $record->isi_karya?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Video</label>
                <div class="col-md-5">
                    <input type="text" name="video" id="" class="form-control" value="<?= $record->video?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="btn-group btn-group-lg">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </div>
        </form>

    </div>
</div>