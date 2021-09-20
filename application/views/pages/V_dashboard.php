<div class="container">
    <div class="card" style="border-radius: 10px;">
        <div class="card-body">
            <h2>Cari Data Balita</h2>
            <hr class="my-2">
        </div>

        <div class="m-3">
            <div class="lookup lookup-huge">
                <input type="text" name="cari" autocomplete="off" autofocus id="cari" value="<?= $this->session->flashdata('nama_balita') ?>">
            </div>
            <!-- <form action="" method="POST" class="lookup lookup-huge" id="form-cari">
            </form> -->
        </div>

        <div class="mt-1 mx-3">
            <div class="text-center" id="pesan">
                <p class="text-danger">data tidak ditemukan</p>
            </div>
            <form action="<?php echo base_url(); ?>admin/posyandu/update" method="POST" enctype="multipart/form-data" id="form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <!-- <input type="text" name="id" hidden="true"> -->
                            <input type="hidden" name="id" id="id_update">
                            <div class="form-group">
                                <label for="nama">Nama Balita</label>
                                <div class="modal-body">
                                    <img id="nama_balita_update" src="">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="satuan">Foto Barang Bukti</label>
                                <div>
                                    <img class="img-fluid mb-1" id="foto-barbuk">
                                </div>
                                <div class="input-group file-group">
                                    <input id="barbuk_update" type="text" class="form-control file-value" placeholder="Choose file..." readonly="">
                                    <input id="barbuk_update" type="file" multiple="" name="bukti">
                                    <span class="input-group-append">
                                        <button class="btn btn-light file-browser" type="button"><i class="fa fa-upload"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="satuan">Nama Balita</label>
                                <input type="text" class="form-control" id="nama_balita_update" name="nama_balita" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin_update" name="jenis_kelamin" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu_update" name="nama_ibu" required>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <textarea class="form-control" id="usia_update" name="usia"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Berat Badan</label>
                                <input type="text" class="form-control" id="berat_badan_update" name="berat_badan" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Tinggi Badan</label>
                                <input type="text" class="form-control" id="tinggi_badan_update" name="tinggi_badan" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Lingkar Kepala</label>
                                <input type="text" class="form-control" id="lingkar_kepala_update" name="lingkar_kepala" required>
                            </div>
                          
                            <div class="form-group">
                                <label for="select">Imunisasi</label>
                                <select id="imunisasi_update" class="form-control" name="imunisasi">
                                    <option selected disabled>Imunisasi</option>
                                    <?php foreach ($imunisasi->result() as $row_imunisasi) { ?>
                                        <option value="<?php echo $row_kategori->id; ?>"><?php echo $row_imunisasi->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select">Status Gizi</label>
                                <select class="form-control" id="status_gizi_update" name="status_gizi">
                                    <option selected disabled>Status Gizi</option>
                                    <?php foreach ($status_gizi->result() as $row_status_gizi) { ?>
                                        <option value="<?php echo $row_status_gizi->id; ?>"><?php echo $row_status_gizi->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="select">Status Pengambilan</label>
                                <select class="form-control" id="status_pengambilan_update" name="status_pengambilan">
                                    <option selected disabled>Status Pengambilan</option>
                                    <option value="belum diantar">Belum diantar</option>
                                    <option value="sudah diantar">Sudah diantar</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function hidden() {
        $('#form-data').hide();
        $('#pesan').hide();
    }

    $(document).ready(function() {
        hidden();
    });

    $('#cari').keyup(function() {
        var data = $('#cari').val();
        if (data == '') {
            hidden();
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('posyandu/search') ?>",
                data: {
                    cari: data,
                },
                dataType: 'JSON',
                success: function(respon) {
                    if (respon != null) {
                        $('#pesan').hide();
                        $('#form-data').show();
                        $("#id_update").val(respon.id);
                        $("#nama_balita_update").val(respon.nama_balita);
                        $("#jenis_kelamin_update").val(respon.jenis_kelamin);
                        $("#nama_ibu_update").val(respon.nama_ibu);
                        $("#usia_update").val(respon.usia);
                        $("#berat_badan_update").val(respon.berat_badan);
                        $("#tinggi_badan_update").val(respon.tinggi_badan);
                        $("#lingkar_kepala_update").val(respon.lingkar_kepala);
                       
                        $('#imunisasi_update option[value="' + respon.imunisasi + '"]').prop('selected', true);
                        $('#status_gizi_update option[value="' + respon.status_gizi + '"]').prop('selected', true);
                        
                    } else {
                        $('#pesan').show();
                    }
                },
            });
        }
        // console.log(data);
    });
</script>