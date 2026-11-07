
<?php

if (isset($_POST['simpan'])) {

    $produk = $_POST["namaproduk"];
    $harga = $_POST["harga"];
    $stock = $_POST["stok"];
    $kategori = $_POST["kategori"];

    $gambar = $_FILES["gambar"]["name"];
    $tmp = $_FILES["gambar"]["tmp_name"];

    include __DIR__ . '/pages/koneksi.php';

    if (!empty($gambar)) {
        move_uploaded_file($tmp, __DIR__ . "/uploads/" . $gambar);
    }

    $query = "INSERT INTO produk
    (id, nama_produk, harga, stok, gambar, kategori)
    VALUES (NULL, '$produk', '$harga', '$stock', '$gambar', '$kategori')";

    $result = mysqli_query($connect, $query);

if ($result) {
    header("Location: index.php?pages=products");
    exit;
} else {
    echo "Gagal menambahkan produk: " . mysqli_error($connect);
}
}

?>
