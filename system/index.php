<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Log Masuk</title>
        <link rel="icon" href="image/logo2.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="stylesheet.css" id="styles" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    </head>

    <body class="min-vh-100 d-flex flex-column">

    <?php include 'header-nouser.php'; include 'validation.php'; ?>

        <div class="container-fluid d-flex align-items-center justify-content-center m-0" style="min-height:82vh;"> <!--body-->
            <div class="bg-white border border-2 d-flex justify-content-center" style="min-height: 72vh; width: 75%; border-radius: 20px;">

                    <!--content-->
                    
                    <div class="row"> <!--two col-->

                        <div class="col d-flex flex-column align-items-center justify-content-center m-1"> <!--logo + title-->

                            <img class="" src="image/logo2.png" height="350" width="350" alt="Logo"> <!--logo-->
                            <div class="display-5 text-center fw-bold mb-1">Sistem Pengurusan Pertandingan Pidato</div>
                            <h5 class="m-1">Kelab Pidato</h5>

                        </div>

                        <div class="col align-items-center m-1 border-start" style="height:70vh;"> <!--login form-->

                            <div class="display-5 text-center fw-bold m-4 mt-5">Log Masuk</div> <!--title-->

                            <form name="log-masuk" class="d-grid" action="action-log-masuk.php" method="post" onsubmit="return validateLogin()">  <!--form-->

                                <div class="form-floating m-3"> <!--username-->

                                    <input type="text" class="form-control" name="ID">
                                    <label for="ID">ID</label>

                                </div>

                                <div class="form-floating m-3"> <!--psw-->
                                        <input type="password" class="form-control" name="password" ID="psw">
                                        <label for="password">Password</label>
                                </div>

                                <div class="form-check ms-3">
                                    <input type="checkbox" unchecked class="form-check-input" id="checkbox-showPassword" onclick="showPassword()">
                                    <label class="form-check-label" for="checkbox-showPassword">Tunjuk Password</label>

                                    <script>
                                        function showPassword() {
                                          var x = document.getElementById("psw");
                                          if (x.type == "password") {
                                            x.type = "text";
                                          } else {
                                            x.type = "password";
                                          }
                                        }
                                    </script>
                                </div>

                                <button type="submit" class="btn btn-primary m-3 p-3 text-white">Log Masuk</button>

                                <div class="m-2 ms-3 me-3 text-center" style="border-bottom: 1px solid #000; line-height: 0.1em;"><span class="bg-white ps-1 pe-1">atau</span></div>

                                <button type="button" class="btn btn-primary m-3 p-3 text-white" onclick="document.location='sign-up.php'">Daftar Peserta Baharu</button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        
        <?php include 'footer.php';?>

    </body>
</html>