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
                    <h2>Data Barang</h2>
            <!-- Membuat tabel -->
            <table border="1">
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Brand</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                <!-- Isi tabel -->
                <?php
                if (file_exists("data.json")) {
                    $current_data = file_get_contents("data.json");
                    $array_data = json_decode($current_data, true);

                    foreach ($array_data as $data) {

                ?>
                        <tr>
                            <td><?php echo $data["kode"] ?></td>
                            <td><?php echo $data["nama_barang"] ?></td>
                            <td><?php echo $data["kategori"] ?></td>
                            <td><?php echo $data["brand"] ?></td>
                            <td><?php echo "Rp. ".number_format($data["harga"],0, ',', '.') ?></td>
                            <td>
                                <a href="edit.php?kodekirim=<?php echo $data['kode']; ?>"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="tampilConfirm('<?php echo $data['kode']; ?>')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
         
        </table>
           <a href="input.php"><button>Tambah Barang</button></a>    
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
    function tampilConfirm(kode) {
        let konfirmasi = confirm("Apakah kamu yakin ingin menghapus data ini ?");
        if (konfirmasi) {
            window.location.href = "hapus.php?kodekirim=" + encodeURIComponent(kode);
        }
    }
</script>
</body>
</html>