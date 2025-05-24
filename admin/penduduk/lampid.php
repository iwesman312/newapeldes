<?php 
include('../part/akses.php');
include('../part/header.php');
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
        if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')) {
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
        } else if (isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')) {
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
        }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN MENU</li>
      <li class="active">
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>&nbsp;&nbsp;Penduduk</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../penduduk/"><i class="fa fa-circle-notch"></i>Data Penduduk</a></li>
          <!-- <li><a href="../penduduk/index2.php"><i class="fa fa-circle-notch"></i>Data Penduduk RT/RW</a></li> -->
          <!-- <li><a href="../penduduk/index3.php"><i class="fa fa-circle-notch"></i>Data Penduduk Mati</a></li> -->
          <li><a href="../penduduk/lampid.php"><i class="fa fa-circle-notch"></i>Lampid</a></li>
        </ul>
      </li>
      <li>
        <a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span></a>
      </li>
    </ul>
  </section>
</aside>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Laporan Lampid</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Laporan Lampid</li>
      <div style="margin: 20px 0;">
  <a href="export_pdf.php" class="btn btn-primary">
    <i class="fa fa-file-pdf"></i> Export to PDF
  </a>
</div>

    </ol>
  </section>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="table-container">
          <table id="laporan-table">
            <thead>
              <tr>
                <th>RW</th>
                <th>Total Penduduk</th>
                <th>Total Laki-laki</th>
                <th>Total Perempuan</th>
                <th>Baru Lahir</th>
                <th>Meninggal</th>
                <th>Datang</th>
                <th>Pindah</th>
                <th>Total Akhir</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div class="chart-container">
          <canvas id="laporan-chart"></canvas>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Custom Styles -->
<style>
  /* Table styling */
  .table-container {
    margin: 20px 0;
    overflow-x: auto;
  }

  #laporan-table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  #laporan-table th, #laporan-table td {
    text-align: center;
    padding: 12px;
    border: 1px solid #ddd;
  }

  #laporan-table th {
    background-color: #007bff;
    color: white;
    text-transform: uppercase;
    font-size: 14px;
  }

  #laporan-table tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  #laporan-table tr:hover {
    background-color: #f1f1f1;
  }

  /* Chart styling */
  .chart-container {
    margin-top: 30px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  canvas {
    max-width: 100%;
    height: auto;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  fetch('get_laporan.php') // File PHP untuk mengambil data laporan
    .then(response => response.json())
    .then(data => {
      const tableBody = document.querySelector('#laporan-table tbody');
      const labels = [];
      const totalPenduduk = [];

      data.forEach(row => {
        labels.push(`RW ${row.rw}`);
        totalPenduduk.push(row.total_penduduk);

        tableBody.innerHTML += `
          <tr>
            <td>${row.rw}</td>
            <td>${row.total_penduduk}</td>
            <td>${row.total_laki_laki}</td>
            <td>${row.total_perempuan}</td>
            <td>${row.jumlah_baru_lahir}</td>
            <td>${row.jumlah_meninggal}</td>
            <td>${row.jumlah_datang}</td>
            <td>${row.jumlah_pindah}</td>
            <td>${row.total_akhir}</td>
          </tr>
        `;
      });

      const ctx = document.getElementById('laporan-chart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Total Penduduk per RW',
            data: totalPenduduk,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            borderRadius: 5,
            hoverBackgroundColor: 'rgba(54, 162, 235, 0.7)'
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
              labels: {
                font: {
                  size: 14
                }
              }
            }
          },
          scales: {
            x: {
              title: {
                display: true,
                text: 'RW',
                font: {
                  size: 16,
                  weight: 'bold'
                }
              }
            },
            y: {
              title: {
                display: true,
                text: 'Jumlah Penduduk',
                font: {
                  size: 16,
                  weight: 'bold'
                }
              },
              beginAtZero: true
            }
          }
        }
      });
    });
});
</script>

<?php include('../part/footer.php'); ?>
