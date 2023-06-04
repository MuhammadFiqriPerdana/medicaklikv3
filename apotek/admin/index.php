<?php include 'sidebar.php'; ?>
<!-- isinya -->
<?php
$i1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(qty) as totqty FROM laporan WHERE toko = '" . $_SESSION['toko'] . "'"));
$i2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(qty*harga_modal) as totdpt FROM laporan WHERE toko = '" . $_SESSION['toko'] . "'"));
$i3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(subtotal-qty*harga_modal) as totdpt1 FROM laporan WHERE toko = '" . $_SESSION['toko'] . "'"));
$i4 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(subtotal) as isub FROM laporan WHERE toko = '" . $_SESSION['toko'] . "'"));
?>
<h1 class="h3 mb-2">Data Laporan</h1>
<div class="row">

  <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pr-1 m-mb-1">
    <div class="box-laporan">
      <p class="small mb-0">Terjual</p>
      <h5 class="mb-0"><?php echo ribuan($i1['totqty']); ?></h5>
    </div>
  </div>

  <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pl-1 m-mb-1">
    <div class="box-laporan">
      <p class="small mb-0">Pendapatan</p>
      <h5 class="mb-0">Rp.<?php echo ribuan($i3['totdpt1']); ?></h5>
    </div>
  </div>

  <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pr-1">
    <div class="box-laporan">
      <p class="small mb-0">Penjualan</p>
      <h5 class="mb-0">Rp.<?php echo ribuan($i2['totdpt']); ?></h5>
    </div>
  </div>

  <div class="col-6 col-sm-6 col-md-3 col-lg-3 m-pl-1">
    <div class="box-laporan">
      <p class="small mb-0">Total</p>
      <h5 class="mb-0">Rp.<?php echo ribuan($i4['isub']); ?></h5>
    </div>
  </div>

</div>

<div class="container">
  <div class="row">
    <?php
    // Query untuk mengambil data penjualan per bulan
    $query = "SELECT DATE_FORMAT(inv.tgl_inv, '%M') AS bulan, SUM(laporan.subtotal) AS total_penjualan 
      FROM laporan 
      JOIN inv ON laporan.invoice = inv.invoice WHERE laporan.toko='Apotek Hamada Farma'
      GROUP BY bulan";


    $result = mysqli_query($conn, $query);

    // Menginisialisasi array untuk menyimpan data bulan dan total penjualan
    $bulan = array();
    $total_penjualan = array();

    // Mengambil data dari hasil query
    while ($row = mysqli_fetch_assoc($result)) {
      $bulan[] = $row['bulan'];
      $total_penjualan[] = $row['total_penjualan'];
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>

    <canvas id="penjualanChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      var ctx = document.getElementById('penjualanChart').getContext('2d');
      var chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($bulan); ?>,
          datasets: [{
            label: 'Total Penjualan',
            data: <?php echo json_encode($total_penjualan); ?>,
            backgroundColor: '#66CDAA',
            borderColor: 'black',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
  </div>
</div>


<!-- end isinya -->
<?php include 'footer.php'; ?>