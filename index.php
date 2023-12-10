<?php
require "koneksi.php";


$queryProduk = mysqli_query($con, "SELECT id, nama, harga , foto, detail FROM produk LIMIT 6");



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Toko Online | Home</title>
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Online Fashion</h1>
            <h3>Mau Cari Apa</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Barang" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Highlighted Kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">

            <div class="terlaris">
                <h3>Kategori Terlariss</h3>
            </div>

            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Baju Pria">Baju Pria</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Baju Wanita">Baju Wanita</a></h4>

                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Sepatu">Sepatu</a></h4>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Me -->

    <div class="container-fluid warna3 py-5">

        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">Hai, saya Ahmad Abian Hakim! Saya adalah otak di balik layar di Toko Onilne Shop. Kami adalah tim kecil yang besar hati dengan hasrat untuk membawa produk unik dan berkualitas ke tangan Anda. Selamat berbelanja, dan jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau hanya ingin berbicara!
            </p>
        </div>
    </div>

    <!-- Produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">

                <?php
                while ($data = mysqli_fetch_array($queryProduk)) { ?>


                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?php echo $data['foto']; ?>" class=" card-img-top" alt="...">

                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo  $data['nama'] ?></h4>
                                <p class="card-text text-truncate"><?php echo  $data['detail'] ?></p>
                                <p class="card-text text-harga">Rp. <?php echo $data['harga'] ?></p>
                                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 text-white">Lihat Detail</a>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <a href="produk.php" class="btn btn-outline-warning mt-3" type="button">See More</a>
        </div>
    </div>


    <!-- Footer -->
    <?php require "footer.php" ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>