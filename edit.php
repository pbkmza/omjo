<?php
if (!isset($_GET['kodekirim'])) {
    header('Location: produk.php');
    exit;
}

$kodekirim = $_GET['kodekirim'];
$data = [];

if (file_exists('data.json')) {
    $json_data = file_get_contents('data.json');
    $array_data = json_decode($json_data, true);

    foreach ($array_data as $tampildata) {
        if ($tampildata['kode'] == $kodekirim) {
            $data = $tampildata;
            break;
        }
    }
    
}
//menyimpan perubahan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($array_data as & $tampildata) {
        if ($tampildata['kode'] == $kodekirim) {
            $tampildata['nama_barang'] = $_POST['fnama'];
            $tampildata['kategori'] = $_POST['fkategori'];
            $tampildata['brand'] = $_POST['fbrand'];
            $tampildata['harga'] = $_POST['fharga'];
            break;
        }
    }
    //simpan dalam file data.json
    file_put_contents('data.json', json_encode($array_data, JSON_PRETTY_PRINT));
    header('Location: produk.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="ico/omjo.png"image/x-icon">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <body>
    <div class="header" id="header">
        <!-- <a href="ico/omjo.png" class="icon" id="icon"><img src="ico/omjo.png" alt="OMJO Logo"></a> -->
        <div class="dashboard" id="dashboard">
            <div class="navbar" id="navbar">
                <ul>
                    <li><a href="index.html#beranda">Beranda</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="index.html#tentang">Tentang</a></li>
                    <li><a href="index.html#kontak">Kontak</a></li>
                    <li>
                        <input type="text" placeholder="Search..." name="search" class="search">
                        <button type="submit"><ion-icon name="search-outline" class="search-outline"></ion-icon></button>
                    </li>
                    <li>
                        <button type="submit"><a href="login.php"><ion-icon name="person-circle-outline"></ion-icon></a></button>
                    </li>
                </ul>
            </div>
                <div id="sidebar" class="sidebar">
                    <a href="javascript:void(0)" class="closebtn" id="closebtn" onclick="closeNav()">×</a>
                    <a href="#furnitur">Furnitur</a>
                    <a href="#ruangan">Ruangan</a>
                    <a href="#desain-interior">Desain Interior</a>
                </div>
                <div id="menu" class="menu">
                 <button class="menu-button" id="menu-button" onclick="openNav()"><img src="ico/omjo.png" alt="OMJO Logo"></button>
                </div>
        
        <main>
        <section>
        <h2>Edit Data</h2>
    <form action="" method="post">
        <label for="">Nama Barang :</label>
        <input type="text" name="fnama" value="<?php echo $data['nama_barang'];?>"><br>
        <label for="">Kategori :</label>
        <input type="text" name="fkategori" value="<?php echo $data['kategori'];?>"><br>
        <label for="">Brand :</label>
        <input type="text" name="fbrand" value="<?php echo $data['brand'];?>"><br>
        <label for="">Harga :</label>
        <input type="text" name="fharga" value="<?php echo $data['harga'];?>"><br>
        <button type="submit"><i class="bi bi-floppy-fill"></i> Simpan</button>
    </form>
    </section>
    </main>
    </div>
        </div>
<script>
function openNav() {
  document.getElementById("sidebar").style.width = "250px";
  document.getElementById("menu").style.marginLeft = "250px";
    }

function closeNav() {
  document.getElementById("sidebar").style.width = "0";
  document.getElementById("menu").style.marginLeft= "0";
    }
</script>
</body>
</html>