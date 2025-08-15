<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if (file_exists('user.json')) {
        $current_data = file_get_contents('user.json');
        $array_data = json_decode($current_data, true);
        $found = false;
        foreach ($array_data as $account) {
            if ($account['username'] === $user && $account['password'] === $pass) {
                $found = true;
                if (isset($account['kategori'])) {
                    if ($account['kategori'] === 'seller') {
                        header('Location: produk.php');
                        exit();
                    } elseif ($account['kategori'] === 'buyer') {
                        header('Location: index.html');
                        exit();
                    }
                }
            }
        }
        if (!$found) {
            echo '<script>alert("Username atau Password yang Anda masukkan salah");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="shortcut icon" href="ico/omjo.png" image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="mid-logo">
        <img src="ico/omjo.png" alt="OMJO Logo">
    </div>
    <div class="box-form" id="box-form">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <h1>LOGIN</h1>
                <div class="box-input" id="box-input">
                    <div class="user">
                        <ion-icon name="people-outline"></ion-icon>
                        <input type="text" name="username" id="username" placeholder="@contoh/contoh@gmail.com" required><br>
                    </div>
                    <div class="pass">
                        <ion-icon name="key-outline"></ion-icon>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" required><br>
                    </div>
                    <div class="rem-sig">
                        <div class="remember">
                            <label>
                                <input type="checkbox" checked="checked" name="remember"> Remember me
                            </label>
                        </div>
                        <button>Sign in</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>