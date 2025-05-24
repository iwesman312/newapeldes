<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kejadian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Kejadian</h1>
        <form id="reportForm">
            <label for="nama_pelapor">Nama Pelapor:</label>
            <input type="text" id="nama_pelapor" name="nama_pelapor" placeholder="Masukkan nama Anda" required>

            <label for="no_hp_pelapor">Nomor Telepon:</label>
            <input type="tel" id="no_hp_pelapor" name="no_hp_pelapor" placeholder="Masukkan nomor telepon Anda" required>

            <button type="button" onclick="submitReport()">Kirim Laporan</button>
        </form>
        <div class="footer">
            &copy; 2025 Sistem Pelaporan Kejadian | <a href="#">Kebijakan Privasi</a>
        </div>
    </div>

    <script>
        function submitReport() {
            const nama = document.getElementById('nama_pelapor').value;
            const noHp = document.getElementById('no_hp_pelapor').value;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    fetch('send_wa_laporan.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `nama_pelapor=${nama}&no_hp_pelapor=${noHp}&latitude=${latitude}&longitude=${longitude}`
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error('Error:', error));
                }, () => {
                    alert("Lokasi tidak dapat diakses. Pastikan izin lokasi diaktifkan.");
                });
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }
    </script>
</body>
</html>
