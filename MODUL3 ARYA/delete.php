<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa

include('connect.php');

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM showroom_mobil WHERE id = '$id'");

    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil

    mysqli_query($conn, "DELETE FROM showroom_mobil WHERE id='$id'");

    // (4) Buatkan perkondisi jika eksekusi query berhasil

    if ($data) {
        echo "<script>alert('Data berhasil didelete.')</script>";
        echo "<meta http-equiv='refresh' content='1 url=list_mobil.php'>";
    } else {
        echo "<script>alert('Error: HAHAHA Error')</script>";
        echo "<meta http-equiv='refresh' content='1 url=list_mobil.php'>";
    }

// Tutup koneksi ke database setelah selesai menggunakan database

$conn->close();

?>