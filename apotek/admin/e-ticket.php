<?php
require_once __DIR__ . './vendor/autoload.php'; //path ke autoload MPDF
include '../../config.php';
//mengambil data resep dari tabel
$ids =  $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM resep R LEFT JOIN produk P ON P.idproduk = R.idproduk WHERE R.idproduk = $ids");


//membuat instance dari MPDF
$mpdf = new \Mpdf\Mpdf(['format' => [150, 159]]);

//membuat template e-ticket
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center;">
        <p>Apotek Hamada Farma</p>
        <p> Jl. Mistar Cokrokusumo Komp PU RT 015/Rw 003 Kel. Sungai Besar</p>
        <p>Telepon: 082159189645   </p>
    </div>
    <hr>
';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
        <table>
        <tr>
        <th>No Resep ' . $row['id']  .  '   </th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
        <th>Banjarbaru,' . $row['tanggal']  .  '   </th>
        </tr>
        <tr>
        
        </tr>
        </table>
        <h4 align="center">' . $row['nama_pasien'] . '</h4> 
        <h4 align="center">' . $row['nama_produk'] . '</h4> 
        <h4 align="center">' . $row['keterangan'] . '</h4> 
        <h4>Jumlah Obat : ' . $row['jumlah'] . '</h4>
        <h4 align="center">SEMOGA LEKAS SEMBUH</h4> 
        <hr>
        <h4 color="red" align="center">HARUS DENGAN RESEP DOKTER</h4> 


    ';
}
$html .= '
        </tbody>
    </table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
