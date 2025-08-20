<?php
session_start();

// Koneksi database
$conn = new mysqli("localhost", "root", "", "bamboe_bojonegoro");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek username di database
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verifikasi password
    if ($password == $row['password']) {
        // Simpan session login
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $row['username'];

        header("Location: admin.php"); // masuk ke dashboard
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.php';</script>";
}

$stmt->close();
$conn->close();
