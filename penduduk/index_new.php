<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Form Input Data Penduduk</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <!-- Data Kepala Keluarga -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Data Kepala Keluarga</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                    <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                </div>
            </div>
        </div>

        <!-- Data Anggota Keluarga -->
        <div id="anggotaKeluarga">
            <div class="card mb-4 anggota">
                <div class="card-header bg-secondary text-white">Anggota Keluarga</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" name="nik[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin[]">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" name="agama[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <input type="text" class="form-control" name="status_perkawinan[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="pend_terakhir" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="pend_terakhir[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" name="kewarganegaraan[]" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Anggota -->
        <button type="button" class="btn btn-success mb-4" id="tambahAnggota">Tambah Anggota Keluarga</button>

        <!-- Upload Foto -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Upload Dokumen</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
                </div>
                <div class="mb-3">
                    <label for="foto_kk" class="form-label">Foto KK</label>
                    <input type="file" class="form-control" id="foto_kk" name="foto_kk" required>
                </div>
                <div class="mb-3">
                    <label for="foto_lain" class="form-label">Foto Lainnya</label>
                    <input type="file" class="form-control" id="foto_lain" name="foto_lain">
                </div>
            </div>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

<script>
    document.getElementById('tambahAnggota').addEventListener('click', function() {
        const anggotaTemplate = document.querySelector('.anggota').cloneNode(true);
        anggotaTemplate.querySelectorAll('input').forEach(input => input.value = '');
        document.getElementById('anggotaKeluarga').appendChild(anggotaTemplate);
    });
</script>

<footer class="text-center mt-5">
    <p>&copy; <?= date("Y"); ?> Sistem Informasi Desa</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
