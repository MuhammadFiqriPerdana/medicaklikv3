
<?php
include '../../config.php';
// Mendapatkan nilai barangId dari request POST
$barangId = $_GET['id_harga'];

// Query untuk mengambil harga barang berdasarkan idproduk
$query = "SELECT harga_jual_setelah FROM produk WHERE idproduk = '$barangId'";
$result = mysqli_query($conn, $query);

// Jika data ditemukan, mengambil harga dari hasil query
$row = mysqli_fetch_assoc($result);
$data = [];
$data[] = $row['harga_jual_setelah'];

// var_dump($data);
// die();

echo json_encode($data);
