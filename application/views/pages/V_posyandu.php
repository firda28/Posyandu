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
            <h2>List Data Balita <button class="btn btn-warning btn-round pull-right" data-toggle="modal" data-target="#modal-add">Add Data Balita</button></h2>
            <hr class="my-2">

            <div class="m-10">
                <table data-provide="datatables" class="table table-bordered table-lg table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Balita</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Ibu</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia Balita</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Lingkar Kepala</th>
                            <th>Imunisasi</th>
                            <th>Kelainan</th>
                            <th>Status Gizi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   <tbody>
                        <?php $i = 1;
                        foreach ($listdata->result() as $row_data) { ?>
                            <tr>
                                <th class="text-center" scope="row"><?php echo $i; ?></th>
                                <!-- <td><?php echo $row_data->id; ?></td> -->
                               <td><?php echo $row_data->nama_balita; ?></td>
                                <td><?php echo $row_data->jenis_kelamin; ?></td>
                                <td><?php echo $row_data->nama_ibu; ?></td>
                                <td><?php echo $row_data->tgl_lahir; ?></td>
                                <td><?php echo $row_data->usia_balita; ?></td>
                                <td><?php echo $row_data->berat_badan; ?></td>
                                <td><?php echo $row_data->tinggi_badan; ?></td>
                                <td><?php echo $row_data->lingkar_kepala; ?></td>
                                <td><?php echo $row_data->imunisasi; ?></td>
                                <td><?php echo $row_data->kelainan; ?></td>
                                <td><?php echo $row_data->status_gizi; ?></td>
                                <td>
                                    <div class="btn-group ">
                                        <button class="btn btn-info btn-sm btn-round dropdown-toggle" data-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" onclick="cetak('<?php echo $row_data->id; ?>')"><i class="fa fa-qrcode"></i> Cetak </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="getview('<?php echo $row_data->id; ?>')"><i class="fa fa-edit"></i> Edit Data</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" onclick="deletenow('<?php echo $row_data->id; ?>')"><i class="fa fa-trash"></i> Hapus Data</a>
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

<div id="cetak" style="display: none;">
    <div class="container-fluid">
        <div class="mx-auto mb-5">
            <h1>Desa Karangrejo</h1>
            <h2>Pengelolaan Data Posyandu</h2>
            <br>
            <br>
            <br>
            <br>
        </div>
        <img src="" id="cetak" width="100%">
        <div class="text-center" id="text-cetak">

        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-add" tabindex="-1">
    <div class="modal-dialog modal-lg modal-center">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/posyanduu/add" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Data Balita</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="satuan">ID</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Nama Balita</label>
                                <input type="text" class="form-control" id="nama_balita" name="nama_balita" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Nama Ibu</label>
                                <textarea class="form-control" id="nama_ibu" name="nama_ibu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Tanggal Lahir </label>
                                <textarea class="form-control" id="tanggal_lahir" name="tanggal_lahir"></textarea>
                            </div>
                             <div class="form-group">
                                <label for="satuan">Usia Balita </label>
                                <textarea class="form-control" id="usia_balita" name="usia_balita"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="satuan">Berat Badan</label>
                                <input type="text" class="form-control" id="berat_badan" name="berat_badan" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Tinggi Badan</label>
                                <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Lingkar_Kepala</label>
                                <input type="text" class="form-control" id="lingkar_kepala" name="lingkar_kepala" required>
                            </div>
                            <div class="form-group">
                                <label for="select">Imunisasi</label>
                                <select class="form-control" id="imunisasi" name="imunisasi">
                                    <option selected disabled>Imunisasi</option>
                                    <?php foreach ($vaksin->result() as $row_imunisasi) { ?>
                                        <option value="<?php echo $row_imunisasi->id; ?>"><?php echo $row_imunisasi->vaksin; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="select">Kelainan</label>
                                <select class="form-control" id="kelainan" name="kelainan">
                                    <option selected disabled>Kelainan</option>
                                    <?php foreach ($kelainan->result() as $row_kelainan) { ?>
                                        <option value="<?php echo $row_kelainan->id; ?>"><?php echo $row_kelainan->nama_kelainan; ?></option>
                            
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select">Status Gizi</label>
                                <select class="form-control" id="status_gizi" name="status_gizi">
                                    <option selected disabled>Status Gizi</option>
                                    <?php foreach ($warna->result() as $row_status_gizi) { ?>
                                        <option value="<?php echo $row_status_gizi->id; ?>"><?php echo $row_status_gizi->warna; ?></option>
                            
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
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

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-lg modal-center">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/posyanduu/update" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <!-- <input type="text" name="id" hidden="true"> -->
                            <input type="hidden" name="id" id="id_update">
                           <!--  <div class="form-group">
                                <label for="nama">QRCode</label>
                                <div class="modal-body">
                                    <img id="qrcode_update" src="">
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="satuan">NIK Balita</label>
                                <input type="text" class="form-control" id="nik_balita" name="nik_balita" required>
                            </div> -->
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
                                <textarea class="form-control" id="nama_ibu_update" name="nama_ibu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Tanggal Lahir</label>
                                <textarea class="form-control" id="tanggal_lahir_update" name="tanggal_lahir"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Usia balita</label>
                                <textarea class="form-control" id="usia_balita_update" name="usia_balita"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="satuan">Berat Badan</label>
                                <input type="text" class="form-control" id="berat_badan_update" name="berat_badan" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Tinggi Badan</label>
                                <input type="text" class="form-control" id="tinggi_badan_update" name="tinggi-badan" required>
                            </div>
                             <div class="form-group">
                                <label for="satuan">Lingkar Kepala</label>
                                <input type="text" class="form-control" id="lingkar_kepala_update" name="lingkar_kepala" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Imunisasi</label>
                                <input type="text" class="form-control" id="imunisasi_update" name="imunisasi" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Kelainan</label>
                                <input type="text" class="form-control" id="kelainan_update" name="kelainan" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Status Gizi</label>
                                <input type="text" class="form-control" id="status_gizi_update" name="status_gizi" required>
                            </div>   
                        </div>
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


<!-- Modal Delete -->
<div class="modal modal-center fade" id="modal-delete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/posyanduu/delete" method="POST">
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

</div>

<!-- Modal Lihat Berkas -->
<!-- <div class="modal modal-center fade" id="modal-gambar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Berkas Barbuk</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="gambar">
            </div>
        </div>
    </div>
</div> -->

<script>
    function getview(id) {
        $.getJSON("<?php echo base_url(); ?>admin/posyandu/view/" + id, function(data) {
            $("#id_update").val(data.id);
            $("#nama_balita_update").val(data.nama_balita);
            $("#nama_ibu_update").val(data.nama_ibu);
            $("#tanggal_lahir_update").val(data.tanggal_lahir);
            $("#usia_balita_update").val(data.usia_balita);
            $("#berat_badan_update").val(data.berat_badan);
            $("#tinggi_badan_update").val(data.tinggi_badan);
            $("#lingkar_kepala_update").val(data.lingkar_kepala);
            $('#imunisasi_update option[value="' + data.imunisasi + '"]').prop('selected', true);
            $('#kelainan_update option[value="' + data.kelainan + '"]').prop('selected', true);
            $('#status_gizi_update option[value="' + data.status_gizi + '"]').prop('selected', true);
    
    
            
            // var values = data.jaksa
            // // console.log(values.split("|"));
            // $.each(values.split("|"), function(i, e) {
            //     $("#jaksa_update option[value='" + e + "']").prop("selected", true);
            // });
        });
    }

    function deletenow(id) {
        $("#id_delete").val(id);
        $("#id_delete_display").html(id);
    }

    function cetak(data) {
        $('#data').attr('src', '<?= base_url("admin/dashboard?data=") ?>' + data);
        // $('#text-barcode').html('<h2>' + data + '</h2>');
        var prtContent = document.getElementById("cetak");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
    // $('#btnShowBc').click(function(){
    //     $('#barcode').attr('src','https://bwipjs-api.metafloor.com/?bcid=code128&text='+);
    // });

    // function showbc(data) {
    //     $('#barcode').attr('src', 'https://bwipjs-api.metafloor.com/?bcid=code128&text=' + data);
    // }
</script>