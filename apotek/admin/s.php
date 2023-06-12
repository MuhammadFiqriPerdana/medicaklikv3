<?php
if (isset($_POST['TambahProduk'])) {
  $kodeproduk = htmlspecialchars($_POST['Tambah_Kode_Produk']);
  $namaproduk = htmlspecialchars($_POST['Tambah_Nama_Produk']);
  $namasuplier12 = htmlspecialchars($_POST['Tambah_Nama_Suplier']);
  $harga_modal = htmlspecialchars($_POST['Tambah_Harga_Modal']);
  $harga_jual = htmlspecialchars($_POST['Tambah_Harga_Jual']);
  $diskon = htmlspecialchars($_POST['Tambah_Diskon']);
  $pajak = htmlspecialchars($_POST['Tambah_Pajak']);
  $tanggal_input = htmlspecialchars($_POST['Tambah_Tanggal_Input']);
  $tanggal_kadaluarsa = htmlspecialchars($_POST['Tambah_Tanggal_Kadaluarsa']);
  $stok = htmlspecialchars($_POST['Tambah_Stok']);

  $potong_diskon1 = ($diskon / 100) * $harga_jual;
  $hasildiskon1 = $harga_jual - $potong_diskon1;

  $potong_pajak1 = ($pajak / 100) * $harga_jual;
  $hasilpajak1 = $harga_jual + $potong_pajak1;

  $hasilpajakdiskon1 = $harga_jual + $potong_pajak1 - $potong_diskon1;

  $cekkode = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk='$kodeproduk' AND toko = '" . $_SESSION['toko'] . "'"));

  
  if ($diskon >= 0) {
    $InputProduk = mysqli_query($conn, "INSERT INTO produk (kode_produk,nama_produk, id_suplier, harga_modal,harga_jual_asal,diskon,pajak,harga_jual_setelah,tgl_input, tgl_kadaluarsa, stok, toko) values ('$kodeproduk','$namaproduk','$namasuplier12','$harga_modal','$harga_jual','$diskon1','$pajak1','$hasildiskon1','$tanggal_input','$tanggal_kadaluarsa', '$stok', '" . $_SESSION['toko'] . "')");
    echo '<script>
    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin menyimpan data?",
        icon: "warning",
        buttons: ["Batal", "Simpan"],
        dangerMode: true,
    }).then(function(willSave) {
        if (willSave) {
            swal("Data berhasil disimpan.", { icon: "success" }).then(function() {
                location.reload();
            });
        } else {
            swal("Aksi dibatalkan.", { icon: "error" });
        }
    });
    </script>';
  } elseif ($pajak >= 0) {
    $InputProduk1 = mysqli_query($conn, "INSERT INTO produk (kode_produk,nama_produk, id_suplier, harga_modal,harga_jual_asal,diskon,pajak,harga_jual_setelah,tgl_input, tgl_kadaluarsa, stok, toko) values ('$kodeproduk','$namaproduk','$namasuplier12','$harga_modal','$harga_jual','$diskon1','$pajak1','$hasilpajak1','$tanggal_input','$tanggal_kadaluarsa', '$stok', '" . $_SESSION['toko'] . "')");
    echo '<script>
    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin menyimpan data?",
        icon: "warning",
        buttons: ["Batal", "Simpan"],
        dangerMode: true,
    }).then(function(willSave) {
        if (willSave) {
            swal("Data berhasil disimpan.", { icon: "success" }).then(function() {
                location.reload();
            });
        } else {
            swal("Aksi dibatalkan.", { icon: "error" });
        }
    });
    </script>';
  } elseif ($diskon && $pajak >= 0) {
    $InputProduk2 = mysqli_query($conn, "INSERT INTO produk (kode_produk,nama_produk, id_suplier, harga_modal,harga_jual_asal,diskon,pajak,harga_jual_setelah,tgl_input, tgl_kadaluarsa, stok, toko) values ('$kodeproduk','$namaproduk','$namasuplier12','$harga_modal','$harga_jual','$diskon1','$pajak1','$hasilpajakdiskon1','$tanggal_input','$tanggal_kadaluarsa', '$stok', '" . $_SESSION['toko'] . "')");
    echo '<script>
    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin menyimpan data?",
        icon: "warning",
        buttons: ["Batal", "Simpan"],
        dangerMode: true,
    }).then(function(willSave) {
        if (willSave) {
            swal("Data berhasil disimpan.", { icon: "success" }).then(function() {
                location.reload();
            });
        } else {
            swal("Aksi dibatalkan.", { icon: "error" });
        }
    });
    </script>';
  } else {
    $InputProduk4 = mysqli_query($conn, "INSERT INTO produk (kode_produk,nama_produk,id_suplier,harga_modal,harga_jual_asal, harga_jual_setelah, tgl_input, tgl_kadaluarsa, stok, toko) values ('$kodeproduk','$namaproduk','$namasuplier12','$harga_modal','$harga_jual', '$harga_jual''$tanggal_input','$tanggal_kadaluarsa', '$stok', '" . $_SESSION['toko'] . "')");
    echo '<script>
    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin menyimpan data?",
        icon: "warning",
        buttons: ["Batal", "Simpan"],
        dangerMode: true,
    }).then(function(willSave) {
        if (willSave) {
            swal("Data berhasil disimpan.", { icon: "success" }).then(function() {
                location.reload();
            });
        } else {
            swal("Aksi dibatalkan.", { icon: "error" });
        }
    });
    </script>';
  }
}
?>