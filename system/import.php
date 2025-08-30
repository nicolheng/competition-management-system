<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Import Data Sekolah</title>
        <link rel="icon" href="image/logo2.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="stylesheet.css" id="styles" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="min-vh-100 d-flex flex-column">

    <?php include 'header.php'; ?>

        <div class="container-fluid d-flex align-items-center justify-content-center m-0 " style="min-height:82vh;"> <!--body-->
            <div id="body" class="bg-white border border-2 d-flex justify-content-center" style="min-height: 72vh; width: 75%; border-radius: 20px; overflow-y:auto;">
                <div class="d-flex flex-column" style="width:80%;">

                    <!--content-->
                    <div class="display-5 fw-bold text-center text-dark m-4">Import Data Sekolah</div>

                    <h5 class="text-center m-3 mb-4 text-dark">Muat naikkan fail CSV anda:</h5>

                    <form action="import.php" method="post" enctype="multipart/form-data" class="input-group">

                        <input class="form-control" name="file" type="file">

                        <button type="submit" class="btn btn-primary" name="submit">Hantar</button>

                    </form>

                    <?php
                    require_once("dbconnection.php");

                    if(isset($_POST['submit'])) {

                        $success=false;
                
                        if($_FILES['file']['name']) {
                
                            $arrFilename=explode('.',$_FILES['file']['name']);
                            if ($arrFilename[1]=='csv'){
                
                
                                $f = fopen($_FILES['file']['tmp_name'],'r');
                                while (($data=fgetcsv($f,1000,','))!==FALSE) {
                                    $kod = mysqli_real_escape_string($con, $data[0]);
                                    $nama = mysqli_real_escape_string($con, $data[1]);
                                    $import = "INSERT INTO sekolah(kod_sekolah,nama_sekolah) values('$kod', '$nama')";
                                    $result = mysqli_query($con,$import);
                                }
                                fclose($f);
                                if (isset($result)) {
                                    echo "<script>window.alert('Data Sekolah Berjaya Diiimport.');
                                    </script>";
                                }
                                else {
                                    echo "<script>window.alert('Import Gagal. Sila cuba lagi.');
                                    </script>";
                                }

                                unset($_POST['submit']);

                                $success=true;
                                
                            }
                        }

                    }
                
                    if (isset($success) and $success==true) {
                        print '<h5 class="text-center text-dark mt-2">Keputusan Import:</h5>';
                        print '<table id="table" class="table table-sm table-striped align-middle text-center">';
                        print '<thead>';
                        print '<tr>';
                        print '<th>Kod Sekolah</th>';
                        print '<th>Nama Sekolah</th>';
                        print '</tr>';
                        print '</thead>';
                        print '<tbody>';

                        $f = fopen($_FILES['file']['tmp_name'],'r');
                        while (($data=fgetcsv($f,1000,','))!==FALSE) {
                            $kod = mysqli_real_escape_string($con, $data[0]);
                            $nama = mysqli_real_escape_string($con, $data[1]);
                            print '<tr>';
                            print '<td>'.$kod.'</td>';
                            print '<td>'.$nama.'</td>';
                            print '</tr>';
                        }
                        print '</tbody>';
                        print '</table>';
                        fclose($f);
                        unset($_FILES['file']['name']);
                    }

                    ?>
                    <!--content end-->

                </div>
            </div>
        </div>

        
        <?php include 'footer.php';?>

    </body>
</html>
