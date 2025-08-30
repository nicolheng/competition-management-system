<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keputusan</title>
    <link rel="icon" href="image/logo2.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css"rel="stylesheet">
    <link href="stylesheet.css" id="styles" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        function printKeputusan() {
            var divToPrint=document.getElementById("table");
            var head = '<head><link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="bootstrap/css/bootstrap.min.css" media="print" rel="stylesheet"></head>';
            if (document.getElementById("kategori").value == "M") {
                var kategori = "Menengah";
            } else {
                var kategori = "Rendah";
            }
            var title = '<body><div class="text-dark fw-bold text-center m-4">Keputusan Kategori '+kategori+' Pertandingan Pidato</div>';
            newWin= window.open("");
            newWin.document.write(head + title + divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        function filterKategori() {
            var x = document.getElementById("kategori").value;
            window.location.href="keputusan.php?kategori="+x;
        }
    </script>

</head>

<body class="min-vh-100 d-flex flex-column">

    <?php include 'header.php'; ?>

    <div class="container-fluid d-flex align-items-center justify-content-center m-0" style="min-height:82vh;">
        <!--body-->
        <div id="body" class="bg-white border border-2 d-flex justify-content-center" style="min-height: 72vh; width: 75%; border-radius: 20px; overflow-y:auto;">
            <div class="" style="width:80%;">

                <!--content-->

                <div class="display-5 text-dark fw-bold text-center m-4">Keputusan  Pertandingan Pidato</div>

                <div class="d-grid">

                    <div class="row d-flex">

                        <div class="col-5 d-flex justify-content-center">
                            <!--select kategori-->

                            <h3 class="text-dark m-1 ms-3 d-inline">Kategori:</h3>

                            <select class="form-select d-inline w-100" name="kategori" id="kategori" onchange="filterKategori()">
                                <option value="R" <?php if ((isset($_GET['kategori'])) and $_GET['kategori']=='R') {echo "selected";}?>>rendah</option>
                                <option value="M" <?php if ((!(isset($_GET['kategori']))) or ($_GET['kategori']=='M') or ($_GET['kategori']=='')) {echo "selected";}?>>menengah</option>
                            </select>

                        </div>

                        <div class="col-6"></div>

                        <button type="button" class="col btn btn-primary" onclick="printKeputusan()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2
                                 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 
                                 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7
                                  2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                            </svg>
                        </button>


                    </div>

                    <div name="keputusanTable">

                        <table id="table" class="table table-sm table-striped table-hover m-3 align-middle text-center">
                            <!--table-->

                            <thead>
                                <tr>
                                    <th>Kedudukan</th>

                                    <th>Nama</th>

                                    <th>Umur</th>

                                    <th>Jantina</th>

                                    <th>Sekolah</th>

                                    <th>Skor Isi</th>

                                    <th>Skor Bahasa</th>

                                    <th>Skor Gaya</th>

                                    <th>Skor Etika</th>

                                    <th>Jumlah Markah</th>

                                </tr>
                            </thead>

                            <tbody>
                                <!--table content-->


                                <?php
                                require_once('dbconnection.php');
                                if ((isset($_GET['kategori']))){
                                    if ($_GET['kategori']!='') {
                                        $kategori = $_GET['kategori'];
                                        $result = mysqli_query($con, "SELECT markah.ID_peserta, nama_peserta,umur, jantina, nama_sekolah, kod_kategori, 
                                        sum(skor_isi) as skor_isi, sum(skor_bahasa) as skor_bahasa, sum(skor_gaya) as skor_gaya, sum(skor_etika) as skor_etika, 
                                        (sum(skor_isi+skor_bahasa+skor_gaya+skor_etika)) as jum_skor, RANK() OVER(ORDER BY jum_skor DESC)kedudukan
                                        FROM markah INNER JOIN (peserta INNER JOIN sekolah ON sekolah.kod_sekolah = peserta.kod_sekolah) ON markah.ID_peserta = peserta.ID_peserta
                                        WHERE kod_kategori = '$kategori'
                                        GROUP BY ID_peserta;");
                                    } else {
                                        $result = mysqli_query($con, "SELECT markah.ID_peserta, nama_peserta,umur, jantina, nama_sekolah, kod_kategori, 
                                        sum(skor_isi) as skor_isi, sum(skor_bahasa) as skor_bahasa, sum(skor_gaya) as skor_gaya, sum(skor_etika) as skor_etika, 
                                        (sum(skor_isi+skor_bahasa+skor_gaya+skor_etika)) as jum_skor, RANK() OVER(ORDER BY jum_skor DESC)kedudukan
                                        FROM markah INNER JOIN (peserta INNER JOIN sekolah ON sekolah.kod_sekolah = peserta.kod_sekolah) ON markah.ID_peserta = peserta.ID_peserta
                                        WHERE kod_kategori = 'M'
                                        GROUP BY ID_peserta;");
                                    }
                                } else {
                                    $result = mysqli_query($con, "SELECT markah.ID_peserta, nama_peserta,umur, jantina, nama_sekolah, kod_kategori, 
                                    sum(skor_isi) as skor_isi, sum(skor_bahasa) as skor_bahasa, sum(skor_gaya) as skor_gaya, sum(skor_etika) as skor_etika, 
                                    (sum(skor_isi+skor_bahasa+skor_gaya+skor_etika)) as jum_skor, RANK() OVER(ORDER BY jum_skor DESC)kedudukan
                                    FROM markah INNER JOIN (peserta INNER JOIN sekolah ON sekolah.kod_sekolah = peserta.kod_sekolah) ON markah.ID_peserta = peserta.ID_peserta
                                    WHERE kod_kategori = 'M'
                                    GROUP BY ID_peserta;");
                                }
                                while ($row = mysqli_fetch_array($result)) {
                                    $kedudukan = $row['kedudukan'];
                                    $nama_peserta = $row['nama_peserta'];
                                    $umur = $row['umur'];
                                    $jantina = $row['jantina'];
                                    $nama_sekolah = $row['nama_sekolah'];
                                    $skor_isi = $row['skor_isi'];
                                    $skor_bahasa = $row['skor_bahasa'];
                                    $skor_gaya = $row['skor_gaya'];
                                    $skor_etika = $row['skor_etika'];
                                    $markah = $row['jum_skor'];
                                    
                                    echo '<tr>';
                                    echo '<td>' . $kedudukan . '</td>';
                                    echo '<td>' . $nama_peserta . '</td>';
                                    echo '<td>' . $umur . '</td>';
                                    echo '<td>' . $jantina . '</td>';
                                    echo '<td>' . $nama_sekolah . '</td>';
                                    echo '<td>' . $skor_isi . '</td>';
                                    echo '<td>' . $skor_bahasa . '</td>';
                                    echo '<td>' . $skor_gaya . '</td>';
                                    echo '<td>' . $skor_etika . '</td>';
                                    echo '<td>' . $markah . '</td>';
                                    echo '</tr>';
                                    
                                }

                                ?>

                            </tbody>

                        </table>

                    </div>

                </div>
                <!--content end-->

            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
