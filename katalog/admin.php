<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header("Location: login.php");
  exit;
}

// Ambil username dari session
$username = $_SESSION['admin_username'] ?? 'Admin';

// Koneksi database
$conn = new mysqli("localhost", "root", "", "bamboe_bojonegoro");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus produk
if (isset($_GET['hapus'])) {
  $id = intval($_GET['hapus']);
  $conn->query("DELETE FROM produk WHERE id=$id");
  header("Location: admin.php");
  exit;
}

// Ambil semua produk
$result = $conn->query("SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Produk</title>
  <style>
    body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f4f4f4; }
    header {
      background:#2e7d32; color:white; padding:15px 20px; display:flex;
      justify-content:space-between; align-items:center;
    }
    header h1 { margin:0; font-size:22px; }
    header .user-info { font-size:14px; }
    header a.logout {
      background:#d32f2f; color:white; padding:6px 12px; border-radius:5px; text-decoration:none;
      font-size:14px; margin-left:10px;
    }
    header a.logout:hover { background:#b71c1c; }

    .container { padding:20px; }

    .btn-primary {
      padding:10px 15px; background:#2e7d32; color:white; border:none;
      border-radius:5px; cursor:pointer;
    }
    .btn-primary:hover { background:#1b5e20; }

    .table-container {
      background:#fff; padding:20px; border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1); margin-top:20px;
    }
    table { border-collapse:collapse; width:100%; margin-top:10px; }
    th, td { border:1px solid #ccc; padding:8px; text-align:left; }
    th { background:#2e7d32; color:white; }
    img { max-width:80px; border-radius:5px; }
    .delete, .edit { padding:5px 8px; border-radius:5px; color:white; text-decoration:none; font-size:14px; }
    .delete { background:#d32f2f; }
    .delete:hover { background:#b71c1c; }
    .edit { background:#1976d2; }
    .edit:hover { background:#0d47a1; }

    /* Modal */
    .modal {
      display:none; position:fixed; top:0; left:0; width:100%; height:100%;
      background:rgba(0,0,0,0.5); justify-content:center; align-items:center;
      z-index:1000;
    }
    .modal-content {
      background:#fff; padding:20px; border-radius:10px; width:400px;
      box-shadow:0 4px 10px rgba(0,0,0,0.3);
      animation:slideDown 0.3s ease;
    }
    @keyframes slideDown {
      from { transform:translateY(-50px); opacity:0; }
      to { transform:translateY(0); opacity:1; }
    }
    .modal-content h2 { margin-top:0; color:#2e7d32; }
    .modal-content input, .modal-content textarea {
      width:100%; padding:8px; margin:6px 0; border:1px solid #ccc; border-radius:5px;
    }
    .modal-content button {
      padding:8px 12px; margin-top:8px; border:none; border-radius:5px; cursor:pointer;
    }
    .save-btn { background:#2e7d32; color:white; }
    .save-btn:hover { background:#1b5e20; }
    .cancel-btn { background:#d32f2f; color:white; }
    .cancel-btn:hover { background:#b71c1c; }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <h1>Dashboard Admin - Produk</h1>
    <div class="user-info">
      Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>
      <a href="logout.php" class="logout">Logout</a>
    </div>
  </header>

  <div class="container">
    <!-- Tombol Tambah Produk -->
    <button class="btn-primary" onclick="openTambahModal()">+ Tambah Produk</button>

    <!-- Tabel Produk -->
    <div class="table-container">
      <h2>Daftar Produk</h2>
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): 
            $no = 1;
          ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                <td>
                  <?php if ($row['gambar']): ?>
                    <img src="images/<?= $row['gambar'] ?>" alt="<?= htmlspecialchars($row['nama']) ?>">
                  <?php endif; ?>
                </td>
                <td>
                  <a class="edit" href="#"
                    onclick="openEditModal('<?= $row['id'] ?>','<?= htmlspecialchars($row['nama']) ?>','<?= $row['harga'] ?>','<?= htmlspecialchars($row['deskripsi']) ?>','<?= $row['gambar'] ?>')">Edit</a> |
                  <a class="delete" href="admin.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="6">Belum ada produk.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div id="tambahModal" class="modal">
    <div class="modal-content">
      <h2>Tambah Produk</h2>
      <form id="formProduk" method="POST" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="number" name="harga" placeholder="Harga Produk (Rp)" required>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="file" name="gambar" accept="image/*" required>
        <button type="submit" class="save-btn">Tambah</button>
        <button type="button" class="cancel-btn" onclick="closeTambahModal()">Batal</button>
      </form>
    </div>
  </div>

  <!-- Modal Edit -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <h2>Edit Produk</h2>
      <form id="formEdit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id="editId">
        <input type="text" name="nama" id="editNama" required>
        <input type="number" name="harga" id="editHarga" required>
        <textarea name="deskripsi" id="editDeskripsi"></textarea>
        <p>Gambar saat ini: <span id="oldGambar"></span></p>
        <input type="file" name="gambar" accept="image/*">
        <button type="submit" class="save-btn">Simpan Perubahan</button>
        <button type="button" class="cancel-btn" onclick="closeEditModal()">Batal</button>
      </form>
    </div>
  </div>

<script>
/* Tambah Produk */
function openTambahModal(){ document.getElementById("tambahModal").style.display="flex"; }
function closeTambahModal(){ document.getElementById("tambahModal").style.display="none"; }
const form = document.getElementById("formProduk");
form.addEventListener("submit", function(e) {
  e.preventDefault();
  const formData = new FormData(form);
  fetch("simpan_produk.php", { method:"POST", body:formData })
  .then(res => res.text())
  .then(data => {
    if(data === "success"){ alert("Produk berhasil disimpan!"); location.reload(); }
    else{ alert("Gagal: " + data); }
  });
});

/* Edit Produk */
function openEditModal(id,nama,harga,deskripsi,gambar){
  document.getElementById("editId").value=id;
  document.getElementById("editNama").value=nama;
  document.getElementById("editHarga").value=harga;
  document.getElementById("editDeskripsi").value=deskripsi;
  document.getElementById("oldGambar").innerText=gambar;
  document.getElementById("editModal").style.display="flex";
}
function closeEditModal(){ document.getElementById("editModal").style.display="none"; }

const formEdit=document.getElementById("formEdit");
formEdit.addEventListener("submit",function(e){
  e.preventDefault();
  const formData=new FormData(formEdit);
  fetch("update_produk.php",{method:"POST",body:formData})
  .then(res=>res.text())
  .then(data=>{
    if(data==="success"){ alert("Produk berhasil diupdate!"); location.reload(); }
    else{ alert("Gagal update: "+data); }
  });
});
</script>
</body>
</html>
<?php $conn->close(); ?>
