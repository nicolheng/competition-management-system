<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Perekodan Markah</title>
        <link rel = "icon" href = "logo2.png" type = "image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="stylesheet.css" id="styles" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="min-vh-100 d-flex flex-column">

    <?php include 'header.php'; 
    include 'validation.php'
    ?>

        <div class="container-fluid d-flex align-items-center justify-content-center m-0" style="min-height:82vh;"> <!--body-->
            <div id="body" class="bg-white border border-2 d-flex justify-content-center" style="min-height: 72vh; width: 75%; border-radius: 20px;">
                <div class="d-flex flex-column" style="width:80%;">

                    <!--content-->
                    <div class="text-dark display-5 fw-bold text-center m-4">Perekodan Markah</div>

                    <form name="markah" class="d-grid gap-5" action="action-markah.php" method="post" onsubmit="return validateMarkah();">

                        <div class="row"> <!--ID hakim & ID peserta-->

                            <label for="ID-hakim" class="text-dark col-sm-2 col-form-label">Nama Hakim:</label> <!--ID hakim-->

                            <div class="col-sm-4">

                                <?php
                                    echo '<html><input disabled type="text" class="form-control" name="ID-hakim" value='.$_SESSION['name'].'></html>';
                                ?>


                            </div>

                            <label for="ID-peserta" class="text-dark col-sm-2 col-form-label">Nama peserta:</label> <!--umur-->

                            <div class="col-sm-4">

                                <select class="form-select" name="ID-peserta" required>
                                    <option>Sila pilih...</option>
                                    
                                    <?php

                                        require_once("dbconnection.php");
                                        $hasil = mysqli_query($con,"SELECT ID_peserta, nama_peserta FROM peserta");
                                        while($row = mysqli_fetch_array($hasil)) {
                                            $ID_peserta = $row['ID_peserta'];
                                            $nama_peserta = $row['nama_peserta'];
                                            echo "<option value=".$ID_peserta.">".$nama_peserta."</option>";
                                        }
                                        mysqli_close($con);

                                    ?>

                                    
                                </select>

                            </div>

                        </div>

                        <div class="row"> <!--skor isi & skor bahasa-->

                            <label for="skor-isi" class="text-dark col-sm-2 col-form-label">Skor Isi:</label> <!--Skor Isi-->
                            <div class="col-sm-4"><input type="number" class="form-control" name="skor-isi" placeholder="0-40"></div>

                            <label for="skor-bahasa" class="text-dark col-sm-2 col-form-label">Skor Bahasa:</label> <!--Skor Bahasa-->
                            <div class="col-sm-4"><input type="number" class="form-control" name="skor-bahasa" placeholder="0-35"></div>

                        </div>

                        <div class="row"> <!--skor gaya & etika-->

                            <label for="skor-gaya" class="text-dark col-sm-2 col-form-label">Skor Gaya:</label> <!--Skor Gaya-->
                            <div class="col-sm-4"><input type="number" class="form-control" name="skor-gaya" placeholder="0-25"></div>

                            <label for="skor-Etika" class="text-dark col-sm-2 col-form-label">Skor Etika:</label> <!--Skor Etika-->
                            <div class="col-sm-4"><input type="number" class="form-control" name="skor-etika" placeholder="0-5"></div>

                        </div>

                        <button type="submit" class="btn btn-primary p-2">Hantar</button>

                    </form>
                    <!--content end-->

                </div>
            </div>
        </div>
        
        <?php include 'footer.php';?>

    </body>
</html>