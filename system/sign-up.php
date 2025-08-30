<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Pendaftaran Peserta Baharu</title>
        <link rel="icon" href="image/logo2.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="stylesheet.css" id="styles" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="min-vh-100 d-flex flex-column">

    <?php include 'header-nouser.php';
    require_once('dbconnection.php');
    include 'Validation.php';
    ?>

        <div class="container-fluid d-flex align-items-center justify-content-center m-0" style="min-height:82vh;"> <!--body-->
            <div class="bg-white border border-2 d-flex justify-content-center" style="min-height: 72vh; width: 75%; border-radius: 20px;">

                <div class="align-items-center m-1" style="width:80%;">

                    <!--content-->
                    <div class="display-5 fw-bold text-center m-4">Pendaftaran Peserta Baharu</div>

                    <form name="sign-up" class="d-grid gap-2" action="action-sign-up.php?location='sign-up'" 
                    method="post" onsubmit="return validateSignUp()">

                        <div class="row"> <!--nama-->

                            <label for="nama-peserta" class="col-sm-3 col-form-label">Nama:</label>
                            <div class="col-sm-9"><input type="text" class="form-control" name="nama-peserta" placeholder="Contoh: Tan Ah Beng" 
                            data-bs-toggle="tooltip" title="Nama perlu sama dengan nama dalam Kad Pengenalan"></div>

                        </div>

                        <div class="row"> <!--no kp-->

                            <label for="no-kad-pengenalan" class="col-sm-3 col-form-label">No Kad Pengenalan:</label>
                            <div class="col-sm-9"><input type="text" class="form-control" name="no-kad-pengenalan" placeholder="Contoh: 050102070395" 
                            data-bs-toggle="tooltip" title="Jangan letak '-'"></div>

                        </div>

                        <div class="row"> <!--jantina & umur-->

                            <label for="jantina" class="col-sm col-form-label" >Jantina:</label> <!--jantina-->

                            <div class="col-sm">

                                <select class="form-select" name="jantina">
                                    <option value="" hidden selected disabled style="color:grey;">Sila pilih...</option>
                                    <option value="P">Perempuan</option>
                                    <option value="L">Lelaki</option>
                                </select>

                            </div>

                            <label for="umur" class="col-sm col-form-label">Umur:</label> <!--umur-->

                            <div class="col-sm"><input type="number" class="form-control" name="umur" placeholder="Contoh: 17" 
                            data-bs-toggle="tooltip" title="Sila masukkan dari 7 hingga 18 sahaja"></div>

                        </div>

                        <div class="row"> <!--no telefon-->

                            <label for="no-telefon" class="col-sm-3 col-form-label">No telefon:</label>
                            <div class="col-sm-9"><input type="text" class="form-control" name="no-telefon" placeholder="Contoh: 0123456789" 
                            data-bs-toggle="tooltip" title="Jangan letak '-'"></div>

                        </div>

                        <div class="row"> <!--kategori-->

                            <label for="kategori" class="col-sm-3 col-form-label">Kategori:</label>
                            <div class="col-sm-9">

                                <select class="form-select" name="kategori" data-bs-toggle="tooltip" title="rendah: 7-12 menengah: 13-18">

                                    <option value="">Sila pilih...</option>

                                    <?php

                                        $hasil = mysqli_query($con,"SELECT kod_kategori, nama_kategori FROM kategori");
                                        while($row = mysqli_fetch_array($hasil)) {
                                            $nama_kategori = $row['nama_kategori'];
                                            $kod_kategori = $row['kod_kategori'];
                                            echo "<option value=".$kod_kategori.">".$nama_kategori."</option>";
                                        }
                                        mysqli_close($con);

                                    ?>

                                </select>

                            </div>

                        </div>

                        <div class="row"> <!--kod sekolah-->

                            <label for="kod-sekolah" class="col-sm-3 col-form-label">Kod Sekolah:</label>
                            <div class="col-sm-9"><input type="text" class="form-control" name="kod-sekolah" placeholder="Contoh: XXX1234" 
                            data-bs-toggle="tooltip" title="Sila dapat kod sekolah dari pihak sekolah"></div>

                        </div>

                        <div class="row"> <!--nama sekolah-->

                            <label for="nama-sekolah" class="col-sm-3 col-form-label">Nama Sekolah:</label>
                            <div class="col-sm-9"><input type="text" class="form-control" name="nama-sekolah" placeholder="Contoh: SMJK Phor Tay" 
                            data-bs-toggle="tooltip" title="Sila letak nama penuh sekolah"></div>

                        </div>

                        <div class="row">

                            <label for="password" class="col-sm col-form-label">Katalaluan:</label> <!--password-->

                            <div class="col-sm"><input type="password" class="form-control" name="password" 
                            placeholder="Sila masuk katalaluan"></div>

                            <label for="password-confirm" class="col-sm col-form-label">Pengesahan Katalaluan:</label> <!--password-confirm-->

                            <div class="col-sm"><input type="password" class="form-control" name="password-confirm" 
                            placeholder="Sila masuk katalaluan"></div>

                        </div>

                        <button type="submit" class="btn btn-primary text-white">Daftar</button>

                    </form>

                    <div class="text-end fw-bold"><a href="index.php" style="text-decoration: none; color:#f24236;">Log masuk?</a></div>

                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
    </body>
</html>