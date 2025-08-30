<?php
session_start();
?>

<nav id="nav" class="navbar navbar-light shadow-lg bg-white"> <!--header-->
                    
	<a class="col-3 d-flex flex-row navbar-brand" href="main-menu.php"> <!--logo + title-->

        <img class="ms-1" src="image/logo2.png" height="50" width="50" alt="Logo"> <!--logo-->

		<div class="d-flex flex-column"> <!--title-->
			<div class="">Sistem Pengurusan Pertandingan Pidato</div>
			<div class="fs-6">Kelab Pidato</div>
		</div>

	</a>

	<div class="m-3 form-check form-switch">
		<label for="mode" class="form-check-label text-dark mx-2">Light/Dark</label>
		<input type="checkbox" id="mode" class="form-check-input mx-2" onclick="darkmode()" value="light">
	</div>

	<script>
            function darkmode(){
                if (document.getElementById("mode").value=="light"){
					document.getElementById("nav").classList.remove("navbar-light");
                    document.getElementById("nav").classList.add("navbar-dark");
					document.getElementById("nav").classList.remove("bg-white");
					document.getElementById("nav").classList.add("bg-dark");
					document.getElementById("body").classList.remove("bg-white");
					document.getElementById("body").classList.add("bg-dark");
					if (typeof(document.getElementById("table")) != 'undefined' && document.getElementById("table") != null)
					{
						document.getElementById("table").classList.add("table-dark");
					}
					document.querySelectorAll(".text-dark").forEach((element) => {
      					element.className = element.className.replace(/-dark/g, "-white");
    				});
					document.getElementById("mode").value="dark";
                    
                } else {
					document.getElementById("nav").classList.add("navbar-light");
                    document.getElementById("nav").classList.remove("navbar-dark");
					document.getElementById("nav").classList.add("bg-white");
					document.getElementById("nav").classList.remove("bg-dark");
					document.getElementById("body").classList.add("bg-white");
					document.getElementById("body").classList.remove("bg-dark");
					if (typeof(document.getElementById("table")) != 'undefined' && document.getElementById("table") != null)
					{
						document.getElementById("table").classList.remove("table-dark");
					}
					document.querySelectorAll(".text-white").forEach((element) => {
      					element.className = element.className.replace(/-white/g, "-dark");
    				});
                    document.getElementById("mode").value="light";
				}
            };
    </script>

	<ul class="col-lg me-2 navbar-nav fw-bold d-flex flex-row justify-content-end"> <!--nav-->

		<?php
			if (isset($_SESSION['user_type'])) {
				$user_type=$_SESSION['user_type'];
				if ($user_type=="peserta") {
					echo '<html><li class="p-3 nav-item"><a class="nav-link" href="main-menu.php" >LAMAN UTAMA</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="keputusan.php">KEPUTUSAN</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="log-keluar.php">LOG KELUAR</a></li></html>';
				}
	
				else if ($user_type=="hakim") {
					echo '<html><li class="p-3 nav-item"><a class="nav-link" href="main-menu.php" >LAMAN UTAMA</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="peserta.php">PESERTA</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="markah.php">MARKAH</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="keputusan.php">KEPUTUSAN</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="import.php">IMPORT</a></li>
					<li class="p-3 nav-item"><a class="nav-link" href="log-keluar.php">LOG KELUAR</a></li></html>';
				}
			} else {
				if (basename($_SERVER['PHP_SELF'])=="main-menu.php") {
					echo '<ul class="col-lg me-2 navbar-nav fw-bold d-flex flex-row justify-content-end">
					<li class="p-3 nav-item"><a class="nav-link" href="index.php">LOG MASUK</a></li>
					</ul>';
	
				} else {
					echo "<script>alert('Sila log masuk!');window.location.href='index.php';</script>";
				}
			}

		?>
		
        <!--<li class="p-3 nav-item"><a class="nav-link" href="log-masuk.html" onMouseOver="this.style.color='#f24236'" onMouseOut="this.style.color='rgba(0,0,0,0.55)'">LOG MASUK</a></li>-->
    </ul>
 
</nav>