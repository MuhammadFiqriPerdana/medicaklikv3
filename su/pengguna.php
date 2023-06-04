
<?php include 'sidebar.php'; ?>
<!-- isinya -->
    <h1 class="h3 mb-0">
        Data Pengguna
        <button class="btn btn-primary btn-sm border-0 float-right" type="button" data-toggle="modal" data-target="#TambahPengguna">Tambah Pengguna</button>
    </h1>
<hr>
<table class="table table-striped table-sm table-bordered dt-responsive nowrap" id="table" width="100%">
<thead>
  <tr>
    <th>No</th>
    <th>Username</th>
    <th>Toko</th>
    <th>Alamat</th>
    <th>Telepon</th>
    <th>Role</th>
    <th>Opsi</th>
  </tr>
</thead>
<tbody>
<?php 
    $no = 1;
    $data_pengguna = mysqli_query($conn,"SELECT * FROM `login` WHERE level!='1'");
    while($d = mysqli_fetch_array($data_pengguna)){
        ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['username']; ?></td>
    <td><?php echo $d['toko']; ?></td>
    <td><?php echo $d['alamat']; ?></td>
    <td><?php echo $d['telepon']; ?></td>
    <td><?php echo $d['role']; ?></td>
    <td>
        <button type="button" class="btn btn-primary btn-xs mr-1" data-toggle="modal" data-target="#EditPengguna<?php echo $d['userid']; ?>">
        <i class="fas fa-pencil-alt fa-xs mr-1"></i>Edit
        </button>
        <a class="btn btn-danger btn-xs" href="?hapus=<?php echo $d['userid']; ?>">
        <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus</a>
    </td>
  </tr>
  <!-- Modal Tambah Produk -->
<div class="modal fade" id="EditPengguna<?php echo $d['userid']; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-0">
        <form method="post">
      <div class="modal-header bg-purple">
        <h5 class="modal-title text-white">Edit Pengguna</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="samll">Userid :</label>
            <input type="text" name="Edit_User_Id" value="<?php echo $d['userid']; ?>" class="form-control select2" disabled>
        </div>
        <div class="form-group">
            <label class="samll">Username :</label>
            <input type="text" name="Edit_Username" value="<?php echo $d['username']; ?>" class="form-control" require>
        </div>
        <div class="form-group">
            <label class="samll">Toko :</label>
            <input type="text" name="Edit_Toko" value="<?php echo $d['toko']; ?>" class="form-control" require>
        </div>
        <div class="form-group">
            <label class="samll">Alamat :</label>
            <input type="text" name="Edit_Alamat" value="<?php echo $d['alamat']; ?>" class="form-control" require>
        </div>
        <div class="form-group">
            <label class="samll">Telepon :</label>
            <input type="text" name="Edit_Telepon" value="<?php echo $d['telepon']; ?>" class="form-control" require>
        </div>
        <div class="form-group">
            <label class="samll">Level :</label>
            <select name="Edit_Level" class="form-control select2" require> 
              <option selected>Pilih Level</option>
              <?php
              if($d['level'] == 2){
                echo "<option value='2'>Admin Toko</option>";
                echo "<option value='3'>Kasir</option>";
              } else if($d['level'] == 3) {
                echo "<option value='2'>Admin Toko</option>";
                echo "<option value='3'>Kasir</option>";
              }
              ?>
            </select>
        </div>
        <div class="form-group">
            <label class="samll">Role :</label>
            <select name="Edit_Role" class="form-control select2" require> 
              <option selected>Pilih Role</option>
              <?php
              if($d['role'] == "Admin Toko"){
                echo "<option value='Admin Toko'>Admin Toko</option>";
                echo "<option value='Kasir'>Kasir</option>";
              } else if($d['role'] == "Kasir") {
                echo "<option value='Admin Toko'>Admin Toko</option>";
                echo "<option value='Kasir'>Kasir</option>";
              }
              ?>
            </select>
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
if(isset($_POST['TambahPengguna']))
{
    $username = htmlspecialchars($_POST['Tambah_Username']);
    $password = htmlspecialchars(password_hash($_POST['Tambah_Password'], PASSWORD_DEFAULT));
    $toko = htmlspecialchars($_POST['Tambah_Toko']);
    $alamat = htmlspecialchars($_POST['Tambah_Alamat']);
    $telepon = htmlspecialchars($_POST['Tambah_Telepon']);
    $level = htmlspecialchars($_POST['Tambah_Level']);
    $role = htmlspecialchars($_POST['Tambah_Role']);

    $cekkode = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM login WHERE username='$username'"));
    if($cekkode > 0) {
        echo '<script>alert("Maaf! username sudah ada");history.go(-1);</script>';
    } else {
    $InputPengguna = mysqli_query($conn,"INSERT INTO login (username,password,toko,alamat,telepon, level, role) values ('$username','$password','$toko','$alamat','$telepon','$level','$role')");
    if ($InputPengguna){
        echo '<script>history.go(-1);</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
    }
}
};
if(isset($_POST['SimpanEdit'])){
    $userid1 = htmlspecialchars($_POST['Edit_User_Id']);
    $username1 = htmlspecialchars($_POST['Edit_Username']);
    $toko1 = htmlspecialchars($_POST['Edit_Toko']);
    $alamat1 = htmlspecialchars($_POST['Edit_Alamat']);
    $telepon1 = htmlspecialchars($_POST['Edit_Telepon']);
    $level1 = htmlspecialchars($_POST['Edit_Level']);
    $role1 = htmlspecialchars($_POST['Edit_Role']);

    $CariPengguna = mysqli_query($conn,"SELECT * FROM login WHERE username!='$username1'");
    $HasilData = mysqli_num_rows($CariPengguna);


    if($HasilData < 0){
        echo '<script>alert("Maaf! Username sudah ada");history.go(-1);</script>';
    } else{
      $cekDataUpdate =  mysqli_query($conn, "UPDATE login SET username='$username1',
      toko='$toko1',alamat='$alamat1',telepon='$telepon1', level='$level1', role='$role1' WHERE userid='$userid1'") or die(mysqli_connect_error());
      if($cekDataUpdate){
          echo '<script>history.go(-1);</script>';
      } else {
          echo '<script>alert("Gagal Edit Data Produk");history.go(-1);</script>';
      }
  }
}; 
	if(!empty($_GET['hapus'])){
		$userid2 = $_GET['hapus'];
		$hapus_data = mysqli_query($conn, "DELETE FROM login WHERE userid='$userid2'");
        if($hapus_data){
            echo '<script>history.go(-1);</script>';
        } else {
            echo '<script>alert("Gagal Hapus Data Pengguna");history.go(-1);</script>';
        }
	};
    ?>
<!-- Modal Tambah Produk -->
<div class="modal fade" id="TambahPengguna" tabindex="-1" role="dialog">
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
            <label class="samll">Username :</label>
            <input type="text" name="Tambah_Username" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="samll">Password :</label>
            <input type="text" name="Tambah_Password" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="samll">Toko :</label>
            <input type="text" name="Tambah_Toko" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="samll">Alamat :</label>
            <input type="text" name="Tambah_Alamat" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="samll">Telepon :</label>
            <input type="text" name="Tambah_Telepon" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="samll">Level :</label>
            <select name="Tambah_Level" class="form-control select2">
              <option selected>Pilih Level</option>
              <option value="2">Admin Toko</option>
              <option value="3">Kasir</option>
            </select>
        </div>
        <div class="form-group">
            <label class="samll">Role :</label>
            <select name="Tambah_Role" class="form-control select2">
              <option selected>Pilih Role</option>
              <option value="Admin Toko">Admin Toko</option>
              <option value="Kasir">Kasir</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" name="TambahPengguna" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end Modal Produk -->

<!-- end isinya -->
<?php include 'footer.php'; ?>