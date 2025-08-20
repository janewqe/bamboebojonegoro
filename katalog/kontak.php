<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Bamboe Bojonegoro</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f8f9fa;
      color: #333;
    }

    /* Header */
    .site-header {
      background: linear-gradient(to right, #2e7d32, #66bb6a);
      padding: 15px 0;
      color: white;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
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
    }
    .site-header nav button {
      background: transparent;
      border: none;
      color: white;
      font-size: 16px;
      margin-left: 15px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }
    .site-header nav button:hover {
      color: #c8e6c9;
    }

    /* Konten */
    .container {
      width: 90%;
      max-width: 900px;
      margin: 30px auto;
    }
    h2 {
      color: #2e7d32;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Form Card */
    .form-card {
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }
    .form-card label {
      display: block;
      font-weight: bold;
      margin-top: 15px;
      margin-bottom: 5px;
    }
    .form-card input,
    .form-card textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: 0.3s;
    }
    .form-card input:focus,
    .form-card textarea:focus {
      border-color: #2e7d32;
      outline: none;
      box-shadow: 0 0 6px rgba(46,125,50,0.3);
    }
    .form-card button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      background: #2e7d32;
      color: white;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }
    .form-card button:hover {
      background: #1b5e20;
    }

    /* Kontak Info */
    .contact-info, .map {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }
    .contact-info h3, .map h3 {
      margin-top: 0;
      color: #2e7d32;
    }
    .contact-info a {
      color: #2e7d32;
      font-weight: bold;
      text-decoration: none;
    }
    .contact-info a:hover {
      text-decoration: underline;
    }

    /* Footer */
    .site-footer {
      text-align: center;
      padding: 15px 0;
      background: #2e7d32;
      color: white;
      margin-top: 30px;
    }
  </style>
</head>
<body>

  <!-- Header -->
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

  <!-- Konten Kontak -->
  <main class="container">
    <h2>Hubungi Kami</h2>
    <p style="text-align:center;">Silakan isi form berikut untuk menghubungi kami atau langsung pesan melalui WhatsApp.</p>

    <div class="form-card">
      <form id="contactForm">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>

        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda..." required></textarea>

        <button type="submit">Kirim via WhatsApp</button>
      </form>
    </div>

    <div class="contact-info">
      <h3>Kontak Langsung</h3>
      <p>📍 Alamat: Keloran, Sugihwaras, Kec. Ngraho, Kabupaten Bojonegoro, Jawa Timur 62165</p>
      <p>📞 Telp/WA: <a href="https://wa.me/6282244949570" target="_blank">+62 822-4494-9570</a></p>
    </div>

    <!-- Peta Lokasi -->
    <div class="map">
      <h3>Lokasi Kami</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.213313211649!2d111.503405!3d-7.2615194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79dfb9dfc32c11:0x559e9da99452fbee!2sKerajinan%20Bambu%20Bojonegoro!5e0!3m2!1sid!2sid!4v1690000000000!5m2!1sid!2sid"
        width="100%"
        height="350"
        style="border:0; border-radius:12px;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <p>&copy; 2025 KKN UNUGIRI Bojonegoro.</p>
    </div>
  </footer>

  <!-- Script Kirim WhatsApp -->
  <script>
    const nomorWA = "6282244949570"; // Ganti dengan nomor WA Anda

    document.getElementById("contactForm").addEventListener("submit", function(event) {
      event.preventDefault();
      const nama = document.getElementById("nama").value;
      const pesan = document.getElementById("pesan").value;
      const textWA = `Halo, saya ${nama}. ${pesan}`;
      const urlWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(textWA)}`;
      window.open(urlWA, "_blank");
    });
  </script>

</body>
</html>
