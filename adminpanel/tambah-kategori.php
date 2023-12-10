<?php
require "session.php";
require "../koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>
            <form action=" " method="post">
                <div class="">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control" autocomplete="off">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST["simpan_kategori"])) {
                $kategori = htmlspecialchars($_POST["kategori"]);

                $queryPembeda = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                $jumlahBaru = mysqli_num_rows($queryPembeda);

                if ($jumlahBaru > 0) {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori Sudah Ada
                    </div>
                    <?php
                } else {
                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                    if ($querySimpan) {
                    ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil Tersimpan
                        </div>
                        <meta http-equiv="refresh" content="1.5; url = kategori.php">
            <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>