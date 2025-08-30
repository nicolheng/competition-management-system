<?php
    require_once("dbconnection.php");

    if(isset($_POST['submit'])) {
        
        echo "hello";

        if($_FILES['file']['name']) {

            $arrFilename=explode('.',$_FILES['file']['name']);
            print_r($_FILES);
            if ($arrFilename[1]=='csv'){


                $f = fopen($_FILES['file']['tmp_name'],'r');
                while (($data=fgetcsv($f,1000,','))!==FALSE) {
                    $kod = mysqli_real_escape_string($con, $data[0]);
                    $nama = mysqli_real_escape_string($con, $data[1]);
                    $import = "INSERT INTO sekolah(kod_sekolah,nama_sekolah) values('$kod', '$nama')";
                    mysqli_query($con,$import);
                }
                fclose($f);
                echo "<script>window.alert('Data Sekolah Berjaya Diiimport');
                window.location.href='import.php?import=T';</script>";
                                    
            }
        }
    }

    echo "bye";
                

?>

