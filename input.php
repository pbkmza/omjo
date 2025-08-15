<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama_barang = $_POST["nama_barang"];
    $kategori = $_POST["kategori"];
    $brand = $_POST["brand"];
    $harga = $_POST["harga"];
    settype($harga,"integer");

    if (file_exists("data.json")) {
        $current_data = file_get_contents("data.json");
        $array_data = json_decode($current_data, true);
    }else{
        $array_data = [];
    }

    // kode untuk data baru
    $kode = "F-" .str_pad(count
    ($array_data)+ 1, 3 ,"0", STR_PAD_LEFT);
    $_POST["kode"] = $kode;

    //menambah data baru
    $array_data[] = [
        'kode' => $kode,
        'nama_barang' => $nama_barang,
        'kategori' => $kategori,
        'brand' => $brand,
        'harga' => $harga,
    ];

    //menyimpan data kedalam data.json
    file_put_contents('data.json', json_encode($array_data, JSON_PRETTY_PRINT));
    header('Location: produk.php');
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
        <h2>Form Input</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="">Nama Barang:</label>
        <input type="text" name="nama_barang" required><br>
        <label for="">Kategori :</label>
        <input type="text" name="kategori" required><br>
        <label for="">Brand :</label>
        <input type="text" name="brand" required><br>
        <label for="">Harga :</label>
        <input type="text" name="harga" required><br>

        <button type="submit">Simpan</button>

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