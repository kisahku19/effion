<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?= $title?>
                </h5>
            </div>
            <table class="table table-responsive" id="table-menu">
                <thead>
                    <tr>
                        <td>ID MENU</td>
                        <td>LABEL</td>
                        <td>LINK</td>
                        <td>ICON</td>
                        <td>GRUP</td>
                        <td>PARENT</td>
                        <td>SORT</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modal-menu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Form Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group row">
                        <label for="" class="col-md-3">Label Menu</label>
                        <div class="col-md-8">
                            <input type="text" name="label" id="label" class="form-control">
                            <input type="hidden" name="id_menu" id="id_menu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Link Menu</label>
                        <div class="col-md-8">
                            <input type="text" name="link" id="link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Icon Menu</label>
                        <div class="col-md-6">
                            <input type="text" name="icon" id="icon" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Group</label>
                        <div class="col-md-7">
                            <input type="text" name="group" id="group" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Parent Menu</label>
                        <div class="col-md-5">
                           <select id="parent" class="form-control">
                               <option selected>-- Pilih Parent --</option>
                               <?php
                                    foreach ($parent_menu as $value) {?>
                                       <option value="<?= $value->id_menu?>"><?= $value->label;?></option>
                                   <?php }
                               ?>
                               <option value="0">No Parent</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-3">Sort Menu</label>
                        <div class="col-md-5">
                            <input type="text" name="sort" id="sort" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="simpan-menu">Save</button>
            </div>
        </div>
    </div>
</div>

