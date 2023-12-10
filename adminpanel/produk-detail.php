<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['p'];

$query = mysqli_query($con, "SELECT a.*,b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$kategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <title>Produk Detail</title>
</head>

<style>
    form div {
        margin-bottom: 10px;
    }

    .image-container {

        display: flex;
        flex-direction: column;

        align-items: center;

    }


    .image-container label {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .image-container img {
        width: 150px;

    }

    .btn-hover {
        transition: box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out;
    }

    .btn-hover:hover {
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-3">
        <a href="javascript:history.back()" class="btn btn-light btn-hover">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="container mt-5 mb-5">
        <div class="my-5 col-12 col-md-6 mx-auto">
            <div class="card" style=" background-color: rgba(173, 216, 230, 0.6); box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
                    <h2>Detail Produk</h2>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off">
                        </div>
                        <div class="">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="<?php echo $data['kategori_id'] ?>"><?php echo $data['nama_kategori'] ?></option>
                                <?php
                                while ($dataKategori = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="<?php echo $data['harga'] ?>" autocomplete="off">
                        </div>
                        <div class="image-container">
                            <label for="currentFoto">Foto Produk Sekarang</label>
                            <img src="../image/<?php echo $data['foto'] ?>" alt="" srcset="">
                        </div>
                        <div class="">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="">
                            <label for="">Detail</label>
                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                        <?php echo $data['detail'] ?>
                    </textarea>
                        </div>
                        <div class="">
                            <label for="">Ketersediaan Stok</label>
                            <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok']; ?></option>
                                <?php
                                if ($data['ketersediaan_stok'] == 'tersedia') {
                                ?>
                                    <option value="habis">Habis</option>
                                <?php
                                } else {
                                ?>
                                    <option value="habis">Tersedia</option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                        </div>
                    </form>


                    <?php
                    if (isset($_POST['simpan'])) {
                        $nama = htmlspecialchars($_POST['nama']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                        $target_dir = "../image/";
                        $nama_file = basename($_FILES['foto']['name']);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $image_size = $_FILES['foto']['size'];
                        $random_name = generateRandomString(10);
                        $nama_baru = $random_name . "." . $imageFileType;


                        if ($nama == '' || $kategori == '' || $harga == '') {

                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Nama, Kategori dan Harga wajib diisi
                            </div>
                            <?php
                        } else {
                            $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori' , nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id=$id ");


                            if ($nama_file != '') {
                                if ($image_size > 5000000) {
                            ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        Foto tidak boleh lebih dari 5 mb
                                    </div>
                                    <?php
                                } else {

                                    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
                                    ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            File harus bertipe jpg / png / jpeg / gif
                                        </div>
                                        <?php
                                    } else {
                                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $nama_baru);

                                        $queryUpdate = mysqli_query($con, "UPDATE produk SET foto = '$nama_baru' WHERE id ='$id'");

                                        if ($queryUpdate) {
                                        ?>
                                            <div class="alert alert-primary mt-3" role="alert">
                                                Produk Berhasil Diupdate
                                            </div>
                                            <meta http-equiv="refresh" content="1.5; url = produk.php">

                            <?php
                                        } else {
                                            echo mysqli_error($con);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if (isset($_POST['delete'])) {
                        $hapusProduk = mysqli_query($con, "DELETE FROM produk WHERE id = '$id'");

                        if ($hapusProduk) {

                            ?>

                            <div class="alert alert-primary mt-3" role="alert">
                                Produk Sudah Dihapus
                            </div>
                            <meta http-equiv="refresh" content="1.1; url = produk.php">

                    <?php
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