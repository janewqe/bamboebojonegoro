<?php
// Koneksi ke database
$servername = "localhost"; 
$username   = "root";       
$password   = "";           
$dbname     = "bamboe_bojonegoro";  

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Query ambil produk
$sql = "SELECT id, nama, harga, gambar, deskripsi, keterangan FROM produk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bamboe Bojonegoro</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background-color: #f6fff5; color: #333; }
    .site-header { background-color: #2e7d32; color: white; padding: 15px 0; box-shadow: 0 2px 8px rgba(0,0,0,0.15); }
    .site-header .container { display: flex; justify-content: space-between; align-items: center; width: 90%; margin: auto; }
    .site-header h1 { margin: 0; font-size: 1.8rem; }
    .site-header nav button { background-color: white; color: #2e7d32; border: none; padding: 8px 15px; margin-left: 5px; border-radius: 5px; cursor: pointer; font-weight: bold; transition: all 0.3s; }
    .site-header nav button:hover { background-color: #a5d6a7; }
    .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; padding: 30px; }
    .product-card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; padding-bottom: 15px; transition: transform 0.3s ease; }
    .product-card:hover { transform: scale(1.05); }
    .product-card img { width: 100%; height: 180px; object-fit: cover; }
    .product-card h3 { margin: 10px 0 5px; }
    .product-card p { color: #388e3c; font-weight: bold; }
    .buy-btn { background-color: #2e7d32; color: white; border: none; padding: 10px 20px; margin-top: 10px; cursor: pointer; border-radius: 5px; transition: all 0.3s; }
    .buy-btn:hover { background-color: #1b5e20; }
    .site-footer { background-color: #2e7d32; color: white; text-align: center; padding: 15px 0; margin-top: 30px; }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="site-header">
    <div class="container">
      <h1>Bamboe Bojonegoro</h1>
      <nav>
        <button onclick="window.location.href='index.php'">Beranda</button>
        <button onclick="window.location.href='produk.php'">Produk</button>
        <button onclick="window.location.href='kontak.php'">Kontak</button>
      </nav>
    </div>
  </header>

  <!-- PRODUK -->
  <main>
    <section class="product-grid">
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="product-card">
            <img src="images/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
            <h3><?php echo $row['nama']; ?></h3>
            <p>Rp <?php echo number_format($row['harga'], 0, ',', '.').',00'; ?></p>

            <!-- Tombol toggle keterangan -->
            <button class="toggle-btn">Lihat Keterangan</button>

            <!-- Detail produk -->
            <div class="details" style="display:none;">
              <p class="description"><?php echo $row['deskripsi']; ?></p>
            </div>

            <!-- Tombol Pesan dengan nama produk -->
            <button class="buy-btn" data-nama="<?php echo $row['nama']; ?>">Pesan Sekarang</button>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Tidak ada produk tersedia.</p>
      <?php endif; ?>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <p>&copy; 2025 KKN Unugiri Bojonegoro.</p>
  </footer>

<script>
  const nomorWA = "6282244949570"; // Nomor WhatsApp

  document.querySelectorAll(".buy-btn").forEach(button => {
    button.addEventListener("click", function() {
      const namaProduk = this.getAttribute("data-nama"); // Ambil nama produk
      const pesan = `Halo, saya ingin pesan produk *${namaProduk}*. Apakah masih tersedia?`;
      const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
      window.open(linkWA, "_blank");
    });
  });

  document.querySelectorAll(".toggle-btn").forEach(function(btn){
    btn.addEventListener("click", function(){
      let details = this.nextElementSibling;
      if(details.style.display === "none"){
        details.style.display = "block";
        this.textContent = "Sembunyikan Keterangan";
      } else {
        details.style.display = "none";
        this.textContent = "Lihat Keterangan";
      }
    });
  });
</script>

</body>
</html>

<?php $conn->close(); ?>
