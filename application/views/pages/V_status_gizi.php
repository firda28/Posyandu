<div class="col-12">

    <!--ALERT-->
    <?php if ($this->session->flashdata('alert')) {
        $dataalert = explode("|", $this->session->flashdata('alert'));
        $status = $dataalert[0];
        $message = $dataalert[1];
    ?>
        <div class="alert alert-<?php echo $status; ?>">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <?php if ($this->session->flashdata('alert2')) {
        $dataalert = explode("|", $this->session->flashdata('alert2'));
        $status = $dataalert[0];
        $message = $dataalert[1];
    ?>
        <div class="alert alert-<?php echo $status; ?>">
            <?php echo $message; ?>
        </div>
    <?php } ?>
    <!--END ALERT-->

    <div class="card" style="border-radius: 10px;">
        <div class="card-body">
            <h2>List Status Gizi <button class="btn btn-warning btn-round pull-right" data-toggle="modal" data-target="#modal-add">Add status gizi</button></h2>
            <hr class="my-2">

            <div class="m-10">
                <table data-provide="datatables" class="table table-bordered table-lg table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 20px;">No</th>
                            <th>Warna</th>
                            <th>Keterangan</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($listdata->result() as $row_data) { ?>
                            <tr>
                                <th class="text-center" scope="row"><?php echo $i; ?></th>
                                <td><?php echo $row_data->warna; ?></td>
                                <td><?php echo $row_data->keterangan; ?></td>
                                <td class="text-center">
                                    <div class="btn-group ">
                                        <button class="btn btn-info btn-sm btn-round dropdown-toggle" data-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="getview('<?php echo $row_data->id; ?>')"><i class="fa fa-edit"></i> Edit Data</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" onclick="deletenow('<?php echo $row_data->id; ?>', '<?php echo $row_data->warna; ?>')"><i class="fa fa-trash"></i> Hapus Data</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal modal-center fade" id="modal-add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/status_gizi/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" class="form-control" id="warna" name="warna" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal modal-center fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/status_gizi/update" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_update">ID</label>
                        <input type="text" class="form-control" id="id_update" name="id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_update">Warna</label>
                        <input type="text" class="form-control" id="nama_update" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan_update">Keterangan</label>
                        <input type="text" class="form-control" id="satuan_update" name="satuan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal modal-center fade" id="modal-delete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/status_gizi/delete" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_delete" name="id">
                    <h3>Apakah anda yakin ingin menghapus data <b id="id_delete_display">-</b></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Delete Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function getview(id) {
        $.getJSON("<?php echo base_url(); ?>admin/status_gizi/view/" + id, function(data) {
            // console.log(data);
            $("#id_update").val(data.id);
            $("#nama_update").val(data.warna);
            $("#satuan_update").val(data.Keterangan);
        });
    }

    function deletenow(id, warna) {
        $("#id_delete").val(id);
        $("#id_delete_display").html(warna);
    }
</script>