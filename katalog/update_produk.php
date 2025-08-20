<?php
$conn = new mysqli("localhost", "root", "", "bamboe_bojonegoro");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$id = intval($_POST['id']);
$nama = $conn->real_escape_string($_POST['nama']);
$harga = intval($_POST['harga']);
$deskripsi = $conn->real_escape_string($_POST['deskripsi']);
$gambar = "";

// Jika ada upload gambar baru
if (!empty($_FILES['gambar']['name'])) {
    $target_dir = "images/";
    $gambar = time() . "_" . basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $gambar;
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $conn->query("UPDATE produk SET nama='$nama', harga=$harga, deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id");
        echo "success";
    } else {
        echo "Upload gagal";
    }
} else {
    // tanpa ganti gambar
    $conn->query("UPDATE produk SET nama='$nama', harga=$harga, deskripsi='$deskripsi' WHERE id=$id");
    echo "success";
}
$conn->close();
?>
