<?php

require 'connect.php';

// (1) Mulai session

session_start();

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    // b. Ambil nilai input name
    // c. Ambil nilai input username
    // d. Ambil nilai input password
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()

$email = $_POST['email'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email

$query1 = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query1);

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )

    // a. Buatlah query untuk melakukan insert data ke dalam database

    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
    
if(mysqli_num_rows($result) == 0){
    $query2 = "INSERT INTO users (email, name, username, password) VALUES ('$email', '$name', '$username', '$password')";
    $insert = mysqli_query($conn, $query2);

    if($insert){
        $_SESSION['message'] = 'Pendaftaran berhasil';
        $_SESSION['color'] = 'success';
        header('Location: ../views/login.php');
    }else {
        $_SESSION['message'] = 'Pendaftaran gagal';
    }
}

// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar

else{
    $_SESSION['message'] = 'Email sudah terdaftar';
    header('Location: ../views/register.php');
}

?>