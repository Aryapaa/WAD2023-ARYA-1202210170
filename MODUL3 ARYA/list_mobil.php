<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>

<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)

            $query = "SELECT * FROM showroom_mobil";
            $result = $conn->query($query);

            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id


            if ($result->num_rows > 0) {
                echo '<table  class="text-center" width=100% border="1" cellpadding="4">
                        <thead>
                            <tr>
                                <th>Nama Mobil</th>
                                <th>Brand Mobil</th>
                                <th>Warna Mobil</th>
                                <th>Tipe Mobil</th>
                                <th>Harga Mobil</th>
                            </tr>
                        </thead>
                    <tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['nama_mobil'] . '</td>
                            <td>' . $row['brand_mobil'] . '</td>
                            <td>' . $row['warna_mobil'] . '</td>
                            <td>' . $row['tipe_mobil'] . '</td>
                            <td>' . $row['harga_mobil'] . '</td>
                            <td><a class="btn btn-primary" href="form_detail_mobil.php?id='.$row['id'].'">Lihat Detail</a></td>
                        </tr>';
                }

                echo '
                        </tbody>
                    </table>';
            }

            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'

            else {
                echo "Tidak Ada Data Dalam Tabel";
            }

            //<!--  **********************  1  **************************     -->










            //<!--  **********************  1  **************************     -->

            //<!--  **********************  2  **************************     -->






            //<!--  **********************  2  **************************     -->
            ?>
        </div>
    </center>
</body>

</html>