<?php include 'sidebar.php'; ?>
<!-- isinya -->
<h1 class="h3 mb-0">
  Data Resep
  <button class="btn btn-primary btn-sm border-0 float-right" type="button" data-toggle="modal" data-target="#TambahProduk">Tambah Suplier</button>
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
      <th>Jumlah Obat</th>
      <th>Satuan Obat</th>
      <th>Keterangan</th>
      <th>Opsi</th>
    </tr> 
  </thead>
  <tbody>
    <?php
    $no = 1;
    $data_resep = mysqli_query($conn, "SELECT * FROM resep");
    while ($d =  mysqli_fetch_array($data_resep)) {
      $obat1 = json_decode($d['idproduk'], true);
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['id']; ?></td>
        <td><?php echo $d['nama_pasien']; ?></td>
        <td><?php echo $d['telepon']; ?></td>
        <td><?php echo $d['jumlah1']; ?></td>
        <td><?php echo $d['jumlah1']; ?></td>
        <td><?php foreach ($obat1 as $item) echo $item['idproduk1']; "<br>"  ?></td>
        <td><?php echo $d['keterangan'];?></td>
        <td>
          <button type="button" class="btn btn-primary btn-xs mr-1" data-toggle="modal" data-target="#EditProduk<?php echo $d['id']; ?>">
            <i class="fas fa-pencil-alt fa-xs mr-1"></i>Edit
          </button>
          <a class="btn btn-info btn-xs" href="e-ticket.php">
            <i class="fas fa-print"></i>Cetak</a>
          <a class="btn btn-danger btn-xs" href="?hapus=<?php echo $d['id']; ?>">
            <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus</a>
        </td>
      </tr>
      <!-- Modal Tambah Produk -->
      <div class="modal fade" id="EditProduk<?php echo $d['id']; ?>" tabindex="-1" role="dialog">
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
  $obat1 = htmlspecialchars($_POST['Tambah_Obat1']);
  $jumlah1 = htmlspecialchars($_POST['Tambah_Jumlah1']);
  $satuan1 = htmlspecialchars($_POST['Tambah_Satuan1']);
  $nama_pasien = htmlspecialchars($_POST['Tambah_Nama_Pasien']);
  $telepon = htmlspecialchars($_POST['Tambah_Telepon']);
  $keterangan = htmlspecialchars($_POST['Tambah_Keterangan']);

  $data = array();
  for ($i = 0; $i < count($obat1); $i++) {
    $row = array(
      'idproduk' => $obat1[$i]
    );
    array_push($data, $row);
  } 
  $json_data = json_encode($data);

  $data1 = array();
  for ($j = 0; $j < count($jumlah1); $j++) {
    $row1 = array(
      'jumlah' => $jumlah1[$j]
    );
    array_push($data1, $row1);
  } 
  $json_data1 = json_encode($data1);

  $data2 = array();
  for ($k = 0; $k < count($satuan1); $k++) {
    $row2 = array(
      'satuan' => $satuan1[$k]
    );
    array_push($data2, $row2);
  } 
  $json_data2 = json_encode($data2);

  $InputProduk = mysqli_query($conn, "INSERT INTO resep (idproduk1,jumlah1,satuan1,nama_pasien,telepon, keterangan) values ('$json_data','$json_data1','$json_data2','$nama_pasien','$telepon','$keterangan')");
  if ($InputProduk) {
    echo '<script>history.go(-1);</script>';
    $id_resep = mysqli_insert_id($conn);
  } else {
    echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
  }
  // for ($i = 0; $i < count($_POST['Tambah_Obat1']); $i++) {

  
  //   $addobatmore = mysqli_query($conn, "INSERT INTO detail_resep (id_resep, idproduk, jumlah, satuan) values ('$id_resep', '$obat1', '$jumlah1', '$satuan1')");
  // }   
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
            <label class="samll">Keterangan :</label>
            <input type="text" placeholder="Keterangan" name="Tambah_Keterangan" class="form-control" required>
          </div>
      <div id="container">
        <div class="form-group">
          <label class="samll">Obat :</label>
            <select name="Tambah_Obat1[]" class="form-control select2">
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
            <label class="samll">Jumlah Obat :</label>
            <input type="number" name="Tambah_Jumlah" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="samll">Satuan :</label>
            <input type="text" name="Tambah_Satuan1" class="form-control" required>
          </div>
          <button type="submit" id="addobat" class="btn btn-primary">Tambah Obat</button>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="TambahProduk" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>

  </div>

  </form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $("#container");
    var add_button = $("#addobat");

    var x = 1;
    $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        $(wrapper).append('<div class="form-group"> <label class="samll">Obat :</label> <select name="Tambah_Obat1[]" class="form-control select2"> <option selected>-- Pilih --</option> <?php $data_produk = mysqli_query($conn, "SELECT * FROM produk where toko = '" . $_SESSION['toko'] . "'"); while ($row1 = mysqli_fetch_array($data_produk)) { ?> <option value="<?php echo $row1['idproduk'] ?>"> <?php echo $row1['nama_produk'] ?> </option> <?php } ?> </select> </div> <div class="form-group"> <label class="samll">Jumlah Obat :</label> <input type="number" name="Tambah_Jumlah1[]" class="form-control" required> </div> <div class="form-group"> <label class="samll">Satuan :</label> <input type="text" name="Tambah_Satuan1[]" class="form-control" required> </div> <a href="#" class="btn btn-danger remove_field">Remove</a></div>'); 
      }
    });

    $(wrapper).on("click", ".remove_field", function(e) {
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
    })
  });
</script> 

<!-- end Modal Produk -->

<!-- end isinya -->
<?php include 'footer.php'; ?>