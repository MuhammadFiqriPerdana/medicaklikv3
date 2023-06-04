<?php include 'sidebar.php'; ?>
<!-- isinya -->
<h1 class="h3 mb-0">
  Data Suplier
  <button class="btn btn-primary btn-sm border-0 float-right" type="button" data-toggle="modal" data-target="#TambahProduk">Tambah Suplier</button>
</h1>
<hr>
<table class="table table-striped table-sm table-bordered dt-responsive nowrap" id="table" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Suplier</th>
      <th>Alamat</th>
      <th>Nomor Telepon</th>
      <th>Keterangan</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $data_barang = mysqli_query($conn, "SELECT * FROM suplier WHERE toko='" . $_SESSION['toko'] . "'");
    while ($d = mysqli_fetch_array($data_barang)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama_suplier']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['telepon']; ?></td>
        <td><?php echo $d['keterangan']; ?></td>
        <td>
          <button type="button" class="btn btn-primary btn-xs mr-1" data-toggle="modal" data-target="#EditProduk<?php echo $d['id_suplier']; ?>">
            <i class="fas fa-pencil-alt fa-xs mr-1"></i>Edit
          </button>
          <a class="btn btn-danger btn-xs" href="?hapus=<?php echo $d['id_suplier']; ?>">
            <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus</a>
        </td>
      </tr>
      <!-- Modal Tambah Produk -->
      <div class="modal fade" id="EditProduk<?php echo $d['id_suplier']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content border-0">
            <form method="post">
              <div class="modal-header bg-purple">
                <h5 class="modal-title text-white">Edit Suplier</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <input type="hidden" name="id_suplier" value="<?php echo $d['id_suplier']; ?>">

                <div class="form-group">
                  <label class="samll">Nama Suplier :</label>
                  <input type="text" name="Edit_Nama_Suplier" value="<?php echo $d['nama_suplier']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Alamat :</label>
                  <input type="text" name="Edit_Alamat" value="<?php echo $d['alamat']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Nomor Telepon :</label>
                  <input type="number" name="Edit_Telepon" value="<?php echo $d['telepon']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="samll">Keterangan :</label>
                  <input type="text" name="Edit_Keterangan" value="<?php echo $d['keterangan']; ?>" class="form-control" required>
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
  $nama_suplier = htmlspecialchars($_POST['Tambah_Nama_Suplier']);
  $alamat = htmlspecialchars($_POST['Tambah_Alamat']);
  $telepon = htmlspecialchars($_POST['Tambah_Telepon']);
  $keterangan = htmlspecialchars($_POST['Tambah_Keterangan']);

  $InputProduk = mysqli_query($conn, "INSERT INTO suplier (nama_suplier, alamat, telepon, keterangan, toko) values ('$nama_suplier','$alamat','$telepon','$keterangan','" . $_SESSION['toko'] . "')");
  if ($InputProduk) {
    echo '<script>history.go(-1);</script>';
  } else {
    echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
  }
};
if (isset($_POST['SimpanEdit'])) {
  $idsuplier1 = htmlspecialchars($_POST['id_suplier']);
  $nama_suplier1 = htmlspecialchars($_POST['Edit_Nama_Suplier']);
  $alamat1 = htmlspecialchars($_POST['Edit_Alamat']);
  $telepon1 = htmlspecialchars($_POST['Edit_Telepon']);
  $keterangan1 = htmlspecialchars($_POST['Edit_Keterangan']);

  $CariProduk = mysqli_query($conn, "SELECT * FROM suplier WHERE id_suplier='$idsuplier1'");
  $HasilData = mysqli_num_rows($CariProduk);

  if ($HasilData) {
    $cekDataUpdate =  mysqli_query($conn, "UPDATE suplier SET nama_suplier='$nama_suplier1', alamat='$alamat1', telepon='$telepon1', keterangan='$keterangan1' WHERE id_suplier='$idsuplier1'") or die(mysqli_connect_error());
    if ($cekDataUpdate) {
      echo '<script>history.go(-1);</script>';
    } else {
      echo '<script>alert("Gagal Edit Data Produk");history.go(-1);</script>';
    }
  }
};
if (!empty($_GET['hapus'])) {
  $idsuplier1 = $_GET['hapus'];
  $hapus_data = mysqli_query($conn, "DELETE FROM suplier WHERE id_suplier='$idsuplier1'");
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
          <h5 class="modal-title text-white">Tambah Produk</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="samll">Nama Suplier :</label>
            <input type="text" name="Tambah_Nama_Suplier" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Alamat :</label>
            <input type="text" name="Tambah_Alamat" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Nomor Telepon :</label>
            <input type="number" name="Tambah_Telepon" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="samll">Keterangan :</label>
            <input type="text" name="Tambah_Keterangan" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="TambahProduk" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end Modal Produk -->

<!-- end isinya -->
<?php include 'footer.php'; ?>