<!DOCTYPE html>
<html lang="en">
<?php 
  include ('part/header.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Warga</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Input Data Warga</h2>
        <form action="proses.php" method="post" enctype="multipart/form-data" id="wargaForm">
            <div class="form-group">
                <label for="no_kk">No KK:</label>
                <input type="number" class="form-control" id="no_kk" name="no_kk" required>
            </div>
            <div id="wargaContainer">
                <div class="warga-entry border p-3 mb-3">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nik">Nik:</label>
                            <input type="number" class="form-control" name="nik[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" name="nama[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" name="tempat_lahir[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir:</label>
                            <input type="text" class="form-control datepicker" name="tgl_lahir[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="jalan">Jalan:</label>
                            <input type="text" class="form-control" name="jalan[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="rt">Rt:</label>
                            <input type="number" class="form-control" name="rt[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rw">Rw:</label>
                            <input type="number" class="form-control" name="rw[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="desa">Desa:</label>
                            <input type="text" class="form-control" name="desa[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kecamatan">Kecamatan:</label>
                            <input type="text" class="form-control" name="kecamatan[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kota">Kabupaten/Kota:</label>
                            <input type="text" class="form-control" name="kota[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pend_terakhir">Pendidikan:</label>
                            <select class="form-control" name="pend_terakhir[]" required>
                                <option value="">Pilih Pendidikan</option>
                                <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                <option value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat</option>
                                <option value="SD/Sederajat">SD/Sederajat</option>
                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                <option value="SMA/SMK/Sederajat">SMA/SMK/Sederajat</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4/S1">D4/S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status[]" required>
                                <option value="">Hidup/Mati/Datang/Lahir</option>
                                <option value="Hidup">Hidup</option>
                                <option value="Mati">Mati</option>
                                <option value="Datang">Datang</option>
                                <option value="Lahir">Lahir</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input type="text" class="form-control" name="pekerjaan[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status_perkawinan">Status Perkawinan:</label>
                            <select class="form-control" name="status_perkawinan[]" required>
                                <option value="">Pilih Status Pernikahan</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status_dlm_keluarga">Status Dalam Keluarga:</label>
                            <input type="text" class="form-control" name="status_dlm_keluarga[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kewarganegaraan">Kewarganegaraan:</label>
                            <input type="text" class="form-control" name="kewarganegaraan[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="agama">Agama:</label>
                            <input type="text" class="form-control" name="agama[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_ayah">Nama Ayah:</label>
                            <input type="text" class="form-control" name="nama_ayah[]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_ibu">Nama Ibu:</label>
                            <input type="text" class="form-control" name="nama_ibu[]" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="jenis_kelamin">Jenis Kelamin:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin[0]" value="Pria" required>
                                <label class="form-check-label" for="pria">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin[0]" value="Wanita" required>
                                <label class="form-check-label" for="wanita">Wanita</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="foto_ktp">Foto KTP:</label>
                            <input type="file" class="form-control-file" name="foto_ktp[]" accept="image/*" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="foto_kk">Foto KK:</label>
                            <input type="file" class="form-control-file" name="foto_kk[]" accept="image/*" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="foto_lain">Foto Lain:</label>
                            <input type="file" class="form-control-file" name="foto_lain[]" accept="image/*">
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger remove-entry">Hapus</button>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="addWarga">Tambah Warga</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            var index = 1;

            $('#addWarga').click(function() {
                var newEntry = $('.warga-entry:first').clone();
                newEntry.find('input').each(function() {
                    $(this).val('');
                });
                newEntry.find('input[type="radio"]').each(function() {
                    var name = $(this).attr('name');
                    var newName = name.replace(/\d+/, index);
                    $(this).attr('name', newName);
                });
                newEntry.appendTo('#wargaContainer');
                index++;
            });

            $(document).on('click', '.remove-entry', function() {
                if ($('.warga-entry').length > 1) {
                    $(this).closest('.warga-entry').remove();
                } else {
                    alert('Minimal harus ada satu data warga.');
                }
            });
        });
    </script>
</body>
<?php 
  include ('part/footer.php');
?>
</html>
