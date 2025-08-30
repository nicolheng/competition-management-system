<script>

function validateSignUp() {
    let x = document.forms["sign-up"]["nama-peserta"].value;
    if (x == "") {
        alert("Nama tidak boleh kosong");
        return false;
    }
    if (x.length >50) {
        alert("Nama anda telah melebihi had huruf");
        return false;
    }

    let y = document.forms["sign-up"]["no-kad-pengenalan"].value;
    if (y == "") {
        alert("Nombor kad pengenalan tidak boleh kosong");
        return false;
    }
    if ((y.length != 12)){
        alert("Nombor kad pengenalan mesti merupakan 12 digit");
        return false;
    }
    if (!(/^[0-9]+$/.test(y))){
        alert("Nombor kad pengenalan tidak boleh mengandungi huruf selain nombor");
        return false;
    }

    let z = document.forms["sign-up"]["jantina"].value;
    if (z == "") {
        alert("Jantina tidak boleh kosong");
        return false;
    }

    let a = document.forms["sign-up"]["umur"].value;
    if (a == "") {
        alert("Umur tidak boleh kosong");
        return false;
    }

    if (a > 18 || a < 7) {
        alert("Julat umur yang dibenarkah ialah 7-18");
        return false;
    }

    let b = document.forms["sign-up"]["no-telefon"].value;
    if (b == "") {
        alert("No telefon tidak boleh kosong");
        return false;
    }
    if (!(/^[0-9]+$/.test(b))){
        alert("No telefon tidak boleh mengandungi huruf selain nombor");
        return false;
    }

    if (b.length > 11){
        alert("No telefon tidak boleh melebihi 11 digit");
        return false;
    }

    let c = document.forms["sign-up"]["kategori"].value;
    if (c == "") {
        alert("Kategori tidak boleh kosong");
        return false;
    }
    if (c == "M" && a <13) {
        alert("Kategori anda seharusnya ialah Rendah");
        return false;
    }
    if (c == "R" && a >12) {
        alert("Kategori anda seharusnya ialah Menengah");
        return false;
    }

    let d = document.forms["sign-up"]["kod-sekolah"].value;
    if (d == "") {
        alert("Kod sekolah tidak boleh kosong");
        return false;
    }

    if (!(/^[A-Z]{3}[0-9]{4}?$/).test(d)) {
        alert("Kod sekolah tidak mematuhi format Kod Sekolah");
        return false;
    }

    let e = document.forms["sign-up"]["nama-sekolah"].value;
    if (e == "") {
        alert("Nama sekolah tidak boleh kosong");
        return false;
    }
    if (e >50) {
        alert("Nama sekolah telah melebihi had huruf");
        return false;
    }


    let f = document.forms["sign-up"]["password"].value;
    if (f == "") {
        alert("Password tidak boleh kosong");
        return false;
    }


    let g = document.forms["sign-up"]["password-confirm"].value;
    if (g == "") {
        alert("Sila masukkan password sekali lagi di tempat 'confirm password'");
        return false;
    }

    if(f != g) {
        alert("password anda tidak sama dalam kedua-dua tempat input");
        return false;
    }
}

function validateMarkah() {

    let x = document.forms["markah"]["ID-peserta"].value;
    if(x == "") {
        alert("Sila pilih ID peserta");
        return false;
    }

    let y = document.forms["markah"]["skor-isi"].value;
    if (y =="") {
        alert("Sila masukkan skor isi.");
        return false;
    }
    if (y < 0 || y > 40) {
        alert("Julat skor isi ialah 0-40.");
        return false;
    }

    let z = document.forms["markah"]["skor-bahasa"].value;
    if (z =="") {
        alert("Sila masukkan skor bahasa.");
        return false;
    }
    if (z < 0 || z > 35) {
        alert("Julat skor bahasa ialah 0-35");
        return false;
    }

    let a = document.forms["markah"]["skor-gaya"].value;
    if (a =="") {
        alert("Sila masukkan skor gaya.");
        return false;
    }
    if (a < 0 || a > 25) {
        alert("Julat skor gaya ialah 0-25.");
        return false;
    }

    let b = document.forms["markah"]["skor-etika"].value;
    if (b =="") {
        alert("Sila masukkan skor etika.");
        return false;
    }
    if (b < 0 || b > 5) {
        alert("Julat skor etika ialah 0-5.");
        return false;
    }
}

function validateLogin() {

    let x = document.forms["log-masuk"]["ID"].value;
    if(x == "") {
        alert("Sila masukkan ID anda");
        return false;
    }
    let y = document.forms["log-masuk"]["password"].value;
    if(y == "") {
        alert("Sila masukkan password anda");
        return false;
    }
}
</script>
