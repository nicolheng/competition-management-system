<!DOCTYPE html>
<html lang="en">

<head>
    <title>Senarai Peserta</title>
    <link rel="icon" href="image/logo2.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="stylesheet.css" id="styles" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script language="JavaScript">
    </script>

</head>

<body class="min-vh-100 d-flex flex-column">

    <?php include 'header.php';
    require_once('dbconnection.php'); 
    ?>

    <div class="container-fluid d-flex align-items-center justify-content-center m-0" style="min-height:82vh;">
        <!--body-->
        <div id="body" class="bg-white border border-2 d-flex justify-content-center container" style="height: 72vh; width: 75%; border-radius: 20px; overflow-y:auto;">
            <div class="" style="width:80%;">

                <!--content-->

                <div class="display-5 text-dark fw-bold text-center m-4">Senarai Peserta</div>

                <div class="row">

                    <div class="col-2"></div>

                    <div class="col-8 d-flex justify-content-center">
                        <!--cari-->

                        <h3 class="m-1 d-inline text-dark col-4">Cari Peserta:</h3>
                        <form class="input-group" action="peserta.php" method="post">
                            <input type="text" name="nama" class="form-control col-4" placeholder="Masukkan Nama">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1
                                     1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </form>
                        
                            
                        </select>

                    </div>

                    <div class="col-2 d-flex justify-content-end gap-2">
                        <!--select action-->

                        <button type="button" class="btn" onclick="document.location='daftar.php'">
                            <!--add-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2
                                 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                            </svg>
                        </button>

                    </div>

                </div>

                <table id="table" class="table table-sm table-striped table-hover m-3 align-middle text-center">
                    <!--table-->

                    <thead>
                        <tr>
                            <th>Nama</th>

                            <th>Umur</th>

                            <th>Jantina</th>

                            <th>No KP</th>

                            <th>No Tel</th>

                            <th>Sekolah</th>

                            <th>Operasi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <!--table content-->


                        <?php
                        if (ISSET($_POST['nama']) && $_POST['nama']!="") {
                            $nama_cari = $_POST['nama'];
                            $result = mysqli_query($con, "SELECT * FROM peserta INNER JOIN sekolah ON sekolah.kod_sekolah = peserta.kod_sekolah 
                            WHERE nama_peserta ='$nama_cari' ORDER BY ID_peserta ASC;");
                        } else {
                            $result = mysqli_query($con, "SELECT * FROM peserta INNER JOIN sekolah ON sekolah.kod_sekolah = peserta.kod_sekolah ORDER BY ID_peserta ASC;");
                        }
                        while ($row = mysqli_fetch_array($result)) {
                            $nama_peserta = $row['nama_peserta'];
                            $umur = $row['umur'];
                            $jantina = $row['jantina'];
                            $no_kp = $row['no_kp'];
                            $no_telefon = $row['no_telefon'];
                            $nama_sekolah = $row['nama_sekolah'];
                            echo '<tr>';
                            echo '<td>' . $nama_peserta . '</td>';
                            echo '<td>' . $umur . '</td>';
                            echo '<td>' . $jantina . '</td>';
                            echo '<td>' . $no_kp . '</td>';
                            echo '<td>' . $no_telefon . '</td>';
                            echo '<td>' . $nama_sekolah . '</td>';
                            echo '<td><button type="button" class="btn" onclick="document.location=&#39;pengubahan-maklumat.php?id=' . $row['ID_peserta'] . '&#39;"> <!--edit-->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 
                                            0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 
                                            0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
    
                                    <button type="button" class="btn" onclick="document.location=&#39;action-delete.php?id=' . $row['ID_peserta'] . '&#39;"> <!--delete-->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 
                                            0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647
                                             2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </button>
                                </td>';
                            echo '</tr>';
                        }

                        ?>

                    </tbody>

                </table>


                <!--content end-->

            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

</body>

</html>