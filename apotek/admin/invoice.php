<?php include 'sidebar.php'; ?>
<!-- isinya -->
<?php
$noinv = $_GET['detail'];
if (!empty($_GET['detail'])) {
} else {
  echo '<script>history.go(-1);</script>';
};
$DataInv = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan L INNER JOIN inv I ON I.invoice = L.invoice LEFT JOIN produk P ON L.kode_produk = P.kode_produk WHERE i.invoice='$noinv'"));
$Did = $DataInv['invid'];
$Didlpaoran = $DataInv['idlaporan'];
$Dbayar = $DataInv['pembayaran'];
$Dkembali = $DataInv['kembalian'];
$Datee = $DataInv['tgl_inv'];
?>
<h1 class="h3 mb-2">
  Detail
  <span class="float-right">
    <a href="transaksi.php" class="btn btn-danger btn-sm px-3 mr-1">Kembali</a>
    <button type="button" class="btn btn-primary btn-sm px-3" onclick="document.title='Invoice#<?php echo $noinv ?>';window.print()">
      Cetak</button>
  </span>
</h1>
<div class="bg-purple p-2 text-white" style="border-radius:0.25rem;">
  <div class="row">
    <div class="col-lg-6">
      <h5 class="mb-0">No. Invoice : <?php echo $noinv ?></h5>
    </div>
    <div class="col-lg-6">
      <h5 class="mb-0 date-inv">Tanggal : <?php echo $Datee ?></h5>
    </div>
  </div>
</div>
<table class="table table-striped table-sm table-bordered dt-responsive nowrap print-none" id="cart" width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Qty</th>
      <th>Subtotal</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $tot_bayar = 0;
    $data_laporan = mysqli_query($conn, "SELECT * FROM laporan L LEFT JOIN produk P ON L.kode_produk = P.kode_produk WHERE L.invoice='$noinv'");
    while ($d = mysqli_fetch_array($data_laporan)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['kode_produk']; ?></td>
        <td><?php echo $d['nama_produk']; ?></td>
        <td>Rp.<?php echo ribuan($d['harga']); ?></td>
        <td><?php echo $d['qty']; ?></td>
        <td>Rp.<?php echo ribuan($d['subtotal']); ?></td>
        <td><button type="button" class="btn btn-primary btn-xs mr-1" data-toggle="modal" data-target="#EditProduk<?php echo $Didlpaoran ?>">
            <i class="fas fa-pencil-alt fa-xs mr-1"></i>Edit
          </button></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php
$i4 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(subtotal) as isub FROM laporan L LEFT JOIN produk P ON L.kode_produk = P.kode_produk WHERE invoice='$noinv'"));
?>
<div class="row justify-content-end mt-1">

  <div class="col-sm-6 col-md-5 col-lg-4">
    <div class="bg-purple text-white p-2">
      <h6 class="mb-0">Total Item
        <span class="float-right">Rp.<?php echo ribuan($i4['isub']); ?></span>
      </h6>
    </div>
    <div class="bg-light p-2">
      <h6 class="mb-2">Pembayaran
        <span class="float-right">Rp.<?php echo ribuan($Dbayar); ?></span>
      </h6>
      <h6 class="mb-0">Kembalian
        <span class="float-right">Rp.<?php echo ribuan($Dkembali); ?></span>
      </h6>
    </div>
  </div>
</div>

<div class="modal fade" id="EditProduk<?php echo $Didlpaoran ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-0">
      <form method="post">
        <div class="modal-header bg-purple">
          <h5 class="modal-title text-white">Edit Invoice</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <input type="hidden" name="idlaporan" value="<?php echo $d['idlaporan']; ?>">
          </div>
          <div class="form-group">
            <label class="samll">Produk :</label>
            <select name="Edit_Produk1" id="barang" class="form-control select2">
              <option selected><?php echo $DataInv['nama_produk']; ?></option>
              <?php
              $data_produk = mysqli_query($conn, "SELECT * FROM produk where toko = '" . $_SESSION['toko'] . "'");
              while ($row = mysqli_fetch_array($data_produk)) {
                $idBarang = $row['idproduk'];
                $namaProduk = $row['nama_produk'];
                $kodeproduk = $row['kode_produk'];

              ?>

                <option value="<?php echo $kodeproduk ?>" idbarang="<?php echo $idBarang ?>">
                  <?php echo $namaProduk ?>
                </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="samll">Harga </label>
            <input name="Edit_Harga" id="harga" class="form-control" readonly>
          </div>

          <div class="form-group">
            <label class="samll">Jumlah </label>
            <input name="Edit_Qty" value="<?php echo $DataInv['qty'] ?>" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="SimpanEdit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- data print -->
<section id="print">
  <div class="d-none pt-5 px-5 print-show">
    <div class="text-center mb-5 pt-2">
      <h2 class="mb-3" style="font-size:60px;"><?php echo $toko ?></h2>
      <h2 class="mb-0"><?php echo $alamat ?></h2>
      <h2 class="mb-4">Telp : <?php echo $telepon ?></h2>
    </div>
    <h2 class="mb-1">Invoice : <?php echo $noinv ?>
      <span class="float-right">Kasir : <?php echo $username ?></span>
    </h2>
    <h2 class="mb-1">Tanggal : <?php echo $Datee ?></h2>
    <div class="row">
      <div class="col-12 py-3 my-3 border-top border-bottom">
        <div class="row">
          <div class="col-5">
            <h2 class="mb-0 py-1" style="font-weight:700;">Description</h2>
          </div>
          <div class="col-2">
            <h2 class="mb-0 py-1" style="font-weight:700;">Harga</h2>
          </div>
          <div class="col-2">
            <h2 class="mb-0 py-1" style="font-weight:700;">Qty</h2>
          </div>
          <div class="col-3">
            <h2 class="mb-0 py-1" style="font-weight:700;">Jumlah</h2>
          </div>
        </div>
      </div>
      <?php
      $no = 1;
      $dataprint = mysqli_query($conn, "SELECT * FROM laporan L LEFT JOIN produk P ON L.kode_produk = P.kode_produk WHERE invoice='$noinv'");
      while ($c = mysqli_fetch_array($dataprint)) {
      ?>
        <div class="col-12">
          <div class="row">
            <div class="col-5">
              <h2 class="mb-0 py-1" style="font-weight:500;"><?php echo $c['nama_produk']; ?></h2>
            </div>
            <div class="col-2">
              <h2 class="mb-0 py-1" style="font-weight:500;"><?php echo ribuan($c['harga']); ?></h2>
            </div>
            <div class="col-2">
              <h2 class="mb-0 py-1" style="font-weight:500;"><?php echo ribuan($c['qty']); ?></h2>
            </div>
            <div class="col-3">
              <h2 class="mb-0 py-1" style="font-weight:500;"><?php echo ribuan($c['subtotal']); ?></h2>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-12 py-3 my-3 border-top">
        <div class="row justify-content-end">

          <div class="col-3 text-right border-bottom">
            <h2 class="mb-1" style="font-weight:700;">Total <span class="ml-3">:</span></h2>
            <h2 class="mb-1" style="font-weight:500;">Tunai <span class="ml-3">:</span></h2>
            <h2 class="mb-1" style="font-weight:500;">Kembali <span class="ml-3">:</span></h2>
          </div>
          <div class="col-3 border-bottom">
            <h2 class="mb-1" style="font-weight:700;"><?php echo ribuan($i4['isub']); ?></h2>
            <h2 class="mb-1" style="font-weight:500;"><?php echo ribuan($Dbayar); ?></h2>
            <h2 class="mb-1" style="font-weight:500;"><?php echo ribuan($Dkembali); ?></h2>
          </div>
        </div>
      </div>
      <div class="col-12 text-center mt-5">
        <h2>* Terima Kasih Telah Berbelanja Di Adgrafika *</h2>
      </div>
    </div><!-- end row -->
  </div><!-- end box print -->
</section>
<!-- end data print -->

<!-- end isinya -->
<?php include 'footer.php'; ?>

<script>
  // function getHarga() {
  //   var select = document.getElementById('barang');
  //   var selectedOption = select.options[select.selectedIndex];
  //   var idBarang = selectedOption.getAttribute('idbarang');

  //   // Menggunakan AJAX untuk mengambil harga barang
  //   $.ajax({
  //     url: 'get_harga_barang.php?id_harga=' + idBarang,
  //     type: 'GET',
  //     dataType: 'json',
  //     success: function(data) {
  //       console.log(data);
  //       $('#harga').val(data[0]);
  //     },
  //     error: function() {
  //       $('#harga').val('Terjadi kesalahan. Silakan coba lagi nanti 11');
  //     }
  //   });
  // }

  $(document).on('change', '#barang', function() {
    var select = document.getElementById('barang');
    var selectedOption = select.options[select.selectedIndex];
    var idBarang = selectedOption.getAttribute('idbarang');

    // console.log(idBarang);

    // Menggunakan AJAX untuk mengambil harga barang
    $.ajax({
      url: './get_harga_barang.php?id_harga=' + idBarang,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // console.log(data);
        $('#harga').val(data[0]);
      },
      error: function() {
        $('#harga').val('error');
      }
    });
    // console.log(url);
  });
</script>


<?php
if (isset($_POST['SimpanEdit'])) {
  
  $idlaporan1 = htmlspecialchars($_POST['idlaporan']);
  $kodeproduk1 = htmlspecialchars($_POST['Edit_Produk1']);
  $harga1 = htmlspecialchars($_POST['Edit_Harga']);
  $qty1 = htmlspecialchars($_POST['Edit_Qty']);
  
  $hitung = $harga1 * $qty1;

  $update =  mysqli_query($conn, "UPDATE laporan SET kode_produk='$kodeproduk1', harga='$harga1',qty='$qty1',subtotal='$hitung' WHERE idlaporan='$Didlpaoran' AND toko = '" . $_SESSION['toko'] . "'") or die(mysqli_connect_error());
  if($update) {
    echo '<script>window.location="invoice.php?detail=' . $noinv . '"</script>';
  }
 
    
};

?>