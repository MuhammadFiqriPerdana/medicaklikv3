<?php include 'sidebar.php'; ?>
<!-- isinya -->
<h1 class="h3 mb-0">
  Data Resep
  <button class="btn btn-primary btn-sm border-0 float-right" type="button" data-toggle="modal" data-target="#TambahProduk">Tambah Resep</button>
</h1>
<hr>
<table class="table table-striped table-sm table-bordered dt-responsive nowrap" id="table" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nomor Resep</th>
      <th>Nama Pasien</th>
      <th>Telepon</th>
      <th>Nama Obat</th>
      <th>Jumlah</th>
      <th>Satuan</th>
      <th>Keterangan</th>
      <th>Tanggal</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $data_resep = mysqli_query($conn, "SELECT * FROM resep R LEFT JOIN produk P ON R.idproduk=P.idproduk");
    while ($d = mysqli_fetch_array($data_resep)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['id']; ?></td>
        <td><?php echo $d['nama_pasien']; ?></td>
        <td><?php echo $d['telepon']; ?></td>
        <td><?php echo $d['namaproduk']; ?></td>
        <td><?php echo $d['jumlah']; ?></td>
        <td><?php echo $d['satuan']; ?></td>
        <td><?php echo $d['keterangan']; ?></td>
        <td><?php echo $d['tanggal']; ?></td>
        <td>
          <!-- <button type="button" class="btn btn-primary btn-xs mr-1" data-toggle="modal" data-target="#EditProduk<?php echo $d['id']; ?>">
            <i class="fas fa-pencil-alt fa-xs mr-1"></i>Edit
          </button>
          <a class="btn btn-danger btn-xs" href="?hapus=<?php echo $d['id']; ?>">
            <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus</a> -->
          <a class="btn btn-info btn-xs" href="e-ticket.php?id=<?php echo $d['idproduk']; ?>">
            <i class="fas fa-print fa-xs mr-1"></i>Print</a>

        </td>
      </tr>
      <!-- Modal Tambah Produk -->
      <div class="modal fade" id="EditProduk<?php echo $d['idproduk']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content border-0">
            <form method="post">
              <div class="modal-header bg-purple">
                <h5 class="modal-title text-white">Edit Produk</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="samll">Kode Produk :</label>
                  <input type="hidden" name="idproduk" value="<?php echo $d['idproduk']; ?>">
                  <input type="text" name="Edit_Kode_Produk" value="<?php echo $d['kode_produk']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Nama Produk :</label>
                  <input type="text" name="Edit_Nama_Produk" value="<?php echo $d['nama_produk']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Suplier :</label>
                  <select name="Edit_Nama_Suplier" class="form-control select2">
                    <option selected>-- Pilih --</option>
                    <?php
                    $data_suplier1 = mysqli_query($conn, "SELECT * FROM suplier where toko = '" . $_SESSION['toko'] . "'");
                    while ($row = mysqli_fetch_array($data_suplier1)) {
                    ?>
                      <option value="<?php echo $row['id_suplier'] ?>">
                        <?php echo $row['nama_suplier'] ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="samll">Harga Modal :</label>
                  <input type="number" placeholder="0" name="Edit_Harga_Modal" value="<?php echo $d['harga_modal']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Harga Jual Asal :</label>
                  <input type="number" placeholder="0" name="Edit_Harga_Jual" value="<?php echo $d['harga_jual_asal']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Diskon :</label>
                  <input type="number" placeholder="0" name="Edit_Diskon" value="<?php echo $d['diskon']; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label class="samll">Pajak :</label>
                  <input type="number" placeholder="0" name="Edit_Pajak" value="<?php echo $d['pajak']; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label class="samll">Tanggal Input :</label>
                  <input type="date" placeholder="0" name="Edit_Tanggal_Input" value="<?php echo $d['tgl_input']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Tanggal Kadaluarsa :</label>
                  <input type="date" placeholder="0" name="Edit_Tanggal_Kadaluarsa" value="<?php echo $d['tgl_kadaluarsa']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Stok :</label>
                  <input type="text" placeholder="0" name="Edit_Stok" value="<?php echo $d['stok']; ?>" class="form-control" required>
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
      <!-- end Modal Produk -->
    <?php } ?>
  </tbody>
</table>
<?php
if (isset($_POST['TambahProduk'])) {
  $obat1 = htmlspecialchars($_POST['Tambah_Obat']);
  $jumlah1 = htmlspecialchars($_POST['Tambah_Jumlah']);
  $satuan1 = htmlspecialchars($_POST['Tambah_Satuan']);
  $nama_pasien = htmlspecialchars($_POST['Tambah_Nama_Pasien']);
  $telepon = htmlspecialchars($_POST['Tambah_Telepon']);
  $keterangan = htmlspecialchars($_POST['Tambah_Keterangan']);
  $tanggal = htmlspecialchars($_POST['Tambah_Tanggal']);
  $InputProduk = mysqli_query($conn, "INSERT INTO resep (idproduk,jumlah,satuan,nama_pasien,telepon, keterangan, tanggal) values ('$obat1','$jumlah1','$satuan1','$nama_pasien','$telepon','$keterangan','$tanggal')");
  if ($InputProduk) {
    echo '<script>history.go(-1);</script>';
    $id_resep = mysqli_insert_id($conn);
  } else {
    echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
  }
};
if (isset($_POST['SimpanEdit'])) {
  $idproduk1 = htmlspecialchars($_POST['idproduk']);
  $kodeproduk1 = htmlspecialchars($_POST['Edit_Kode_Produk']);
  $namaproduk1 = htmlspecialchars($_POST['Edit_Nama_Produk']);
  $namasuplier1 = htmlspecialchars($_POST['Edit_Nama_Suplier']);
  $harga_modal1 = htmlspecialchars($_POST['Edit_Harga_Modal']);
  $harga_jual1 = htmlspecialchars($_POST['Edit_Harga_Jual']);
  $diskon1 = htmlspecialchars($_POST['Edit_Diskon']);
  $pajak1 = htmlspecialchars($_POST['Edit_Pajak']);
  $tanggal_input1 = htmlspecialchars($_POST['Edit_Tanggal_Input']);
  $tanggal_kadaluarsa1 = htmlspecialchars($_POST['Edit_Tanggal_Kadaluarsa']);
  $stok1 = htmlspecialchars($_POST['Edit_Stok']);

  $potong_diskon = ($diskon1 / 100) * $harga_jual1;
  $hasildiskon = $harga_jual1 - $potong_diskon;

  $potong_pajak = ($pajak1 / 100) * $harga_jual1;
  $hasilpajak = $harga_jual1 + $potong_pajak;

  $hasilpajakdiskon = $harga_jual1 + $potong_pajak - $potong_diskon;

  $CariProduk = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk='$kodeproduk1' and idproduk!='$idproduk1' AND nama_produk='$namaproduk1' AND toko = '" . $_SESSION['toko'] . "'");
  $HasilData = mysqli_num_rows($CariProduk);

  if ($HasilData > 0) {
    echo '<script>alert("Maaf! kode produk sudah ada");history.go(-1);</script>';
  } else {
    if ($diskon1 >= 0) {
      $cekDataUpdate =  mysqli_query($conn, "UPDATE produk SET kode_produk='$kodeproduk1',nama_produk='$namaproduk1' id_suplier='$namasuplier1',harga_modal='$harga_modal1',harga_jual_asal='$harga_jual1', diskon='$diskon1', pajak='$pajak1', harga_jual_setelah='$hasildiskon', tgl_input='$tanggal_input1', tgl_kadaluarsa='$tanggal_kadaluarsa1', stok='$stok1' WHERE idproduk='$idproduk1' AND toko = '" . $_SESSION['toko'] . "'") or die(mysqli_connect_error());
    } elseif ($pajak1 >= 0) {
      $cekDataUpdate2 = mysqli_query($conn, "UPDATE produk SET kode_produk='$kodeproduk1',nama_produk='$namaproduk1',id_suplier='$namasuplier1',harga_modal='$harga_modal1',harga_jual_asal='$harga_jual1', diskon='$diskon1', pajak='$pajak1', harga_jual_setelah='$hasilpajak', tgl_input='$tanggal_input1', tgl_kadaluarsa='$tanggal_kadaluarsa1', stok='$stok1' WHERE idproduk='$idproduk1' AND toko = '" . $_SESSION['toko'] . "'") or die(mysqli_connect_error());
    } elseif ($pajak1 && $diskon1 >= 0) {
      $cekDataUpdate3 = mysqli_query($conn, "UPDATE produk SET kode_produk='$kodeproduk1', nama_produk='$namaproduk1',id_suplier='$namasuplier1',harga_modal='$harga_modal1',harga_jual_asal='$harga_jual1', diskon='$diskon1', pajak='$pajak1', harga_jual_setelah='$hasilpajakdiskon', tgl_input='$tanggal_input1', tgl_kadaluarsa='$tanggal_kadaluarsa1', stok='$stok1' WHERE idproduk='$idproduk1' AND toko = '" . $_SESSION['toko'] . "'") or die(mysqli_connect_error());
    } else {
      $cekDataUpdate4 =  mysqli_query($conn, "UPDATE produk SET kode_produk='$kodeproduk1', nama_produk='$namaproduk1',id_suplier='$namasuplier1',harga_modal='$harga_modal1',harga_jual_asal='$harga_jual1', harga_jual_setelah='$harga_jual1', tgl_input='$tanggal_input1', tgl_kadaluarsa='$tanggal_kadaluarsa1', stok='$stok1' WHERE idproduk='$idproduk1' AND toko = '" . $_SESSION['toko'] . "'") or die(mysqli_connect_error());
    }
  }
};
if (!empty($_GET['hapus'])) {
  $idproduk1 = $_GET['hapus'];
  $hapus_data = mysqli_query($conn, "DELETE FROM produk WHERE idproduk='$idproduk1'");
  if ($hapus_data) {
    echo '<script>history.go(-1);</script>';
  } else {
    echo '<script>alert("Gagal Hapus Data Produk");history.go(-1);</script>';
  }
};
?>
<!-- Modal Tambah Produk -->
<div class="modal fade" id="TambahProduk" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-0">
      <form method="post">
        <div class="modal-header bg-purple">
          <h5 class="modal-title text-white">Tambah Resep</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="samll">Nama Pasien :</label>
            <input type="text" name="Tambah_Nama_Pasien" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Telepon :</label>
            <input type="number" name="Tambah_Telepon" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Obat :</label>
            <select name="Tambah_Obat" class="form-control select2">
              <option selected>-- Pilih --</option>
              <?php
              $data_produk = mysqli_query($conn, "SELECT * FROM produk where toko = '" . $_SESSION['toko'] . "'");
              while ($row1 = mysqli_fetch_array($data_produk)) {
              ?>
                <option value="<?php echo $row1['idproduk'] ?>">
                  <?php echo $row1['nama_produk'] ?>
                </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="samll">Jumlah :</label>
            <input type="number" placeholder="0" name="Tambah_Jumlah" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Satuan :</label>
            <input type="text" placeholder="Satuan" name="Tambah_Satuan" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Keterangan :</label>
            <input type="text" placeholder="Keterangan" name="Tambah_Keterangan" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Tanggal :</label>
            <input type="date" placeholder="Tanggal" name="Tambah_Tanggal" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="TambahProduk" class="btn btn-primary">Simpan</button>
        </div>
    </div>

  </div>

  </form>
</div>
</div>
</div>
<!-- end Modal Produk -->

<!-- end isinya -->
<?php include 'footer.php'; ?>