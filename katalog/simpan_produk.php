<?php
// Koneksi database
$conn = new mysqli("localhost", "root", "", "bamboe_bojonegoro");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

// Upload gambar
$targetDir = "images/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}
$fileName = time() . "_" . basename($_FILES["gambar"]["name"]);
$targetFile = $targetDir . $fileName;

if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
    $sql = "INSERT INTO produk (nama, harga, deskripsi, gambar) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $nama, $harga, $deskripsi, $fileName);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "upload_failed";
}

$conn->close();
?>
