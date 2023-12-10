<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['p'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <title>Detail kategori</title>
</head>

<style>
    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <div class="my-5 col-12 col-md-6 mx-auto">
            <div class="card" style=" background-color: rgba(173, 216, 230, 0.6); box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
                    <h2>Detail Kategori</h2>
                    <form action="" method="post">
                        <div>
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete=off>
                        </div>
                        <div class="mt-4    ">
                            <button type="submit" class="btn btn-primary" name="editBtn">Ubah</button>
                            <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['editBtn'])) {
                        $kategori = htmlspecialchars($_POST['kategori']);

                        if ($data['nama'] == $kategori) {
                    ?>
                            <meta http-equiv="refresh" content="0; url = kategori.php">
                            <?php
                        } else {
                            $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama ='$kategori'");
                            $jumlahData = mysqli_num_rows($query);
                            if ($jumlahData > 0) {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Kategori Sudah Ada
                                </div>
                                <?php
                            } else {

                                $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                                if ($querySimpan) {
                                ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                        Kategori Berhasil Diubah
                                    </div>
                                    <meta http-equiv="refresh" content="1.1; url = kategori.php">
                            <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }

                    if (isset($_POST['deleteBtn'])) {
                        $cek = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$id' ");
                        $hitungData = mysqli_num_rows($cek);

                        if ($hitungData > 0) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Kategori Tida Bisa Dihapus
                            </div>

                        <?php
                            die();
                        } else {
                        }

                        $queryHapus = mysqli_query($con, "DELETE FROM kategori Where id='$id'");

                        if ($queryHapus) {
                        ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Kategori Sudah Dihapus
                            </div>
                            <meta http-equiv="refresh" content="1.1; url = kategori.php">

                    <?php
                        } else {
                            echo mysqli_error($con);
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