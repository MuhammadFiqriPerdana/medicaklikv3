<?php
include "../../config.php";
session_start();
if ($_SESSION['log'] != "login") {
  header("location:../../index.php");
}
if ($_SESSION['role'] != "Admin Toko") {
  header("location:../../index.php");
}
function ribuan($nilai)
{
  return number_format($nilai, 0, ',', '.');
}
$uid = $_SESSION['userid'];
$DataLogin = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM login WHERE userid='$uid'"));
$username = $DataLogin['username'];
$toko = $DataLogin['toko'];
$alamat = $DataLogin['alamat'];
$telepon = $DataLogin['telepon'];
$logo = $DataLogin['logo'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meditec</title>
  <link rel="icon" href="../../logo-icon.png">
  <link rel="icon" href="../../logo-icon.png" type="image/ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <style>
    .dt-buttons {
            margin-bottom: 10px;
        }
        .dt-buttons .dt-button {
            padding: 8px 12px;
            border-radius: 4px;
            margin-right: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .dt-buttons .dt-button:hover {
            background-color: #0056b3;
        }
        .dt-buttons .dt-button:focus {
            outline: none;
        }
  </style>

</head>

<body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-primary border-0" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="./"><i class="fas fa-shopping-cart mr-1"></i><?php echo $toko ?></a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic" style="height:70px;width:70px;">
            <img class="img-responsive img-rounded" src="../../assets/images/<?php echo $logo ?>" alt="User picture">
          </div>
          <div class="user-info">
            <span class="user-name"><?php echo $username ?>
            </span>
            <span class="user-role">Administrator</span>
            <span class="user-status">
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </span>
          </div>
        </div>
        <!-- sidebar-header  -->

        <div class="sidebar-menu ">
          <ul>
            <li class="header-menu">
              <span>General</span>
            </li>
            <li>
              <a href="index.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="transaksi.php">
                <i class="fas fa-tv"></i>
                <span>Laporan Transaksi</span>
              </a>
            </li>
            <li>
              <a href="kasir/index.php">
                <i class="fas fa-tv"></i>
                <span>Transaksi</span>
              </a>
            </li>
            <li>
              <a href="produk.php">
                <i class="fas fa-archive"></i>
                <span>Produk</span>
              </a>
            </li>
            <li>
              <a href="suplier.php">
                <i class="fas fa-truck"></i>
                <span>Suplier</span>
              </a>
            </li>
            <li>
              <a href="pareto.php">
                <i class="fas fa-rocket" style="color: #ffffff;"></i>
                <span>Analisis Pareto</span>
              </a>
            </li>
            <li>
              <a href="resep.php">
                <i class="fas fa-rocket" style="color: #ffffff;"></i>
                <span>E-Tiket</span>
              </a>
            </li>
            <li class="header-menu">
              <span>Setting</span>
            </li>
            <li>
              <a href="pengaturan.php">
                <i class="fa fa-cog"></i>
                <span>Pengaturan</span>
              </a>
            </li>
            <li>
              <a href="#Exit" data-toggle="modal">
                <i class="fa fa-power-off"></i>
                <span>Keluar</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <div class="sidebar-footer">
        © 2022 Developed by - Triwerdaya Group</a>
      </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
      <div class="container-fluid">

        <div class="d-block d-sm-block d-md-none d-lg-none py-2"></div>