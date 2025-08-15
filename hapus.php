<?php
if (isset($_GET["kodekirim"])){
    $kodekirim = $_GET["kodekirim"];
    if (file_exists('data.json')) {
        $json_data = file_get_contents('data.json');
        $array_data = json_decode($json_data, true);
        $array_data = array_filter($array_data, function($data) use($kodekirim){
            return $data['kode'] !== $kodekirim;
        });
    
    $array_data =array_values($array_data);
    file_put_contents('data.json', json_encode($array_data,JSON_PRETTY_PRINT));
    }
}
header('Location: produk.php');
exit;
?>