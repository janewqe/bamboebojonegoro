<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda - Bamboe Bojonegoro</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f6fff5;
    color: #333;
  }
  /* HEADER */
  .site-header {
    background-color: #2e7d32;
    color: white;
    padding: 15px 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  }
  .site-header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
    margin: auto;
  }
  .site-header h1 {
    margin: 0;
    font-size: 1.8rem;
  }
  .site-header nav button {
    background-color: white;
    color: #2e7d32;
    border: none;
    padding: 8px 15px;
    margin-left: 5px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s;
  }
  .site-header nav button:hover {
    background-color: #a5d6a7;
  }

  /* KONTEN */
  main {
    width: 90%;
    margin: auto;
    padding: 30px 0;
    line-height: 1.6;
  }
  h2 {
    color: #2e7d32;
  }
  /* Gambar utama */
  main > img {
    display: block;
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    margin: 15px auto;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }

  .buy-btn {
    background-color: #2e7d32;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s;
  }
  .buy-btn:hover {
    background-color: #1b5e20;
  }

  /* GALERI FOTO */
  .gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 15px;
    margin-top: 30px;
  }
  .gallery img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.3s;
  }
  .gallery img:hover {
    transform: scale(1.05);
  }
  .gallery figcaption {
    font-size: 0.85rem;
    text-align: center;
    margin-top: 5px;
    color: #555;
  }

  /* FOOTER */
  .site-footer {
    background-color: #2e7d32;
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: 30px;
  }

  .btn-container {
  text-align: center;
  margin-top: 25px;
}

/* Tombol Pesan */
.buy-btn {
  background: linear-gradient(135deg, #2e7d32, #43a047);
  color: white;
  font-size: 1.3rem;
  font-weight: bold;
  border: none;
  padding: 15px 40px;
  border-radius: 50px;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}

/* Hover efek */
.buy-btn:hover {
  background: linear-gradient(135deg, #1b5e20, #2e7d32);
  transform: scale(1.05);
  box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}
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

  <!-- KONTEN -->
  <main>
    <h2>KKN UNUGIRI BOJONEGORO 2025</h2>
    <img src="images/IMG 12.jpg" alt="Bambu">
    <h2>Bambu: Material Ramah Lingkungan dan Serbaguna</h2>
    <p>Bambu adalah salah satu tanaman yang memiliki banyak manfaat dan telah digunakan selama ribuan tahun oleh masyarakat di seluruh dunia. 
      Di Bojonegoro tepatnya di desa Sugihwaras, kerajinan bambu berkembang pesat dan menjadi sumber penghasilan bagi banyak pengrajin lokal.</p>
    <p>Selain ramah lingkungan karena tumbuh cepat dan tidak memerlukan perawatan berlebih, bambu juga memiliki kekuatan dan fleksibilitas yang tinggi. 
      Inilah sebabnya bambu banyak digunakan untuk membuat berbagai produk, mulai dari perabot rumah tangga, kerajinan tangan, dll.</p>
    <p>Katalog Bamboe Bojonegoro hadir untuk memperkenalkan produk-produk bambu berkualitas tinggi kepada masyarakat luas. 
      Semua produk dibuat dengan cinta dan keterampilan oleh pengrajin lokal, menjaga tradisi sekaligus memenuhi kebutuhan modern.</p>

    <h3>Keunggulan Produk Bambu:</h3>
    <ul>
      <li>Ramah lingkungan</li>
      <li>Tahan lama dan kuat</li>
      <li>Memiliki nilai estetika tinggi</li>
      <li>Harga terjangkau</li>
    </ul>
    <p>Mari dukung produk lokal dan beralih ke penggunaan produk bambu untuk kehidupan yang lebih hijau.</p>

    <!-- GALERI FOTO -->
    <h2>Belajar Anyaman Bambu Bersama Kami</h2>
    <p>Kami tidak hanya fokus pada produk, tetapi juga pada pelestarian budaya lokal.
      Melalui program pembelajaran anyaman bambu, kami hadir di sekolah, lembaga,
      hingga desa untuk berbagi keterampilan, mengasah kreativitas, 
      dan menjaga warisan tradisi tetap hidup.</p>
    <p>Mari bergabung dalam kegiatan ini, belajar langsung dari ahlinya,
      sekaligus ikut berkontribusi melestarikan seni anyaman bambu untuk generasi mendatang.</p>

    <h3>PAKET PEMBELAJARAN :</h3>
    <!-- <div class="gallery">
      <figure>
        <img src="images/IMG 2.jpg" alt="Tanaman Bambu di Alam">
        <figcaption>Paket Hemat</figcaption>
      </figure>
      <figure>
        <img src="images/IMG 4.jpg" alt="Proses Panen Bambu">
        <figcaption>Paket Sederhana</figcaption>
      </figure>
      <figure>
        <img src="images/IMG 8.jpg" alt="Pengolahan Bambu">
        <figcaption>Paket Sedang</figcaption>
      </figure>
      <figure>
        <img src="images/IMG 9.jpg" alt="Proses Pembuatan Produk Bambu">
        <figcaption>Paket Banyak</figcaption>
      </figure>
      <figure>
        <img src="images/IMG 11.jpg" alt="Produk Jadi dari Bambu">
        <figcaption>Paket Ekstra</figcaption>
      </figure>
    </div> -->

    <div class="btn-container">
      <button class="buy-btn">Pesan Sekarang</button>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="container">
      <p>&copy; 2025 KKN UNUGIRI Bojonegoro.</p>
    </div>
  </footer>

  <!-- SCRIPT WHATSAPP -->
  <script>
    const nomorWA = "6282244949570"; // Nomor WhatsApp

    document.querySelectorAll(".buy-btn").forEach(button => {
      button.addEventListener("click", function() {
        const pesan = `Halo, saya ingin pesan pembelajaran anyaman bambu.`;
        const linkWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
        window.open(linkWA, "_blank");
      });
    });
  </script>
</body>
</html>
