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

<style>
    .btn-hover {
        transition: box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out;
    }

    .btn-hover:hover {
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>

<body>
    <div class="container mt-3">
        <a href="javascript:history.back()" class="btn btn-light btn-hover">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container mt-5">
        <div class="my-5 col-12 col-md-6 mx-auto">
            <div class="card" style="background-color: rgba(173, 216, 230, 0.6); box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
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
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>