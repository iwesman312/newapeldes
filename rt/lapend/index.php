<?php
// Start session
session_start();
include ('../../config/koneksi.php');

// Determine user authorization
if (isset($_SESSION['lvl'])) {
    if ($_SESSION['lvl'] == 'Administrator') {
        $query = "SELECT * FROM penduduk";
    } elseif ($_SESSION['lvl'] == 'RT' && isset($_SESSION['rt'])) {
        $query = "SELECT * FROM penduduk 
          WHERE rt = '" . mysqli_real_escape_string($connect, $_SESSION['rt']) . "' 
          AND rw = '" . mysqli_real_escape_string($connect, $_SESSION['rw']) . "'";
    } else {
        $query = ""; // No access for other roles
    }
} else {
    echo "<script>alert('Unauthorized access!'); window.location.href='../../index.php';</script>";
    exit;
}

// Fetch data
$penduduk_data = [];
if (!empty($query)) {
    $result = mysqli_query($connect, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $penduduk_data[] = $row;
        }
    }
}

// Prepare data for chart
$gender_count = ['Laki-laki' => 0, 'Perempuan' => 0];
foreach ($penduduk_data as $data) {
    if ($data['jenis_kelamin'] === 'Laki-laki') {
        $gender_count['Laki-laki']++;
    } elseif ($data['jenis_kelamin'] === 'Perempuan') {
        $gender_count['Perempuan']++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penduduk</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Penduduk</h1>

    <!-- Display Table -->
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($penduduk_data)) { ?>
                <?php foreach ($penduduk_data as $row) { ?>
                    <tr>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['tempat_lahir'] . ', ' . $row['tgl_lahir']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['agama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6">No data available.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Display Chart -->
    <h2>Distribusi Jenis Kelamin</h2>
    <canvas id="genderChart" width="400" height="200"></canvas>
    <script>
        const genderData = {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [<?php echo $gender_count['Laki-laki']; ?>, <?php echo $gender_count['Perempuan']; ?>],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie',
            data: genderData,
            options: {
                responsive: true,
            }
        };

        const genderChart = new Chart(
            document.getElementById('genderChart'),
            config
        );
    </script>
</body>
</html>
