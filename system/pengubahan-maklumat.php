<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengubahan Maklumat Peserta</title>
    <link rel="icon" href="image/logo2.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="stylesheet.css" id="styles" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="min-vh-100 d-flex flex-column">

    <?php include 'header.php';
    require_once('dbconnection.php');
    $ID_peserta = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM peserta INNER JOIN sekolah ON sekolah.kod_sekolah = peserta.kod_sekolah WHERE ID_peserta = '$ID_peserta';");
    if ($result->num_rows >0) {
        while($rows=$result->fetch_assoc()){
            $nama_peserta=$rows['nama_peserta'];
            $no_kp=$rows['no_kp'];
            $jantina=$rows['jantina'];
            $umur=$rows['umur'];
            $no_tel=$rows['no_telefon'];
            $kategori=$rows['kod_kategori'];
            $kod_sekolah=$rows['kod_sekolah'];
            $nama_sekolah=$rows['nama_sekolah'];
            $psw_peserta=$rows['psw_peserta'];

        }
    }
    ?>
    
    <div class="container-fluid d-flex align-items-center justify-content-center m-0" style="min-height:82vh;">
        <!--body-->
        <div id="body" class="bg-white border border-2 d-flex justify-content-center" style="min-height: 72vh; width: 75%; border-radius: 20px;">

            <div class="align-items-center m-1" style="width:80%;">

                <!--content-->
                <div class="text-dark display-5 fw-bold text-center m-4">Pengubahan Maklumat Peserta</div>

                <form name="sign-up" class="d-grid gap-2" action="action-kemaskini.php?id='<?php echo $ID_peserta; ?>'" method="POST" onsubmit="return validateSignUp()">

                    <div class="row">
                        <!--nama-->

                        <label for="nama-peserta" class="col-sm-3 col-form-label text-dark">Nama:</label>
                        <div class="col-sm-9"><input type="text" class="form-control" name="nama-peserta" 
                        placeholder="Contoh: Tan Ah Beng" data-bs-toggle="tooltip" title="Nama perlu sama dengan nama dalam Kad Pengenalan" 
                        value="<?php echo $nama_peserta;?>"></div>

                    </div>

                    <div class="row">
                        <!--no kp-->

                        <label for="no-kad-pengenalan" class="col-sm-3 col-form-label text-dark">No Kad Pengenalan:</label>
                        <div class="col-sm-9"><input type="text" class="form-control" name="no-kad-pengenalan" pattern="([0-9]{12})" 
                        placeholder="Contoh: 050102070395" data-bs-toggle="tooltip" title="Jangan letak '-'"
                        value="<?php echo $no_kp;?>"></div>

                    </div>

                    <div class="row">
                        <!--jantina & umur-->

                        <label for="jantina" class="col-sm col-form-label text-dark">Jantina:</label>
                        <!--jantina-->

                        <div class="col-sm">

                            <select class="form-select" name="jantina">
                                <option value="" hidden disabled style="color:grey;">Sila pilih...</option>
                                <option value="P" <?php if ($jantina="P") {echo 'selected';};?>>Perempuan</option>
                                <option value="L" <?php if ($jantina="L") {echo 'selected';};?>>Lelaki</option>
                            </select>

                        </div>

                        <label for="umur" class="col-sm col-form-label text-dark">Umur:</label>
                        <!--umur-->

                        <div class="col-sm"><input type="number" class="form-control" name="umur" min="7" max="18" 
                        placeholder="Contoh: 17" data-bs-toggle="tooltip" title="Sila masukkan dari 7 hingga 18 sahaja"
                        value="<?php echo $umur;?>"></div>

                    </div>

                    <div class="row">
                        <!--no telefon-->

                        <label for="no-telefon" class="col-sm-3 col-form-label text-dark">No telefon:</label>
                        <div class="col-sm-9"><input type="text" class="form-control" name="no-telefon" maxlength="11" 
                        placeholder="Contoh: 0123456789" data-bs-toggle="tooltip" title="Jangan letak '-'"
                        value="<?php echo $no_tel;?>"></div>

                    </div>

                    <div class="row">
                        <!--kategori-->

                        <label for="kategori" class="col-sm-3 col-form-label text-dark">Kategori:</label>
                        <div class="col-sm-9">

                            <select class="form-select" name="kategori" data-bs-toggle="tooltip" title="rendah: 7-12 menengah: 13-18">

                                <option value="">Sila pilih...</option>

                                <?php

                                $hasil = mysqli_query($con, "SELECT kod_kategori, nama_kategori FROM kategori");
                                while ($row = mysqli_fetch_array($hasil)) {
                                    $nama_kategori = $row['nama_kategori'];
                                    $kod_kategori = $row['kod_kategori'];
                                    if ($kod_kategori == $kategori) {
                                        echo "<option value=" . $kod_kategori . " selected>" . $nama_kategori . "</option>";
                                    } else {
                                        echo "<option value=" . $kod_kategori . ">" . $nama_kategori . "</option>";
                                    }
                                }
                                mysqli_close($con);

                                ?>

                            </select>

                        </div>

                    </div>

                    <div class="row">
                        <!--kod sekolah-->

                        <label for="kod-sekolah" class="col-sm-3 col-form-label text-dark">Kod Sekolah:</label>
                        <div class="col-sm-9"><input type="text" class="form-control" name="kod-sekolah" maxlength="7" 
                        placeholder="Contoh: PEB1108" data-bs-toggle="tooltip" title="Sila dapat kod sekolah dari pihak sekolah"
                        value="<?php echo $kod_sekolah;?>"></div>

                    </div>

                    <div class="row">
                        <!--nama sekolah-->

                        <label for="nama-sekolah" class="col-sm-3 col-form-label text-dark">Nama Sekolah:</label>
                        <div class="col-sm-9"><input type="text" class="form-control" name="nama-sekolah" 
                        placeholder="Contoh: SMJK Phor Tay" data-bs-toggle="tooltip" title="Sila letak nama penuh sekolah"
                        value="<?php echo $nama_sekolah;?>"></div>

                    </div>

                    <div class="row">

                        <label for="password" class="col-sm col-form-label text-dark">Katalaluan:</label>
                        <!--password-->

                        <div class="col-sm"><input type="password" class="form-control" name="password" 
                        placeholder="Masukkan katalaluan baharu" value="<?php echo $psw_peserta;?>"></div>

                        <label for="password-confirm" class="col-sm col-form-label text-dark">Pengesahan Katalaluan:</label>
                        <!--password-confirm-->

                        <div class="col-sm"><input type="password" class="form-control" name="password-confirm" 
                        placeholder="Masukkan katalaluan baharu" value="<?php echo $psw_peserta;?>"></div>

                    </div>


                    <div class="row gap-2">
                        <button type="button" class="col btn btn-primary ms-2" onclick="document.location='peserta.php';alert('Pengubahan maklumat telah dibatalkan.');">Kembali</button>
                        <button type="submit" class="col btn btn-primary me-2" >Kemas Kini</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

</body>

</html>